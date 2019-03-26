<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemList;
use App\categories;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

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
        //$category = categories::select('category_name')->get();
        $categories = categories::select('id', 'category_name')->get();
        
        
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.admin.items.item_list')->with('item_list', $item_list)->with('categories', $categories);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.items.item_list')->with('item_list', $item_list)->with('categories', $categories);
            
        }
        else {
            return view('users.captain_crew.items.item_list')->with('item_list', $item_list)->with('categories', $categories);
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
        //$this->validator($request->all())->validate();
        
        //$suppliers = supplier::select('id')->get();

        $item_list = new ItemList;
        $item_list ->item_name = $request->get('item_name');
        $item_list ->cost = $request->get('item_cost');
        $item_list ->quantity = $request->get('item_quantity');
        $item_list ->low_stock = $request->get('low_stock');
        $cost = $request->get('item_cost');
        $item_list ->price = $this -> price($cost);
        $item_list ->stock_in_date = Carbon::now();
        
        //get CategoryID
        if ( $request->input('addCategories') != 'empty')
        {
            $item_list ->category_id = $request->get('addCategories');
        }

        $item_list -> save();
       
        return $this->redirect_route();
    }

    public function price($cost)
    {
        $price = ($cost * .50) + $cost;
        return $price;
    }

    protected function redirect_route()
    {
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return redirect()->route('owner.item_list.index');
        }
        elseif (Auth::check() && Auth::user()->role == 'captain crew') {
            return redirect('/captaincrew');
        }
        else {
            return redirect()->route('admin.item_list.index');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'item_name' => 'required|string|max:130|unique:item_list',
            'item_cost' => 'required|numeric|max:99999|min:0|unique:item_list',
            'item_quantity' => 'required|numeric|max:9999|min:0|unique:item_list',
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
        $item_id = $request->get('item_id');
        $item_list= ItemList::find($item_id);
        
        $item_list ->item_name = $request->get('item_name');
        $item_list ->cost = $request->get('item_cost');
        //$item_list ->quantity = $request->get('item_quantity');
        $cost = $request->get('item_cost');
        $item_list ->price = $this -> price($cost);

        //get CategoryID
        if ( $request->input('editCategories') != 'empty')
        {
            $item_list ->category_id = $request->get('editCategories');
        }

        else
        {
            $item_list ->category_id = $request->get('');
        }
                
        $item_list->save();
        return $this->redirect_route();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $item_id = $request->get('item_id');
        $item = ItemList::find($item_id);
        $item->delete();
        return $this->redirect_route();
    }
}
