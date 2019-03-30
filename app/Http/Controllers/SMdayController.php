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
        
        $Product = DB::statement("SET time_zone = \"+08:00\"");

        $transaction = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,sum(total_price) as total_price,id'))
        ->whereDate('date', DB::raw('CURDATE()'))
        ->get();

        $transaction2 = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,sum(total_price) as total_price,sum(total_price - (discount + vat)) as net_sales, id'))     
        ->orderBy(DB::raw('date_format(date, \'%d %M %Y\')'), 'desc')
        ->groupBy(DB::raw('date_format(date, \'%d\')'))
        ->get();
        
            /*$profit = DB::table('transactions')
            ->select(DB::raw('(sum(total_price - (discount+vat)) - (select sum(a.result) from (SELECT sum(cl.quantity) as qty, item_name as name, (SELECT  (il.cost * sum(cl.quantity)) FROM item_lists AS il WHERE cl.item_name = il.item_name ) as result FROM critical_level as cl group by cl.item_name)  as a)) as \'profit\''))
            ->whereDate('date', DB::raw('CURDATE()'))
            ->get();*/

        $transaction3 = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%d %M %Y\')as date,sum(total_price - (discount + vat)) as net_sales, id'))
        ->whereDate('date', DB::raw('CURDATE()'))
        ->get();

        $transaction4 = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,sum(discount) as discount , id'))
        ->whereDate('date', DB::raw('CURDATE()'))
        ->get();

        $transaction5 = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,sum(vat) as vat, id'))
        ->whereDate('date', DB::raw('CURDATE()'))
        ->get();

        $date = "day";
    if (Auth::check() && Auth::user()->role == 'barista') {
        return redirect('/barista');
    }
    elseif (Auth::check() && Auth::user()->role == 'owner') {
        return view('users.owner.reports.salessummary')->with('ordered_products', $transaction)->with('ordered_products2', $transaction2)->with('ordered_products3', $transaction3)->with('ordered_products4', $transaction4)->with('ordered_products5', $transaction5)->with('date', $date);
    }
    elseif (Auth::check() && Auth::user()->role == 'admin') {
        return view('users.admin.reports.salessummary')->with('ordered_products', $transaction)->with('ordered_products2', $transaction2)->with('ordered_products3', $transaction3)->with('ordered_products4', $transaction4)->with('ordered_products5', $transaction5)->with('date', $date);
        
    }
    else {
        return view('users.captain_crew.inventory.suppliers')->with('ordered_products', $transaction)->with('ordered_products2', $transaction2)->with('ordered_products3', $transaction3)->with('ordered_products4', $transaction4)->with('ordered_products5', $transaction5);
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
        ->select(DB::raw('date_format(created_at, \'%d %M %Y\')as date, product_name,sum(quantity) as quantity , sum(price) as total_price, transaction_id'))
        ->groupBy('product_name')
        ->where(DB::raw("(date_format(created_at,'%d %M %Y'))"),$id)
        ->get();

        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.owner.reports.salessummaryshow')->with('ordered_products', $SSummaryShow);
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
