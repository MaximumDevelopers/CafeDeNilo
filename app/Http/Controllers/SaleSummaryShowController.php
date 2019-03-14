<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ordered_products;
use Illuminate\Support\Facades\DB;
use Auth;


class SaleSummaryShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordered_products = DB::table('ordered_products')
        ->select(DB::raw('sum(price) as total_price , sum(quantity) as quantity, product_name'))
        ->groupBy(DB::raw('product_name'))
        ->get();    

if (Auth::check() && Auth::user()->role == 'barista') {
return redirect('/barista');
}
elseif (Auth::check() && Auth::user()->role == 'owner') {
return view('users.owner.inventory.salessummaryshow')->with('ordered_products', $ordered_products);
}
elseif (Auth::check() && Auth::user()->role == 'admin') {
return view('users.admin.reports.salessummaryshow')->with('ordered_products', $ordered_products);

}
else {
return view('users.captain_crew.inventory.salessummaryshow')->with('ordered_products', $ordered_products);
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

        $SSummaryShow = DB::table('ordered_products')
        ->select(DB::raw('date_format(created_at, \'%d %M %Y\')as date, product_name,  sum(quantity) as quantity , sum(price * quantity) as total_price, transaction_id'))
        ->where('transaction_id' , $id)
        ->groupBy('product_name')
        ->get();


      


        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.owner.inventory.salessummaryshow')->with('ordered_products', $SSummaryShow);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.reports.salessummaryshow')->with('ordered_products', $SSummaryShow);
            
        }
        else {
            return view('users.captain_crew.inventory.salessummaryshow')->with('ordered_products', $SSummaryShow);
        }    
        
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
