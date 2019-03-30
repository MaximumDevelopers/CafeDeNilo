@extends('layouts.owner.app')
@section('content')

@foreach ($products as $product)
<form action="{{ route('owner.products.update', $product -> id) }}" method="POST">
    @csrf
    @method('PATCH')
<div id="cf" class="container-fluid">

        <div class="col-lg-10">
                <div class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row mb-0">
                                    <h2 id="ct1" class="card-title">Product Details</h2>
     
                            </div>
                            
                            <div class="container mt-0">
                                <br>
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                                @endif

                                        <section>
                                                <h4 id="ct1" class="ml-0" >Product</h4>
                                               
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <input type="text" name="product_name" class="form-control" placeholder="Please enter product name" value="{{$product -> product_name}}">
                                                        </div>
                                                    </div>

                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h5 class="">Product Category</h5>

                                                           <select name="category" class="supplierPicker" style="width: 100%">
                                                            @foreach ($ProductCategorie as $category)
                                                             @if ($product -> category_id === $category -> id )
                                                             <option value="{{$category -> id}}" selected> {{$category -> product_category_name}} </option>  
                                                            @else
                                                            <option value="{{$category -> id}}" > {{$category -> product_category_name}} </option> 
                                                            @endif
                                                                     
                                                        
                                                            @endforeach
                                                           </select>
                                                        </div>
                                                </div>
                               
                                            </div>
                                            <div class="row">
                                                    
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <h5 class="">Time</h5>
                                                            
                                                            <div class="input-group date"  id="datetimepicker3" data-target-input="nearest">
                                                                    <input type="text" name="time" class="form-control datetimepicker-input" data-target="#datetimepicker3" value="{{$product -> prepare_time}}"/>
                                                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                                                    </div>
                                                                </div>        
                                                    </div>
                                            </div>

                                        </div>
                                        </section>

                                                <h4 id="ct1" class="ml-0" >Product Item Composition</h4>
                                            <div class="panel panel-footer" >
                                                <table class="table table-bordered mt-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Name</th>
                                                            <th>Quantity</th>
                                                            
                                                            <th><a href="#" class="fas fa-plus btn btn-sm btn-blue addRow" onclick="addRow()"><i class="glyphicon glyphicon-plus"></i></a></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                        @foreach ($product_item as $product_item)
                                        <tr>
                                       
                                        <td>    
                                            <select name="item_name[]" class="form-control select3" style="width: 100%" required=""> 
                                                    <option value="empty">Select Item Here..</option>
                                                    @foreach ($ItemList as $item_name)
                                                    @if ($product_item -> item_name === $item_name -> item_name )
                                                        <option value="{{$item_name -> id}}" selected> {{$item_name -> item_name}} </option>  
                                                    @else
                                                    <option value="{{$item_name -> id}}"> {{$item_name -> item_name}} </option>  
                                                    @endif

                                                    @endforeach
                                            </select>
                                           
                                        </td>  
                                        
                                        <td><input type="text" name="quantity[]" class="form-control quantity" value="{{$product_item -> quantity}}"></td>
                                        <td><a href="#" class="btn btn-danger btn-md remove far fa-trash-alt"><i class="glyphicon glyphicon-remove"></i></a></td>
                                            
                                        </tr>
                                        @endforeach
                                                       
                                                    </tbody>
                                                    
                                                </table>

                                            </div>
                                            <div class="d-flex justify-content-end">
                                                        <a  class=" btn btn-success btn-sm">Cancel</a>
                                                        <button type="submit" class="btn btn-success btn-sm">Save changes</button>
                                      
                                            </div>
                              
                               </div>
                
                    </div>
                </div>
        </div>
    </div> 

</form> 
@endforeach 
@endsection