<?php

namespace App\Http\Controllers;
use App\User;
use App\ordered_products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;

class SalesSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = DB::table('transactions')
<<<<<<< HEAD
            ->select(DB::raw('date_format(date, \'%d %M %Y\')as date, total_price as total_price, id'))
=======
            ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,sum(total_price) as total_price, id'))
            
            ->get();

            $transaction2 = DB::table('transactions')
            ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,total_price as total_price ,(total_price - discount + vat) as net_sales, id'))
            ->orderBy(DB::raw('date_format(date, \'%d\')'), 'desc')
           ->groupBy(DB::raw('date_format(date, \'%d\')'))
            ->get();
            
            $transaction3 = DB::table('transactions')
            ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,(sum(total_price) - discount + vat) as net_sales, id'))
>>>>>>> f3893b7525b50be24f931f20a04959593fbfb466
            ->get();

            $transaction4 = DB::table('transactions')
            ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,sum(discount) as discount, id'))
            ->get();

            $transaction5 = DB::table('transactions')
            ->select(DB::raw('date_format(date, \'%d %M %Y\')as date ,sum(vat) as vat, id'))
            ->get();


            $date = "day";
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.owner.inventory.suppliers')->with('ordered_products', $transaction)->with('ordered_products2', $transaction2)->with('ordered_products3', $transaction3)->with('ordered_products4', $transaction4)->with('ordered_products5', $transaction5);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.reports.salessum_transaction')->with('ordered_products', $transaction)->with('ordered_products2', $transaction2)->with('ordered_products3', $transaction3)->with('ordered_products4', $transaction4)->with('ordered_products5', $transaction5)->with('date', $date);
            
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
        $data = transaction::all();
        return response()->json(['array'=>$data]);
        //return response()->json($data);
        
    }
    public function showProduct($id)
    {
        $data = transaction::all();
        //return response()->json(['array'=>$data]);
        //return response()->json($data);
        
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

          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        return $transaction = DB::table('ordered_products')
            ->select('id','product_name', 'quantity', 'price')
            ->get();
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
