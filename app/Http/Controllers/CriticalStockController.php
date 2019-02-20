<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\ItemList;
use App\categories;

class CriticalStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_list = ItemList::all();
        $categories = categories::select('id', 'category_name')
        ->get();
        
        
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.admin.inventory.critical_stock')->with('critical_stock', $item_list)->with('categories', $categories);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.inventory.critical_stock')->with('critical_stock', $item_list)->with('categories', $categories);
            
        }
        else {
            return view('users.captain_crew.inventory.critical_stock')->with('critical_stock', $item_list)->with('categories', $categories);
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
