<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        return view('pages.accounts')->with('accounts', $accounts);
    }

    public function __construct()
    {
        $this->middleware('admin');
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
        //
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
        $accounts = account::find($id);
        return view('modal.update', compact('accounts'));
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

          $hashed = Hash::make($request->get('password'));
          $user_id = $request->get('user_id');

          $accounts = account::find($user_id);
          //$accounts->id = $request->get('user_id');
          $accounts->first_name = $request->get('first_name');
          $accounts->last_name = $request->get('last_name');
          $accounts->email = $request->get('email');
          $accounts->password = Hash::make($request->get('password'));
          $accounts->save();
          return redirect()->route('accounts.index');
          
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
        return redirect()->route('accounts.index');
    }
}
