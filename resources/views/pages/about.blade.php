
    
        <div class="modal-header blue darken-2">
            <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

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

