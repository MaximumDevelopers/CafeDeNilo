<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaristaController extends Controller
{
    public function index()
    {
        return view('users.barista.index');
    }
}
