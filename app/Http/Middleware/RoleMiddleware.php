<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        

    if (auth()->check()) {
        $userRole = auth()->user()->role;
        if ($userRole == 'admin' || $userRole == 'guru') {
            return $next($request);
        }
    }
    return abort(404);
        
      
    }
}