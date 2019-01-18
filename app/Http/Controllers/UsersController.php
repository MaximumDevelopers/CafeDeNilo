<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = account::all();
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.owner.accounts')->with('accounts', $accounts);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.accounts')->with('accounts', $accounts);
        }
        else {
            return redirect('/captaincrew');
        }
    }

        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //Todo
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {          
          $this->validator($request->all())->validate();

          //$hashed = Hash::make($request->get('password'));
          $user_id = $request->get('user_id');

          $accounts = account::find($user_id);
          //$accounts->id = $request->get('user_id');
          $accounts->first_name = $request->get('first_name');
          $accounts->last_name = $request->get('last_name');
          $accounts->email = $request->get('email');
          $accounts->role = $request->get('role');
          $accounts->password = Hash::make($request->get('password'));
          $accounts->save();
          return $this->redirect_route();
          //return redirect()->route('admin.accounts.index');
          
    }

    protected function redirect_route()
    {
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return redirect()->route('owner.accounts.index');
        }
        elseif (Auth::check() && Auth::user()->role == 'captain crew') {
            return redirect('/captaincrew');
        }
        else {
            return redirect()->route('admin.accounts.index');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'user_id' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
        *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //$this->validator($request->all())->validate();
        
        $user_id = $request->get('user_id');
        $accounts = account::find($user_id);
        $accounts->delete();
        return $this->redirect_route();
    }
}
