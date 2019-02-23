<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemList;
use App\ProductItems;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $Product = DB::select("select p.id, p.product_name, (sum(i.price * ing.quantity)) price
        from products p
        Join product_items ing on p.id = ing.products_id
        JOIN  item_lists i ON ing.item_list_id = i.id
        group by p.product_name");

        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.admin.products.products')->with('Product', $Product);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.products.products')->with('Product', $Product);
            
        }
        else {
            return view('users.captain_crew.products.products')->with('Product', $Product);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ItemList = ItemList::all();

        

        $Product = Products::all();
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.admin.products.product_show')->with('Product', $Product)->with('ItemList', $ItemList);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.products.product_show')->with('Product', $Product)->with('ItemList', $ItemList);
            
        }
        else {
            return view('users.captain_crew.products.product_show')->with('Product', $Product)->with('ItemList', $ItemList);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Products;
        $product->product_name =  $request->input('product_name');

        $product->save();

    
        
        $id = DB::getPdo()->lastInsertId();
        
        if(count($request->item_name) > 0)
        {
        foreach($request->item_name as $item=>$v){
            $data2=array(
                'item_list_id'=>$request->item_name[$item],
                'quantity' =>$request->quantity[$item],
                'products_id'=>$id,
            );
            ProductItems::insert($data2);
      }
      
        }
        return redirect()->back()->with('success','data insert successfully');
            
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


        return $Product = DB::table('product_items')
                     ->join('item_lists', 'product_items.item_list_id', '=', 'item_lists.id')
                     ->select('item_lists.item_name', 'product_items.quantity')
                     ->where('product_items.products_id', '=', $id)
                     ->get();

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
