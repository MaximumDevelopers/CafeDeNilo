<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class SalesYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curyear = now()->year;
        $ordered_products = DB::table('ordered_products')
        ->select(DB::raw('sum(price) as total_price , sum(quantity) as quantity, product_name, created_at'))
        ->whereYear('created_at', $curyear)
        ->groupBy(DB::raw('date_format(created_at, \'%Y\')'), 'product_name')
        ->orderBy('quantity', 'desc')
        ->get();

        $graph = DB::table('ordered_products')
        ->select(DB::raw('sum(price) as total_price , sum(quantity) as quantity, product_name'))
        ->whereYear('created_at', $curyear)
        ->groupBy(DB::raw('date_format(created_at, \'%Y\')'), 'product_name')
        ->orderBy('quantity', 'desc')
        ->take(5)
        ->get();


    

    if (Auth::check() && Auth::user()->role == 'barista') {
        return redirect('/barista');
    }
    elseif (Auth::check() && Auth::user()->role == 'owner') {
        return view('users.owner.inventory.sales_by_product')->with('ordered_products', $ordered_products);
    }
    elseif (Auth::check() && Auth::user()->role == 'admin') {
        return view('users.admin.reports.sales_by_product')->with('ordered_products', $ordered_products)->with('graphs', $graph);
        
    }
    else {
        return view('users.captain_crew.inventory.sales_by_product')->with('ordered_products', $ordered_products);
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
