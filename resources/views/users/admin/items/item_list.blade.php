@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Items</h2>
                                
                                <button type="button" class="btn btn-primary btn-sm ml-auto btnLogin" 
                                data-toggle="modal" data-target="#modalAdd">Add Items
                                </button>
                        </div>

                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header blue darken-2">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Items</h5>
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

                                    <div class="form-group ml-4 mr-1 mb-0 mt-0 row">
                                      
                                        <select name="addCategories" id="addCategories" class="categoryPicker form-control md-form" data-style="btn-primary">
                                                <option value="empty">Select Category Here..</option>
                                                @foreach ($category as $category)
                                                    <option value="{{$category -> id}}">{{$category -> category_name}}</option>
                                                @endforeach
                                            
                                        </select>                                          
                                       
                                    </div>

                                    <div class="form-group ml-4 mr-1 mb-5 row">                                       
                                            <select name="addSupplier" id="addSupplier" class="supplierPicker form-control md-form" data-style="btn-success">
                                                <option value="empty">Select Supplier Here..</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{$supplier -> id}}">{{$supplier -> supplier_name}}</option>
                                                @endforeach
                                            </select>                                                                                  
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

                            <table id="dtItem" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">In stock</th>
                                            <th scope="col">Price</th>
                                            

                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                    
                                        </tr>
                                        <tbody>
                                    </thead>
                                        @if (count($item_list) >= 0)
                                            @foreach ($item_list as $item_list)        
                                                <tr>
          
                                                        <td id="dtShow"></td>
                                                        <td>{{$item_list -> item_name}}</td>
                                                        <td>Category</td>
                                                        <td>{{$item_list -> quantity}}</td>
                                                        <td>&#8369;{{$item_list -> price}}</td>
                                                                    
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="margin: 0%" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#modalCategoryEdit" style="font-size: 1rem;">SHOW</button>
                                                            </div>
                                                        </td>

                                                        <td class="text-center">      
                                                            <button type="submit" style="margin: 0%" class="fa fa-trash btn btn-red btn-md" data-toggle="modal"  data-target="#modalCategoryDel" style="font-size: 1rem; "></button>
                                                        </td>
                                                         
                                                        <!--Edit Account-->
                                                        <div class="modal fade" id="modalCategoryEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header yellow darken-2">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST" action="">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="modal-body mx-3">

                                                                        <div class="form-group md-form ml-0 mr-0">
                                                                                <i class="far fa-list-alt prefix grey-text"></i>
                                                                                <input id="cat_edit" type="text" class="form-control" name="category_name" value="" required>
                                                                                <label for="cat_edit" class="ml-8">{{ __('Category Name') }}</label>
                                                                                <input type="hidden" name="cat_id" id="cat_id" value=""> 
                                                                        </div>
                                                                          
                                                                        </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Edit Account-->
                                                        
                                                        <!--Delete Account-->
                                                            <div class="modal fade" id="modalCategoryDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #b71c1c;">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                    <div class="modal-body">
                                                                        <h5><p>Are you sure you want to delete this category?</p></h5>
                                                                        <input type="hidden" name="cat_id" id="cat_id" value="">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                                        
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Delete Account-->
                                                        
                                                </tr>
                                                @endforeach                    
                                                
                                                @else
                                                    <p>No post</p>
                                                @endif 
                                        </tbody>    
                                </table>
                            </div>
                     
                </div>
                
                </div> 
        
                </div>
            </div> 
@endsection