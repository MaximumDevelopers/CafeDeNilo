<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;

class SalesByProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ordered_products = DB::table('ordered_products')
                     ->select(DB::raw('sum(price * quantity) as total_price , sum(quantity) as quantity, product_name, created_at'))
                     ->whereDate('created_at', DB::raw('CURDATE()'))
                     ->groupBy(DB::raw('product_name'))
                     ->orderBy('quantity', 'desc')
                     ->get(); 

        $graph= DB::table('ordered_products')
                     ->select(DB::raw('sum(price) as total_price , sum(quantity) as quantity, product_name'))
                     ->whereDate('created_at', DB::raw('CURDATE()'))
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
        $SSummaryShow = DB::table('ordered_products')
        ->select(DB::raw('date_format(date, \'%d %M %Y\')as date', 'product_name',  'quantity' , 'price as total_price'))
        
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
