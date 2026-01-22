<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);

        
    // }

    public function handle($request, Closure $next, ...$role)
    {
        if (!Auth::check() || !in_array(Auth::user()->role, $role)) {
            abort(403);
        }
        return $next($request);
    }
}
