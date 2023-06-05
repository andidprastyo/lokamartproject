<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "user" && Auth::guard($guard)->check()) {
            return redirect('/cart');
        }
        if ($guard == "guest" && Auth::guard($guard)->check()) {
            return redirect('/login');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
    }
}