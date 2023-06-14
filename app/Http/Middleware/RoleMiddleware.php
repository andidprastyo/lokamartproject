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
    public function handle($request, Closure $next, $role){
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();
        if ($user->role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
