@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Products</h2>
                                <form action="{{ route('admin.products.create') }}" class="ml-auto">
                                    <button type="submit"  class="btn btn-primary btn-sm btnLogin">Add Products
                                    </button>
                                </form>    
                        </div>

                    <div class="table-reponsive text-nowrap">

                            <table id="dtproducts" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Product Name</th>
                                            
                                        
                                            <th scope="col">Price</th>
                                    
                                        </tr>
                                        <tbody>
                                    </thead>
                                        
                                              @foreach ($Product as $item)
                                                  
                                             
                                                <tr>
                                                        <td id="dtShow"></td>
                                                        <td>{{$item -> product_name}}</td>
                                                    
                                                        <td>&#8369;{{$item -> price}}</td>
                                                                    
                                                        
                                                         
                                                        
                                                        
                                                </tr>
                                                @endforeach
                                                             
                                                
                                                
                                        </tbody>    
                                </table>
                            </div>
                     
                </div>
                
                </div> 
        
                </div>
            </div> 
@endsection