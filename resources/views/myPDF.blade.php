@extends('layouts.app')
@section('content')
<center>
	<br><br>
	<a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a></center>
	
	<center>
	<h1>Course List </h1>
	<table class="table" >
	<tr><th>Id</th><th>Name</th><th>Email</th><th>Course</th></tr>
	 
</center>
@endsection