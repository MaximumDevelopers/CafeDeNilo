@extends('layouts.app')
@section('content')

@if (count($accounts)>1)
    @foreach ($accounts as $account)

        <div class="well">
            <h3>{{$account -> id}}</h3>
        </div>
    
    @endforeach
@else
    <p>No post</p>
    
@endif

@endsection
