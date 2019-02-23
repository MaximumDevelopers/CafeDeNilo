<?php

namespace App\Http\Controllers;
use Auth;
use App\Products;

use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product_details = Products::all();
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.admin.products.product_details')->with('Product', $Product_details);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.products.product_details')->with('Product', $Product_details);
            
        }
        else {
            return view('users.captain_crew.products.product_details')->with('Product', $Product_details);
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
