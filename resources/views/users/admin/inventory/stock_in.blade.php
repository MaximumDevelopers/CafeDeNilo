@extends('layouts.admin.app')
@section('content')

<div class="container-fluid">
   <div class="col-lg-11">
      <div class="card shadow-md mb-6">
           <div class="card-body">
                <h1 class="card-title">Stock In</h1>
               <form method="POST" action="{{ route('admin.stockin.store') }}">
                @csrf
                
              
                
              

               
                            
                                
                            
                            <div class="modal-body mx-3">
                                @foreach ($ItemList as $items)

                                <div class="form-group md-form ml-0 mr-0">
                                                        <i class="fas fa-sort-amount-up prefix"></i>
                                                        <input readonly id="item_name" type="text" class="form-control{{ $errors->has('item_name') ? ' is-invalid' : '' }} filterNum" name="item_name" value="{{$items -> item_name}}"  >
                                                        <label for="item_name" class="ml-8">{{ __('Item Name') }}</label>
                                
                                                        @if ($errors->has('item_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('item_name') }}</strong>
                                                                </span>
                                                        @endif
                                                </div>        

                                        <div class="form-group md-form ml-0 mr-0">
                                                        <i class="fas fa-sort-amount-up prefix"></i>
                                                        <input readonly id="item_quantity_before" max="9999" min="0" type="number" class="form-control{{ $errors->has('item_quantity_before') ? ' is-invalid' : '' }} filterNum" name="item_quantity_before" value="{{$items -> quantity}}" >
                                                        <label for="item_quantity_before" class="ml-8">{{ __('Item Stock') }}</label>
                                
                                                        @if ($errors->has('item_quantity_before'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('item_quantity_before') }}</strong>
                                                                </span>
                                                        @endif
                                                </div>
                                        

                                        <div class="form-group md-form ml-0 mr-0">
                                                        <i class="fas fa-sort-amount-up prefix"></i>
                                                        <input id="item_quantity_after" max="9999" min="0" type="number" class="form-control{{ $errors->has('item_quantity_after') ? ' is-invalid' : '' }} filterNum" name="item_quantity_after" value="" required >
                                                        <label for="item_quantity_after" class="ml-8">{{ __('Stock In') }}</label>
                                
                                                        @if ($errors->has('item_quantity_after'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('item_quantity_after') }}</strong>
                                                                </span>
                                                        @endif
                                                </div>
                                  
                                        <input type="hidden" name="item_id" id="item_id" value="{{$items -> id}}">
                                        @endforeach
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        
                
               </form>
         </div>
       </div>
    </div>
</div>
<br>

     
    
@endsection