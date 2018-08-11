<?php

namespace App\Infrastructure\Middleware;

use Closure;

class UnacceptableMiddleware
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
        $accept = $request->headers->get('accept');

        if($accept && stripos($accept, 'json') === false) {

            return response()->json([
                'error' => [
                    'accept' => [__('auth.json_only')]
                ]
            ], 406);
        }

        return $next($request);
    }
}
