<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Barista
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
        if (Auth::check() && Auth::user()->role == 'barista') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return redirect('/owner');
        }
        elseif (Auth::check() && Auth::user()->role == 'captain crew') {
            return redirect('/captaincrew');
        }
        else {
            return redirect('/admin');
        }
    }
}
