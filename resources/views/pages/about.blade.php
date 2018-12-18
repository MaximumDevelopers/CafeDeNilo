@extends('layouts.app')
@section('content')
<div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

        <!--Header-->
        <div class="modal-header" >
            <img src="{{ asset('images/CafeDe\'Nilo.png') }}"
                class="rounded-circle img-responsive" alt="Avatar photo" >
                
        </div>
        <!--Body-->
        <div class="modal-body text-center mb-1">

            <h5 class="mt-1 mb-2">Maria Doe</h5>

            <div class="md-form ml-0 mr-0">
                <input type="password" type="text" id="form1" class="form-control ml-0" value="Dan">
                <label for="form1" class="ml-0">Enter password</label>
            </div>
            <div class="md-form ml-0 mr-0">
                    <input type="password" type="text" id="form1" class="form-control ml-0">
                    <label for="form1" class="ml-0">Enter password</label>
                </div>

            <div class="text-center mt-4">
                <button class="btn btn-cyan">Login
                    <i class="fa fa-sign-in ml-1"></i>
                </button>
            </div>
        </div>

    </div>
    <!--/.Content-->
</div>
@endsection
