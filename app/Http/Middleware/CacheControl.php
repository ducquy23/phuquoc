<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheControl
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Cache static assets for 1 year
        if ($request->is('assets/*') || $request->is('build/*') || $request->is('storage/*')) {
            return $response->header('Cache-Control', 'public, max-age=31536000, immutable');
        }

        // Cache images for 1 month
        if ($request->is('*.jpg') || $request->is('*.jpeg') || $request->is('*.png') || $request->is('*.webp') || $request->is('*.gif')) {
            return $response->header('Cache-Control', 'public, max-age=2592000');
        }

        // No cache for HTML pages
        if ($response->headers->get('Content-Type') && str_contains($response->headers->get('Content-Type'), 'text/html')) {
            return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                           ->header('Pragma', 'no-cache')
                           ->header('Expires', '0');
        }

        return $response;
    }
}

