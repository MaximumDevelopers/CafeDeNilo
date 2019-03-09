@extends('layouts.admin.app')
@section('content')

<div class="container-fluid">
   <div class="col-lg-11">
      <div class="card shadow-md mb-6">
           <div class="card-body">
                   
               <form method="POST" action="{{ route('admin.stockadjustment.store') }}">
                @csrf
                
                <div class="form-group md-form ml-0 mr-0">
                        <select name="reason" id="reason" class="browser-default custom-select">
                                
                                
                                <option value="Loss">Loss</option>
                                <option value="Damage">Damage</option>
                        </select>                                       
                </div>
                
                <div class="form-group md-form ml-0 mr-0">
                        
                        
                        <div class="md-form">
                                        <textarea id="note textarea-char-counter" name="note" class="form-control md-textarea" length="120" rows="1s" required></textarea>
                                        <label for="textarea-char-counter">Note</label>
                         </div>                     
                </div>

                <div class="modal-header yellow darken-2">
                                <h5 class="modal-title" id="itemModalLabel">Item</h5>
                                
                            </div>
                            
                                
                            
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
                                                        <label for="item_quantity_before" class="ml-8">{{ __('Item stock before') }}</label>
                                
                                                        @if ($errors->has('item_quantity_before'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('item_quantity_before') }}</strong>
                                                                </span>
                                                        @endif
                                                </div>
                                        

                                        <div class="form-group md-form ml-0 mr-0">
                                                        <i class="fas fa-sort-amount-up prefix"></i>
                                                        <input id="item_quantity_after" max="9999" min="0" type="number" class="form-control{{ $errors->has('item_quantity_after') ? ' is-invalid' : '' }} filterNum" name="item_quantity_after"  required >
                                                        <label for="item_quantity_after" class="ml-8">{{ __('Item stock after') }}</label>
                                
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
                                <a href="/admin/item_list" class="btn btn-secondary" data-dismiss="modal">Close</a> 
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        
                
               </form>
         </div>
       </div>
    </div>
</div>
<br>

     
    
@endsection