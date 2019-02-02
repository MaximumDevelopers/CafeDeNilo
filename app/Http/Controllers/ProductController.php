<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\ItemList;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Products::all();
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
        return view('users.admin.products.product_show');
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
        $product->product_name = 'God tae';
        

        $product->save();
        $data = ['quantity' => 1, 'quantity' => 2,  ];
        $category = ItemList::find([11, 13]);
        $product->ItemList()->attach($category,$data);
         
        

        /*$data=$request->all();
        if(count($request->product_name) > 0)
        {
        foreach($request->product_name as $item=>$v){
            $data2=array(
                'product_name'=>$request->product_name[$item]
            );
        Products::insert($data2);
      }
        }
        return redirect()->back()->with('success','data insert successfully');*/
            
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
