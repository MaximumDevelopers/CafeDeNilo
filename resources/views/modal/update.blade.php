@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Account</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('accounts.update',$accounts->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>First Name :</strong>
          <input type="text" name="first_name" class="form-control" value="{{$accounts->first_name}}">
        </div>
        <div class="col-md-12">
          <strong>Last Name :</strong>
          <input type="text" name="last_name" class="form-control" value="{{$accounts->last_name}}">
        </div>
        <div class="col-md-12">
          <strong>Email :</strong>
          <input type="email" name="email" class="form-control" value="{{$accounts->email}}">
        </div>
        <div class="col-md-12">
          <strong>Password :</strong>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="col-md-12">
          <strong>Confirm Password :</strong>
          <input type="password" name="confirm_password" class="form-control" >
        </div>
        

        <div class="col-md-12">
          <a href="javascript:history.back()" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection
