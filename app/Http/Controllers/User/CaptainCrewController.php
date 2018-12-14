<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaptainCrewController extends Controller
{
    public function index()
    {
        return view('users.captain_crew.index');
    }
}
