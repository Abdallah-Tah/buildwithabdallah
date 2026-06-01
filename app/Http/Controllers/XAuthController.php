<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class XAuthController extends Controller
{
    /**
     * Handle OAuth callback from X - just capture the verifier and display it
     * GET /api/x/callback?oauth_token=...&oauth_verifier=...
     */
    public function callback(Request $request)
    {
        $oauthToken = $request->query('oauth_token');
        $oauthVerifier = $request->query('oauth_verifier');

        if (!$oauthToken || !$oauthVerifier) {
            return response()->view('x-auth-success', [
                'screenName' => 'Error',
                'userId' => 'Missing oauth_token or oauth_verifier',
            ]);
        }

        // Store in a simple JSON file the Pi can read
        $data = [
            'oauth_token' => $oauthToken,
            'oauth_verifier' => $oauthVerifier,
            'timestamp' => now()->toISOString(),
        ];

        file_put_contents(storage_path('app/x_oauth_verifier.json'), json_encode($data, JSON_PRETTY_PRINT));

        Log::info('X OAuth callback received', $data);

        return response()->view('x-auth-success', [
            'screenName' => 'Authorization Captured!',
            'userId' => 'The bot will now exchange this for an access token.',
        ]);
    }

    /**
     * Check if verifier was received
     * GET /api/x/status
     */
    public function status()
    {
        $verifierFile = storage_path('app/x_oauth_verifier.json');
        $hasVerifier = file_exists($verifierFile);
        $envPath = base_path('.env');
        $envContent = file_exists($envPath) ? file_get_contents($envPath) : '';
        
        $hasAccessToken = str_contains($envContent, 'X_ACCESS_TOKEN=') && 
            !str_contains($envContent, 'X_ACCESS_TOKEN=' . "\n") &&
            !str_contains($envContent, 'X_ACCESS_TOKEN=') === false;

        return response()->json([
            'verifier_received' => $hasVerifier,
            'connected' => (bool) env('X_ACCESS_TOKEN'),
            'screen_name' => env('X_SCREEN_NAME'),
            'user_id' => env('X_USER_ID'),
        ]);
    }
}
