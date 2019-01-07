<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Illuminate\Support\Facades\Validator;
use Auth;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = supplier::all();
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return view('users.owner.inventory.suppliers')->with('suppliers', $suppliers);
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return view('users.admin.inventory.suppliers')->with('suppliers', $suppliers);
            
        }
        else {
            return view('users.captain_crew.inventory.suppliers')->with('suppliers', $suppliers);
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

        $supplier = new supplier;
        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->email = $request->input('email');
        $supplier->phone_number = $request->input('phone_number');
        $supplier->address = $request->input('address');
        $supplier->note = $request->input('note');
        $supplier->save();
        return redirect()->route('admin.supplier.index');
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
        $this->validator($request->all())->validate();

        $supplier_id = $request->get('supplier_id');
        $supplier = supplier::find($supplier_id);
        $supplier->supplier_name = $request->get('sName');
        $accounts->email = $request->get('email');
        $supplier->phone_number = $request->input('pNum');
        $supplier->address = $request->input('address');
        $supplier->note = $request->input('note');
        $supplier->save();
        return $this->redirect_route();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'supplier_name' => 'required|string|max:130|unique:suppliers',
        ]);
    }

    protected function redirect_route()
    {
        if (Auth::check() && Auth::user()->role == 'barista') {
            return redirect('/barista');
        }
        elseif (Auth::check() && Auth::user()->role == 'owner') {
            return redirect()->route('owner.supplier.index');
        }
        elseif (Auth::check() && Auth::user()->role == 'captain crew') {
            return redirect('/captaincrew');
        }
        else {
            return redirect()->route('admin.supplier.index');
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
        $supplier_id= $request->get('supplier_id');
        $supplier = supplier::find($supplier_id);
        $supplier->delete();
        return $this->redirect_route();

    }
}
