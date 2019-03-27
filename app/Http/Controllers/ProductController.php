<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemList;
use App\ProductItems;
use App\ProductCategories;
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
        $Product = DB::select("select p.id, pc.product_category_name pname, p.product_name, (sum(i.price * ing.quantity)) price
        from products p
        Join product_items ing on p.id = ing.products_id
        JOIN  item_lists i ON ing.item_list_id = i.id
        JOIN product_categories pc on p.category_id = pc.id
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
        $ProductCategories = ProductCategories::all();

        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.admin.products.product_show')->with('ProductCategories', $ProductCategories)->with('ItemList', $ItemList);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.products.product_show')->with('ProductCategories', $ProductCategories)->with('ItemList', $ItemList);
            
        }
        else {
            return view('users.captain_crew.products.product_show')->with('ProductCategories', $ProductCategories)->with('ItemList', $ItemList);
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
        $product->category_id=  $request->input('category');
        $product->prepare_time =  $request->input('time');

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
        $ItemList = ItemList::all();
        $ProductCategories = ProductCategories::all();

        $products = Products::all()
            ->where('id', '=', $id);
    
        $Product_item = DB::table('product_items')
                     ->join('item_lists', 'product_items.item_list_id', '=', 'item_lists.id')
                     ->select('item_lists.item_name', 'product_items.quantity', 'item_lists.price')
                     ->where('product_items.products_id', '=', $id)
                     ->get();
                        
        return view('users.admin.products.product_details')->with('product_item', $Product_item)->with('products', $products)->with('ItemList', $ItemList)->with('ProductCategorie', $ProductCategories);
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
        /*$name = DB::table('products')
        ->select('product_name')
        ->where('id', '=', $id)
        ->get();*/

        $Products = Products::find($id);
        
        $Products ->product_name = $request->get('product_name');
        $Products ->category_id = $request->get('category');
        $Products ->prepare_time = $request->get('time');

        $query = DB::table('Product_Items')
        ->where('products_id',$id )
        ->delete();

        //$item_list ->quantity = $request->get('item_quantity');
        //$cost = $request->get('item_cost');
        
        $Products->save();

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
        return $this->redirect_route();
    }

    protected function redirect_route()
    {
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return redirect()->route('owner.products.index');
        }
        elseif (Auth::check() && Auth::user()->role == 'captain crew') {
            return redirect('/captaincrew');
        }
        else {
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $item_id = $request->get('Prod_id');
        $item = Products::find($item_id );
        $item->delete();
        
        $query = DB::table('Product_Items')
        ->where('products_id',$item_id )
        ->delete();

        return $this->redirect_route();
    }
}
