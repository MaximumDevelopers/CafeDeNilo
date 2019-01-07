<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemList;
use App\categories;
use App\Supplier;
use Auth;


class ItemListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_list = ItemList::all();
        $category = categories::select('category_name')->get();
        $suppliers = supplier::select('supplier_name')->get();
        
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.admin.items.item_list')->with('item_list', $item_list)->with('category', $category)->with('suppliers', $suppliers);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.items.item_list')->with('item_list', $item_list)->with('category', $category)->with('suppliers', $suppliers);
            
        }
        else {
            return view('users.captain_crew.items.item_list')->with('item_list', $item_list)->with('category', $category)->with('suppliers', $suppliers);
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
        $this->validator($request->all())->validate();

        $item_list = new categories;
        $item_list ->supplier_name = $request->input('supplier_name');
        $item_list ->save();
        return $this->redirect_route();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'item_name' => 'required|string|max:130|unique:item_list',
        ]);
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
