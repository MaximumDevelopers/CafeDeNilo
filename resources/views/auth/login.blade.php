@extends('layouts.app')

@section('content')



<!-- <div class="container-fluid">
    <div class="row justify-content">
        <div id="logoY" class="col-md-5 ml-5">
            <a class="logo-wrapper">
                    <img src={{ asset('images/CafeDe\'Nilo.png') }} class="img-fluid" height="500" width="520">
            </a>
        </div>
            <div id="cardX" class="col-md-4 ml-auto">
                    
              <div class="card">
              <div class="card-header" style="background-color: #b20a2c;"><h5 style=" color:#fffbd5; font-weight:500;">{{__('LOGIN')}}</h5></div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group md-form ml-0 mr-0 row ">
                            
                                <input id="email" type="email" id="form1" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="form1" class="ml-0">E-Mail Address</label>
                                @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            
                        </div>
                        

                        <div class="form-group md-form ml-0 mr-0 row">
      
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <label for="password" class="ml-0">{{ __('Password') }}</label>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                
                                </div>  
                                <a class="btn btn-link mb-0 mt-0 ml-auto" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>  
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                
                                    <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


 
 <div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
     <!--Content-->
     <div class="modal-content">

         <!--Header-->
         <div class="modal-header">
             <img src="{{ asset('images/CafeDe\'Nilo.png') }}"
                 class="rounded-circle img-fluid" alt="">   
         </div>
         <!--Body-->
         <div id="mBody" class="modal-body text-center mb-1">

             <h5 class="mt-1 mb-2">Login</h5>
             <br>
             

             <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group md-form ml-0 mr-0">
                        
                            <input id="email" type="email" id="form1" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="form1" class="ml-0">Email Address</label>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        
                    </div>
                    

                    <div class="form-group md-form ml-0 mr-0">
  
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <label for="password" class="ml-0">{{ __('Password') }}</label>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                       
                    </div>

                    <div class="form-group row">
                            <div class="col-md-4 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                
                                </div>  
                                <a class="btn btn-link mb-0 mt-0 ml-auto" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>  
                        </div>

                        <div class="form-group text-center">
                            <div class="col-md-4 offset-md-4">
                                
                                    <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                               
                            </div>
                        </div>

             </form>
             
         </div>

     </div>
     <!--/.Content-->
 </div>
</div>
<!--Modal Form Login with Avatar Demo-->


@endsection
