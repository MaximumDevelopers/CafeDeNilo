<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class SMdayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%d %M %Y\') as date, email, total_price as total_price, id'))
        ->whereDate('date', DB::raw('CURDATE()'))
        ->groupBy(DB::raw('date_format(date, \'%d\')'))
        ->get();

    if (Auth::check() && Auth::user()->role == 'barista') {
        return redirect('/barista');
    }
    elseif (Auth::check() && Auth::user()->role == 'owner') {
        return view('users.owner.inventory.suppliers')->with('transactions', $transaction);
    }
    elseif (Auth::check() && Auth::user()->role == 'admin') {
        return view('users.admin.reports.salessummary')->with('transactions', $transaction);
        
    }
    else {
        return view('users.captain_crew.inventory.suppliers')->with('transactions', $transaction);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
