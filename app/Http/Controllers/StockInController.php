<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\StockAdjustment;
use App\ItemList;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $StockAdjustment= StockAdjustment::all();
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.owner.inventory.stock_in')->with('StockAdjustment', $StockAdjustment);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.inventory.stock_in')->with('StockAdjustment', $StockAdjustment);
           
            
        }
        else {
            return view('users.captain_crew.inventory.stock_in')->with('StockAdjustment', $StockAdjustment);
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
        
        $item_id = $request->get('item_id');
        $item_list= ItemList::find($item_id);
        $before = $request->get('item_quantity_before');
        $add = $request->get('item_quantity_after');
        $total = $before + $add;
        $item_list ->quantity = $total;
        $item_list->save();
        return redirect()->route('admin.item_list.index');
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

        return view('users.admin.inventory.stock_in')->with('ItemList', $ItemList);
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
