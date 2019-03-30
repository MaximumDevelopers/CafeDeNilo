<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\ItemList;


class CriticalStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       //return $date = strtotime("+3 day");

        /*$item_list = DB::table('item_lists')
                ->select('updated_at','item_name', 'quantity', 'low_stock', 'id')
                ->whereDate('updated_at', $date)
                ->get();*/

        $item_list = DB::select('select item_lists.updated_at, item_lists.item_name, item_lists.quantity as quantity, dan.qty, round(dan.qty) as low_stock, item_lists.id from item_lists join (select item_name, ((sum(a.quantity)/7))*3 as qty from (select il.item_name, sum(cl.quantity) as quantity, cl.date from item_lists il right  join critical_level cl on cl.item_name = il.item_name where date_format(il.stock_in_date, \'%Y-%m-%d\') <=  il.stock_in_date + interval 2 day group by il.item_name, cl.date) as a group by item_name) dan on dan.item_name = item_lists.item_name having item_lists.quantity <= dan.qty');
                       
        
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.owner.inventory.critical_stock')->with('critical_stock', $item_list);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.inventory.critical_stock')->with('critical_stock', $item_list);
            
        }
        else {
            return view('users.captain_crew.inventory.critical_stock')->with('critical_stock', $item_list);
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
        $ItemList = ItemList::where('id', $id)
        ->get();

        return view('users.admin.inventory.add_stock_adjustment')->with('critical_stock', $ItemList);
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
