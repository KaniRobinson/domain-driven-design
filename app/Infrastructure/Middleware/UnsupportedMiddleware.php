<?php

namespace App\Infrastructure\Middleware;

use Closure;

class UnsupportedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $type = $request->headers->get('content-type');
        
        if(stripos($type, 'application/json') !== 0) {
            return response(__('auth.unsupported_media_type'), 415);
        }

        return $next($request);
    }
}
