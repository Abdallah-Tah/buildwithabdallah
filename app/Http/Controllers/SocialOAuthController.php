<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Generic OAuth 2.0 (authorization-code) flow for social providers.
 *
 *   GET /auth/{provider}            -> redirect to the provider's consent screen
 *   GET /auth/{provider}/callback   -> exchange the code for an access token
 *
 * The captured token + identity is written to storage/app/{provider}_oauth.json
 * so the posting bot / app can read it (mirrors the existing X integration).
 */
class SocialOAuthController extends Controller
{
    /**
     * Static, non-secret endpoint metadata per provider. Credentials live in
     * config/services.php (.env). `facebook` URLs are filled with the graph
     * version from config at request time.
     */
    private function meta(string $provider): array
    {
        $providers = [
            'linkedin' => [
                'authorize_url'   => 'https://www.linkedin.com/oauth/v2/authorization',
                'token_url'       => 'https://www.linkedin.com/oauth/v2/accessToken',
                'userinfo_url'    => 'https://api.linkedin.com/v2/userinfo',
                'default_scopes'  => 'openid profile email',
                'uses_grant_type' => true,  // LinkedIn requires grant_type=authorization_code
                'id_field'        => 'sub', // OpenID Connect userinfo
            ],
            'facebook' => [
                'authorize_url'   => 'https://www.facebook.com/%v/dialog/oauth',
                'token_url'       => 'https://graph.facebook.com/%v/oauth/access_token',
                'userinfo_url'    => 'https://graph.facebook.com/%v/me?fields=id,name,email',
                'default_scopes'  => 'public_profile,email',
                'uses_grant_type' => false, // Facebook's token endpoint takes no grant_type
                'id_field'        => 'id',
            ],
        ];

        abort_unless(isset($providers[$provider]), 404);

        $m = $providers[$provider];

        if ($provider === 'facebook') {
            $v = config('services.facebook.graph_version', 'v23.0');
            foreach (['authorize_url', 'token_url', 'userinfo_url'] as $k) {
                $m[$k] = str_replace('%v', $v, $m[$k]);
            }
        }

        return $m;
    }

    /** Step 1 — send the user to the provider's consent screen. */
    public function redirect(string $provider)
    {
        $meta = $this->meta($provider);
        $config = config("services.$provider");

        if (empty($config['client_id']) || empty($config['client_secret'])) {
            return $this->result($provider, false, 'Not configured',
                'Set ' . strtoupper($provider) . '_CLIENT_ID and ' . strtoupper($provider) . '_CLIENT_SECRET in your .env, then retry.');
        }

        $state = Str::random(40);
        session()->put("oauth_state_$provider", $state);

        $query = http_build_query([
            'response_type' => 'code',
            'client_id'     => $config['client_id'],
            'redirect_uri'  => $this->redirectUri($provider),
            'state'         => $state,
            'scope'         => $config['scopes'] ?? $meta['default_scopes'],
        ]);

        return redirect()->away($meta['authorize_url'] . '?' . $query);
    }

    /** Step 2 — handle the provider's redirect back, exchange code for a token. */
    public function callback(string $provider, Request $request)
    {
        $meta = $this->meta($provider);
        $config = config("services.$provider");

        // User denied, or the provider reported an error.
        if ($request->filled('error')) {
            return $this->result($provider, false, 'Authorization declined',
                $request->query('error_description') ?: $request->query('error'));
        }

        // CSRF: the state we sent must come back unchanged.
        $expected = session()->pull("oauth_state_$provider");
        $state = $request->query('state');
        if (! $expected || ! $state || ! hash_equals($expected, $state)) {
            return $this->result($provider, false, 'Invalid state',
                'Security check failed (state mismatch). Please start the connection again.');
        }

        $code = $request->query('code');
        if (! $code) {
            return $this->result($provider, false, 'Missing code', 'The provider did not return an authorization code.');
        }

        // Exchange the authorization code for an access token.
        $params = [
            'code'          => $code,
            'client_id'     => $config['client_id'],
            'client_secret' => $config['client_secret'],
            'redirect_uri'  => $this->redirectUri($provider),
        ];
        if ($meta['uses_grant_type']) {
            $params['grant_type'] = 'authorization_code';
        }

        $tokenRes = Http::asForm()->acceptJson()->post($meta['token_url'], $params);

        if ($tokenRes->failed() || ! $tokenRes->json('access_token')) {
            Log::warning("$provider token exchange failed", ['status' => $tokenRes->status(), 'body' => $tokenRes->body()]);
            return $this->result($provider, false, 'Token exchange failed',
                $tokenRes->json('error_description')
                    ?? $tokenRes->json('error.message')
                    ?? 'The provider rejected the token request. Check the logs and your redirect URI.');
        }

        $token = $tokenRes->json();
        $accessToken = $token['access_token'];

        $identity = $this->fetchIdentity($provider, $meta, $accessToken);

        // Persist the token so the posting bot/app can use it.
        $payload = [
            'provider'     => $provider,
            'access_token' => $accessToken,
            'token_type'   => $token['token_type'] ?? 'Bearer',
            'expires_in'   => $token['expires_in'] ?? null,
            'scope'        => $token['scope'] ?? ($config['scopes'] ?? $meta['default_scopes']),
            'obtained_at'  => now()->toISOString(),
            'identity'     => $identity,
        ];
        file_put_contents(
            storage_path("app/{$provider}_oauth.json"),
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        Log::info("$provider OAuth connected", [
            'identity'   => $identity,
            'expires_in' => $payload['expires_in'],
        ]);

        return $this->result($provider, true,
            $identity['name'] ?? 'Account connected',
            'ID: ' . ($identity['id'] ?? '—') . ($identity['email'] ? '  ·  ' . $identity['email'] : ''));
    }

    /** Lightweight JSON status endpoint (does not expose the token). */
    public function status(string $provider)
    {
        $this->meta($provider); // 404s unknown providers
        $file = storage_path("app/{$provider}_oauth.json");

        if (! file_exists($file)) {
            return response()->json(['provider' => $provider, 'connected' => false]);
        }

        $data = json_decode(file_get_contents($file), true) ?: [];

        return response()->json([
            'provider'    => $provider,
            'connected'   => ! empty($data['access_token']),
            'identity'    => $data['identity'] ?? null,
            'scope'       => $data['scope'] ?? null,
            'obtained_at' => $data['obtained_at'] ?? null,
            'expires_in'  => $data['expires_in'] ?? null,
        ]);
    }

    /** Fetch the connected account's basic identity (best-effort). */
    private function fetchIdentity(string $provider, array $meta, string $token): array
    {
        $blank = ['id' => null, 'name' => null, 'email' => null];

        try {
            $res = $provider === 'facebook'
                ? Http::get($meta['userinfo_url'], ['access_token' => $token])
                : Http::withToken($token)->get($meta['userinfo_url']);

            $d = $res->json() ?: [];

            return [
                'id'    => $d[$meta['id_field']] ?? null,
                'name'  => $d['name'] ?? null,
                'email' => $d['email'] ?? null,
            ];
        } catch (\Throwable $e) {
            Log::warning("$provider userinfo fetch failed", ['error' => $e->getMessage()]);
            return $blank;
        }
    }

    /**
     * The redirect URI sent to the provider. Prefers an explicit config value,
     * otherwise derives an absolute URL from APP_URL via the named route — this
     * guarantees it always matches what you register in the provider portal.
     */
    private function redirectUri(string $provider): string
    {
        return config("services.$provider.redirect")
            ?: route('social.callback', ['provider' => $provider]);
    }

    private function result(string $provider, bool $ok, string $title, ?string $detail)
    {
        return response()->view('social-auth-result', [
            'provider' => $provider,
            'ok'       => $ok,
            'title'    => $title,
            'detail'   => $detail,
        ]);
    }
}
