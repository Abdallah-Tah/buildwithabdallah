<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SocialTokenController extends Controller
{
    /**
     * Return the stored LinkedIn access token for the posting bot.
     *
     * The token is stored Crypt-encrypted in social_accounts.access_token
     * (model casts it 'encrypted', so reading the attribute decrypts it).
     * This returns a live credential, so it is gated behind the
     * `social-tokens:read` Sanctum ability, HTTPS-only, and every access
     * is logged.
     */
    public function linkedin(Request $request): JsonResponse
    {
        // Never hand a live credential over plaintext HTTP.
        if (! $request->secure() && ! app()->environment('local', 'testing')) {
            throw new NotFoundHttpException();
        }

        $account = SocialAccount::query()->where('provider', 'linkedin')->first();

        if ($account === null) {
            return response()->json([
                'message' => 'No LinkedIn account connected.',
            ], 404);
        }

        Log::warning('LinkedIn access token retrieved via API', [
            'token_id'   => $request->user()?->currentAccessToken()?->id,
            'token_name' => $request->user()?->currentAccessToken()?->name,
            'user_id'    => $request->user()?->id,
            'ip'         => $request->ip(),
            'account_id' => $account->id,
            'expired'    => $account->isExpired(),
        ]);

        return response()->json([
            'data' => [
                // Cast decrypts transparently on access.
                'access_token' => $account->access_token,
                'author_urn'   => config('services.linkedin.author_urn'),
                'expires_at'   => $account->expires_at?->toIso8601String(),
            ],
        ]);
    }

    /**
     * Return the stored Gumroad access token for the posting bot.
     *
     * Same contract as linkedin(): the token lives Crypt-encrypted in
     * social_accounts.access_token, this is gated behind the
     * `social-tokens:read` Sanctum ability, HTTPS-only, and every access is
     * logged. Gumroad tokens do not expire (expires_at is null).
     */
    public function gumroad(Request $request): JsonResponse
    {
        // Never hand a live credential over plaintext HTTP.
        if (! $request->secure() && ! app()->environment('local', 'testing')) {
            throw new NotFoundHttpException();
        }

        $account = SocialAccount::query()->where('provider', 'gumroad')->first();

        if ($account === null) {
            return response()->json([
                'message' => 'No Gumroad account connected.',
            ], 404);
        }

        Log::warning('Gumroad access token retrieved via API', [
            'token_id'   => $request->user()?->currentAccessToken()?->id,
            'token_name' => $request->user()?->currentAccessToken()?->name,
            'user_id'    => $request->user()?->id,
            'ip'         => $request->ip(),
            'account_id' => $account->id,
            'expired'    => $account->isExpired(),
        ]);

        return response()->json([
            'data' => [
                // Cast decrypts transparently on access.
                'access_token' => $account->access_token,
                'scope'        => $account->scope,
                'expires_at'   => $account->expires_at?->toIso8601String(),
            ],
        ]);
    }
}
