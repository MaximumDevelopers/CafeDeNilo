@extends('layouts.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Manage User Account</h2>
                                
                                <button type="button" class="btn btn-primary btn-sm ml-auto btnLogin" 
                                data-toggle="modal" data-target="#modalLRFormDemo">Add Account
                                </button>
                        </div>
                    <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header blue darken-2">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                              <!--  <form method="POST" action="{{ route('register') }}">
                                        @csrf

                               
                                <div class="modal-body mb-1">
                                       
                                        <div class="md-form ml-0 mr-0">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <input id="first_name" type="text" class=" form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" required autofocus>
                                            <label for="first_name" class="ml-8">Enter Firstname</label>

                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="md-form ml-0 mr-0">
                                            
                                                <i class="fa fa-user prefix grey-text"></i>
                                            <input id="last_name" type="text" class=" form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" required >
                                            <label for="last_name" class="ml-8">Enter Lastname</label>

                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="md-form ml-0 mr-0">
                                            <i class="fa fa-envelope prefix grey-text"></i>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required >
                                            <label for="email" class="ml-8">Enter Email</label>
                                           

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                       

                                        <div class="md-form ml-0 mr-0">
                                            <i class="fa fa-lock prefix grey-text"></i>
                                            <input id="password" type="password" class=" form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >
                                            <label for="password" class="ml-8">Enter Password</label>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="md-form ml-0">
                                            <i class="fa fa-lock prefix grey-text"></i>   
                                            <input id="password-confirm" type="password" class=" form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password-confirm" required >
                                            <label for="password-confirm" class="ml-8">Confirm Password</label>

                                            @if ($errors->has('password-confirm'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password-confirm') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class=" form-group btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class=" form-group btn btn-primary">Add account</button>
                                </div>
                            </form> !-->


                            <form method="POST" action="{{ route('register') }}">
                                    @csrf
            
                                    <div class="modal-body mb-1">
                                    <div class="form-group md-form ml-0 mr-0">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                            <label for="first_name" class="ml-8">{{ __('First Name') }}</label>
                                       
            
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        
                                    </div>
            
                                    <div class="form-group md-form ml-0 mr-0">
                                                <i class="fa fa-user prefix grey-text"></i>
                                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
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
                                            <button type="submit" class=" form-group btn btn-primary">Add account</button>
                                        </div>

                                </form>




                            </div>
                        </div>
                    </div>        
                    
                    <div class="table-reponsive text-nowrap">

                            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                             
                                          <th scope="col">Firstname</th>
                                          <th scope="col">Lastname</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Type</th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                          
                                        </tr>
                                      </thead>
                                      <tbody>

                                            @if (count($accounts)>=1)
                                                @foreach ($accounts as $account)
                                                    <tr>
                                               
                                                            <td>{{$account -> first_name}}</td>
                                                            <td>{{$account -> last_name}}</td>
                                                            <td>{{$account -> email}}</td>
                                                            <td>Admin</td>
                                                            <td class="text-center">
                                                                <button type="button" class="fa fa-user-edit btn btn-yellow  btn-sm"  data-toggle="modal" data-target="#modalLRFormDemo1" style="font-size: 1rem;"></button>
                                                                  <!--Edit Account-->
                            <div class="modal fade" id="modalLRFormDemo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header yellow darken-2">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            
                                                   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Edit Account-->


                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="fa fa-trash btn btn-red btn-sm" data-toggle="modal" data-target="#modalLRFormDemo2" style="font-size: 1rem; "></button>
                                                                <!--Delete Account-->
                            <div class="modal fade" id="modalLRFormDemo2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #b71c1c;">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            
                                                   <h4><p>Are you sure you want to delete this account?</p></h4>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Delete Account-->
                                                            </td>
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