<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\transactions;
use App\ordered_products;

class SMmonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $date = now()->month;
         $year = now()->year;
         $my = date('F Y');
        $transaction = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(total_price) as total_price, id'))
   
        ->whereMonth('date', $date)
        ->whereYear('date', $year)
        ->get();

        $transaction2 = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(total_price) as total_price ,sum(total_price - (discount + vat)) as net_sales, id'))
        ->orderBy(DB::raw('date_format(date, \'%M %Y\')'), 'desc')
       ->groupBy(DB::raw('date_format(date, \'%M\')'))
        ->get();
        
        $transaction3 = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(total_price - (discount + vat)) as net_sales, id'))
       
        ->whereMonth('date', $date)
        ->whereYear('date', $year)
        ->get();

       /*$profit = DB::table('transactions')
       ->select(DB::raw('(sum(total_price - (discount+vat)) - (select sum(a.result) from (SELECT sum(cl.quantity) as qty, item_name as name, (SELECT  (il.cost * sum(cl.quantity)) FROM item_lists AS il WHERE cl.item_name = il.item_name ) as result FROM critical_level as cl group by cl.item_name)  as a)) as \'profit\''))
       ->whereMonth('date', $date)
        ->whereYear('date', $year)
        ->get();*/

        $transaction4 = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(discount) as discount, id'))
        
        ->whereMonth('date', $date)
        ->whereYear('date', $year)
        ->get();

        $transaction5 = DB::table('transactions')
        ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(vat) as vat, id'))
        ->whereMonth('date', $date)
        ->whereYear('date', $year)
        ->get();


$date = "month";
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
        return view('users.captain_crew.inventory.suppliers')->with('ordered_products', $transaction)->with('ordered_products2', $transaction2)->with('ordered_products3', $transaction3)->with('ordered_products4', $transaction4)->with('ordered_products5', $transaction5)->with('date', $date);
    }    
        
    }

    public function prnpriview()
    {
        $date = now()->month;
        $year = now()->year;
        $my = date('F Y');
       $transaction = DB::table('transactions')
       ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(total_price) as total_price, id'))
  
       ->whereMonth('date', $date)
       ->whereYear('date', $year)
       ->get();

       $transaction2 = DB::table('transactions')
       ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(total_price) as total_price ,sum(total_price - (discount + vat)) as net_sales, id'))
       ->orderBy(DB::raw('date_format(date, \'%M %Y\')'), 'desc')
      ->groupBy(DB::raw('date_format(date, \'%M\')'))
       ->get();
       
       $transaction3 = DB::table('transactions')
       ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(total_price - (discount + vat)) as net_sales, id'))
      
       ->whereMonth('date', $date)
       ->whereYear('date', $year)
       ->get();

      /*$profit = DB::table('transactions')
      ->select(DB::raw('(sum(total_price - (discount+vat)) - (select sum(a.result) from (SELECT sum(cl.quantity) as qty, item_name as name, (SELECT  (il.cost * sum(cl.quantity)) FROM item_lists AS il WHERE cl.item_name = il.item_name ) as result FROM critical_level as cl group by cl.item_name)  as a)) as \'profit\''))
      ->whereMonth('date', $date)
       ->whereYear('date', $year)
       ->get();*/

       $transaction4 = DB::table('transactions')
       ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(discount) as discount, id'))
       
       ->whereMonth('date', $date)
       ->whereYear('date', $year)
       ->get();

       $transaction5 = DB::table('transactions')
       ->select(DB::raw('date_format(date, \'%M %Y\')as date ,sum(vat) as vat, id'))
       ->whereMonth('date', $date)
       ->whereYear('date', $year)
       ->get();


$date = "month";
          return view('salesmonth')->with('ordered_products', $transaction)->with('ordered_products2', $transaction2)->with('ordered_products3', $transaction3)->with('ordered_products4', $transaction4)->with('ordered_products5', $transaction5)->with('date', $date);
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
        /*$SSummaryShow = DB::table('ordered_products')
        ->select(DB::raw('date_format(created_at, \'%M %Y\')as date, product_name,  quantity, price as total_price,id'))
        ->groupBy(DB::raw('date_format(created_at, \'%M %Y\'),id'))   
        //->where(DB::raw('date_format(created_at)'), '=', '' )
        ->get();*/
    
        $SSummaryShow = DB::table('ordered_products')
        ->select(DB::raw('date_format(created_at, \'%M %Y\')as date, product_name,  sum(quantity) as quantity , sum(price) as total_price, transaction_id'))
        ->groupBy('product_name')
        ->where(DB::raw("(date_format(created_at,'%M %Y'))"),$id)
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
