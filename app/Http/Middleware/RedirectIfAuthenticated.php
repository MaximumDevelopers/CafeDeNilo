<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::check() && Auth::user()->role == 'admin') {
                return redirect('/admin');
            }
            elseif (Auth::check() && Auth::user()->role == 'owner') {
                return redirect('/owner');
            }
            elseif (Auth::check() && Auth::user()->role == 'captain crew') {
                return redirect('/captaincrew');
            }
            else {
                return redirect('/barista');
            }
        }
        
        return $next($request);
    }
}
