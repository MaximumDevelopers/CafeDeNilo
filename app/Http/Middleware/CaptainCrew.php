<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CaptainCrew
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
        if (Auth::check() && Auth::user()->role == 'captain crew') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return redirect('/owner');
        }
        else {
            return redirect('/admin');
        }
    }
}
