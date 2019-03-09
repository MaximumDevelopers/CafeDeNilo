<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\StockAdjustment;
use App\ItemList;


class StockAdjustmentController extends Controller
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
            return view('users.owner.inventory.stock_adjustment')->with('StockAdjustment', $StockAdjustment);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.inventory.stock_adjustment')->with('StockAdjustment', $StockAdjustment);
           
            
        }
        else {
            return view('users.captain_crew.inventory.stock_adjustment')->with('StockAdjustment', $StockAdjustment);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.admin.inventory.add_stock_adjustment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $StockAdjustment = new StockAdjustment;
        $item_id = $request->get('item_id');
        $item_list= ItemList::find($item_id);
        $item_list ->quantity = $request->get('item_quantity_after');
        $item_list->save();
        $StockAdjustment->note = $request->input('note');
        $StockAdjustment->reason = $request->get('reason');
        $StockAdjustment->item_name= $request->get('item_name');
        $StockAdjustment->stock_before = $request->get('item_quantity_before');
        $StockAdjustment->stock_after = $request->get('item_quantity_after');
        $StockAdjustment->save();
        return redirect()->route('admin.stockadjustment.index');
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
    public function edit(Request $request, $id)
    {           
        $ItemList = ItemList::where('id', $id)
        ->get();

        return view('users.admin.inventory.add_stock_adjustment')->with('ItemList', $ItemList);
        

       
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
