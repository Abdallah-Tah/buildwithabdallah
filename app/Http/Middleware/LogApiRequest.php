<?php

namespace App\Http\Middleware;

use App\Models\ApiRequestLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class LogApiRequest
{
    public function handle(Request $request, Closure $next): Response
    {
        $startedAt = microtime(true);

        try {
            /** @var Response $response */
            $response = $next($request);
        } catch (Throwable $throwable) {
            ApiRequestLog::query()->create([
                'user_id' => $request->user()?->id,
                'method' => $request->method(),
                'path' => $request->path(),
                'route_name' => optional($request->route())->getName(),
                'status_code' => 500,
                'ip_address' => $request->ip(),
                'user_agent' => str($request->userAgent())->limit(1000)->toString(),
                'token_name' => $request->user()?->currentAccessToken()?->name,
                'abilities' => json_encode($request->user()?->currentAccessToken()?->abilities ?? []),
                'request_payload' => str(json_encode($request->except(['password', 'token'])))->limit(5000)->toString(),
                'response_payload' => str($throwable->getMessage())->limit(5000)->toString(),
                'duration_ms' => (int) ((microtime(true) - $startedAt) * 1000),
            ]);

            throw $throwable;
        }

        ApiRequestLog::query()->create([
            'user_id' => $request->user()?->id,
            'method' => $request->method(),
            'path' => $request->path(),
            'route_name' => optional($request->route())->getName(),
            'status_code' => $response->getStatusCode(),
            'ip_address' => $request->ip(),
            'user_agent' => str($request->userAgent())->limit(1000)->toString(),
            'token_name' => $request->user()?->currentAccessToken()?->name,
            'abilities' => json_encode($request->user()?->currentAccessToken()?->abilities ?? []),
            'request_payload' => str(json_encode($request->except(['password', 'token'])))->limit(5000)->toString(),
            'response_payload' => str($response->getContent())->limit(5000)->toString(),
            'duration_ms' => (int) ((microtime(true) - $startedAt) * 1000),
        ]);

        return $response;
    }
}
