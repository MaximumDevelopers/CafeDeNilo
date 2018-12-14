<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo( ) 
    {
        if (\Auth::check() && \Auth::user()->role == 'barista') {
			return '/barista';
		}
		elseif (Auth::check() && Auth::user()->role == 'owner') {
            return '/owner';
        }
        elseif (Auth::check() && Auth::user()->role == 'captain crew') {
            return '/captaincrew';
        }
		else {
			return '/admin';
        } 
        
    }
}
