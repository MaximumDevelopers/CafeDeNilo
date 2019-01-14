@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Suppliers</h2>
                                
                                <button type="button" class="btn btn-primary btn-sm ml-auto btnLogin" 
                                data-toggle="modal" data-target="#modalAdd">Add Supplier
                                </button>
                        </div>
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header blue darken-2">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            <form method="POST" action="">
                                    @csrf
                                    @method('')
                                    <div class="modal-body mb-1">
                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-truck prefix"></i>
                                                    <input id="supplier_name" type="text" class="form-control" name="supplier_name" value="" required>
                                                    <label for="supplier_name" class="ml-8">{{ __('Supplier Name') }}</label>
  
                                            </div>

                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-envelope prefix"></i>
                                                    <input id="email" type="email" class="form-control" name="email" value="" >
                                                    <label for="email" class="ml-8">{{ __('Email') }}</label>

                                                    @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif                                
    
                                            </div>
                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-phone prefix"></i>
                                                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="" >
                                                    <label for="phone_number" class="ml-8">{{ __('Phone Number') }}</label>
     
                                            </div>

                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-map-marker-alt prefix"></i>
                                                    <input id="address" type="text" class="form-control" name="address" value="" >
                                                    <label for="address" class="ml-8">{{ __('Address') }}</label>
        
                                            </div>

                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="far fa-comment-alt prefix"></i>
                                                    <textarea id="note" type="text" class="md-textarea form-control" rows="0" name="note" value="" maxlength="130" ></textarea>
                                                    <label for="note" class="ml-8">{{ __('Note') }}</label>
                                            </div>
                                    </div>

                                    <div class="modal-footer">
                                            <button type="button" class=" form-group btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class=" form-group btn btn-primary">Add Supplier</button>
                                        </div>

                                </form>

                            </div>
                        </div>
                    </div>        
                    
                    <div class="table-reponsive text-nowrap">

                            <table id="dtSupplier" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>  
                                            <th scope="col">Supplier Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($suppliers)>=1)
                                        @foreach ($suppliers as $supplier)
                                           
                                            <tr>
                                                <td id="dtShow"></td>    
                                                <!-- Supplier Name -->   
                                                @if (empty($supplier->supplier_name))
                                                    <td>No supplier Name</td>
                                                @else
                                                    <td>{{$supplier -> supplier_name}}</td>
                                                @endif 

                                                <!-- Supplier email -->  
                                                @if (empty($supplier -> email))
                                                    <td>No Email</td>
                                                @else
                                                    <td>{{$supplier -> email}}</td>
                                                @endif 

                                                <!-- Supplier number -->  
                                                @if (empty($supplier -> phone_number))
                                                    <td>No Phone Number</td>
                                                @else
                                                    <td>{{$supplier -> phone_number}}</td>
                                                @endif
                                                
                                                <td class="text-center">      
                                                    <button type="submit" style="margin: 0%" class="btn btn-blue btn-sm" data-toggle="modal" data-id="{{$supplier -> id}}" data-sname="{{$supplier -> supplier_name}}" data-semail="{{$supplier -> email}}" data-sphone="{{$supplier -> phone_number}}" data-saddress="{{$supplier -> address}}" data-snote="{{$supplier -> note}}" data-target="#modalSupplierEdit" style="font-size: 1rem; ">SHOW</button>
                                                </td>

                                                <td class="text-center">      
                                                    <button type="submit" style="margin: 0%" class="fa fa-trash btn btn-red btn-md" data-toggle="modal" data-id="{{$supplier -> id}}" data-target="#modalSupplierDel" style="font-size: 1rem; "></button>
                                                </td>

                                                <!--Edit Account-->
                                                <div class="modal fade" id="modalSupplierEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header yellow darken-2">
                                                                <h5 class="modal-title" id="exampleModalLabel">Supplier Info</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="{{ route('admin.supplier.update', $supplier -> id) }}">
                                                                @csrf
                                                                @method('PATCH')
                                                            <div class="modal-body mx-3">

                                                                <div class="form-group md-form ml-0 mr-0">
                                                                       

                                                                        <i class="fas fa-truck prefix "></i>
                                                                                <input id="supplier_name" type="text" class="form-control{{ $errors->has('supplier_name') ? ' is-invalid' : '' }}" name="sName"  value="{{$supplier->supplier_name}}" required >
                                                                                <label for="email" class="float ml-8">{{ __('Supplier Name') }}</label>
                                                
                                                        
                                                                                @if ($errors->has('supplier_name'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('supplier_name') }}</strong>
                                                                                    </span>
                                                                                @endif
                                        

                                                                       
                                                                </div>
                                                                <div class="form-group md-form ml-0 mr-0">
                                                                        

                                                                                <i class="fa fa-envelope prefix "></i>
                                                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="email" >
                                                                                <label for="email" class="float ml-8">{{ __('Email Address') }}</label>
                                                
                                                        
                                                                                @if ($errors->has('email'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                                    </span>
                                                                                @endif
                                                                                        
                                                                       
                                                                </div>
                                                                <div class="form-group md-form ml-0 mr-0">
                                                                        <i class="fas fa-phone prefix"></i>
                                                                        <input id="pNum" type="text" class="form-control" name="pNum" value="number">
                                                                        <label for="pNum" class="ml-8">{{ __('Phone Number') }}</label>
                                        

                                                                       
                                                                </div>
                                                                <div class="form-group md-form ml-0 mr-0">
                                                                        <i class="fas fa-map-marker-alt prefix"></i>
                                                                        <input id="address" type="text" class="form-control" name="address" value="address" >
                                                                        <label for="address" class="ml-8">{{ __('Address') }}</label>
                                        

                    
                                                                </div>
                                                                
                                                                <div class="form-group md-form ml-0 mr-0">
                                                                        <i class="far fa-comment-alt prefix"></i>
                                                                        
                                                                        <textarea id="note" type="text" class="md-textarea form-control" rows="0" name="note" value="note" ></textarea>
                                                                        <label for="note" class="ml-8">{{ __('Note') }}</label>

                                                                       
                                                                </div>
                                            
                                                                <input type="hidden" name="supplier_id" id="supplier_id" value="{{$supplier-> id}}">

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
                                                <div class="modal fade" id="modalSupplierDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: #b71c1c;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Supplier</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.supplier.destroy', $supplier -> id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                        <div class="modal-body">
                                                            <h5><p>Are you sure you want to delete this Supplier?</p></h5>
                                                            <input type="hidden" name="supplier_id" id="supplier_id" value="{{$supplier -> id}}">
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