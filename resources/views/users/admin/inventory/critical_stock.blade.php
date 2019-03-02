@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Critical Stock</h2>
                                
                               
                        </div>

                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header blue darken-2">
                                    <h5 class="modal-title" id="exampleModalLabel">Critical Stock</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <form method="POST" action="{{ route('admin.item_list.store')}}">
                                    @csrf
                                    <div class="modal-body mb-1">

                                        <div class="form-group md-form ml-0 mr-0 mb-0">
                                            <i class="fa fa-user prefix"></i>
                                            <input id="item_name" type="text" class="form-control{{ $errors->has('item_name') ? ' is-invalid' : '' }}" name="item_name" value="item_name" required >
                                            <label for="item_name" class="ml-8">{{ __('Item name') }}</label>
            
                                            @if ($errors->has('item_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('item_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    <div class="form-group ml-4 mr-1 mb-5 mt-0 row">
                                      
                                                                               
                                       
                                    </div>

                                    

                                        <div class="form-group md-form ml-0 mr-0">
                                           
                                            <i class="far fa-money-bill-alt prefix"></i>
                                            <input id="item_cost" name="item_cost" type="number" class="form-control{{ $errors->has('item_cost') ? ' is-invalid' : '' }} filterNum" max="99999" min="0" name="item_cost" value="1" required >
                                            <label for="item_cost" class="ml-8">{{ __('Item cost') }}</label>
            
                                            @if ($errors->has('item_cost'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('item_cost') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group md-form ml-0 mr-0">
                                            <i class="fas fa-sort-amount-up prefix"></i>
                                            <input id="item_quantity" max="9999" min="0" type="number" class="form-control{{ $errors->has('item_quantity') ? ' is-invalid' : '' }} filterNum" name="item_quantity" value="1" required >
                                            <label for="item_quantity" class="ml-8">{{ __('Item quantity') }}</label>
            
                                            @if ($errors->has('item_quantity'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('item_quantity') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class=" form-group btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class=" form-group btn btn-primary">Add item</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>        
                    
                    <div class="table-reponsive text-nowrap">

                            <table id="dtCS" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Low Stock</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            
                                            
                                            
                                    
                                        </tr>
                                        <tbody>
                                    </thead>
                                        @foreach ($critical_stock as $item)
                                                <tr>
                                                <td>{{$item -> item_name}}</td>
                                                        <td>{{$item -> quantity}}</td>
                                
                                                        <td>{{$item -> low_stock}}</td>
                                                        
                                                        
                                                                    
                                                      
                                                            
                                                        
                                                        <td>
                                                            <div class="text-center">
                                                                    <a class=" btn-sm form-control btn btn-outline-warning" href="{{ route('admin.stockadjustment.edit',$item -> id)}}" role="button">Stock Adjustment</a>
                                                            </div>
                                
                                                        </td>
                                                        <td>
                                                                <div class="text-center">
                                                                        <a class=" btn-sm form-control btn btn-outline-primary" href="{{ route('admin.stockin.edit',$item -> id)}}" role="button">Stock In</a>
                                                                </div>
                                    
                                                            </td>
                                                        

                                                        
                                                         
                                                       
                                                        
                                                       
                                                        
                                                </tr>
                                                @endforeach                    
                                                
                                               
                                        </tbody>    
                                </table>
                            </div>
                     
                </div>
                
                </div> 
        
                </div>
            </div> 
@endsection