<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        /*$Data = array('title' => 'Welcome to Cafe de\' Nilo',
                'services' => ['Web Design', 'Programming', 'SEO']);
        return view('pages.index')->with($Data);*/
        return view("auth.login");
    }

    public function about()
    {
        return view('users.admin.inventory.suppliers');
    }

    public function MSample()
    {
        return view('pages.MS');
    }
    

    public function login()
    {
        return view('login');
    }
    
}
