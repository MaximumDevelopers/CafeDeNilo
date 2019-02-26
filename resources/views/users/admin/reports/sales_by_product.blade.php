@extends('layouts.admin.app')
@section('content')


<!--Frappenilo Cups -->

<div id="cf" class="container-fluid">
   <div class="row">
   <div class="col-lg-11">
       
                <div id="c2" class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row">
                                    <h2 id="ct1" class="card-title">Sales by Product</h2>

                                
                                    
                            </div>
                        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header blue darken-2">
                                        
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                 
                                    
                                <form method="POST" action="">
                                        @csrf
                                        @method('')
                                        <div class="modal-body mb-1">
                                        <div class="form-group md-form ml-0 mr-0">
                                                <i class="fa fa-user prefix grey-text"></i>
                                                <input id="first_name" type="text" class="form-control" name="first_name" value="" required autofocus>
                                                <label for="first_name" class="ml-8">{{ __('First Name') }}</label>
                                           
                
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            
                                        </div>
                
                                        <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fa fa-user prefix grey-text"></i>
                                                    <input id="last_name" type="text" class="form-control" name="last_name" value="" required>
                                                    <label for="last_name" class="ml-8">{{ __('Last Name') }}</label>
                                                    @if ($errors->has('last_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                                    @endif
                                                
                                            </div>
                
                                        <div class="form-group md-form ml-0 mr-0">
                                                <i class="fa fa-envelope prefix grey-text"></i>
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                            <label for="email" class="ml-8">{{ __('E-Mail Address') }}</label>
                
                        
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                           
                                        </div>
                
                                        <div class="form-group md-form ml-0 mr-0">
                                            
                                            <select name="role" id="role" class="form-control" >
                                                <option value="admin">Admin</option>
                                                <option value="barista">Barista</option>
                                                <option value="captain crew">Captain Crew</option>
                                                <option value="owner">Owner</option>
                                            </select>
                                           
                                        </div>
    
                                        <div class="form-group md-form ml-0 mr-0">
                                            
                
                                                <i class="fa fa-lock prefix grey-text"></i>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                <label for="password" class="ml-8">{{ __('Password') }}</label>
                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                           
                                        </div>
                
                                        <div class="form-group md-form ml-0 mr-0">
    
                                                <i class="fa fa-lock prefix grey-text"></i>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                <label for="password-confirm" class="ml-8">{{ __('Confirm Password') }}</label>
                                        </div>
            
                                        </div>
    
                                        <div class="modal-footer">
                                                <button type="button" class=" form-group btn btn-secondary" data-dismiss="modal">Close</button>
                                                
                                            </div>
    
                                    </form>
    
                                </div>
                            </div>
                            
                          
                        </div>       
                        
                       
                    
              
    
                        <div class="table-reponsive text-nowrap">
    
                                <table id="dtProductSales" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 
                                              
                                              <th scope="col">Date</th>
                                              <th scope="col">Sales</th>
                                             
                                              <th scope="col"></th>
                                              
                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($ordered_products as $transaction)
                                                <tr>
                                                                  
                                                            
                                                            <td data-sort>{{$transaction -> date}}</td>
                                                            <td>&#8369;{{$transaction -> total_price}}</td>
                                                           

                                                          
                                                            <td class="text-center">          
                                                                <a style="margin: 0%" href="{{route('admin.salesbyproduct.show',$transaction -> id)}}" class="btn btn-blue btn-md"   style="font-size: 1rem; ">Show</a>

                                                           
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

  

</div>

        
         


      


@endsection