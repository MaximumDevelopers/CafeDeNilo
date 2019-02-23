<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategories;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProductCategories = ProductCategories::all();
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.admin.products.product_categories')->with('ProductCategories', $ProductCategories);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.products.product_categories')->with('ProductCategories', $ProductCategories);
            
        }
        else {
            return view('users.captain_crew.items.product_categories')->with('ProductCategories', $ProductCategories);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'category_name' => 'required|string|max:255',
        ]);
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

        $post = new ProductCategories;
        $post->product_category_name = $request->input('category_name');
        $post->save();
        return $this->redirect_route();
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
        $category_id = $request->get('cat_id');

        $category = ProductCategories::find($category_id);
        $category->category_name = $request->get('product_category_name');
        $category->save();
        return $this->redirect_route();
    }

    protected function redirect_route()
    {
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return redirect()->route('owner.ProductCategories.index');
        }
        elseif (Auth::check() && Auth::user()->role == 'captain crew') {
            return redirect('/captaincrew');
        }
        else {
            return redirect()->route('admin.productcategories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $category_id = $request->get('cat_id');
        $category = ProductCategories::find($category_id);
        $category->delete();
        return $this->redirect_route();
    }
}
