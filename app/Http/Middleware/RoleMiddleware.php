<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
   
    public function handle($request, Closure $next, ...$roles)
    {
        foreach ($roles as $role) {
            if(auth()->user()->hasRole($role)) {
                return $next($request);
            }
        }        
        abort(403);
    }
}
