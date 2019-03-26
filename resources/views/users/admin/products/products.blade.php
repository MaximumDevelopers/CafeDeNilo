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
                                            <th scope="col">Category</th>
                                            <th scope="col">Price</th>

                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                    
                                        </tr>
                                        <tbody>
                                    </thead>
                                        
                                              @foreach ($Product as $item)
                                             
                                                <tr>
                                                        <td id="dtShow"></td>
                                                        <td>{{$item -> product_name}}</td>

                                                        <td>{{$item -> pname}}</td>
                                                        <td>&#8369;{{$item -> price}}</td>
                                                                    
                                                        <td>
                                                            <div class="text-center">
                                                                <a  href="{{ route('admin.products.edit', $item -> id) }}" style="margin: 0%" class="btn btn-blue btn-sm"  data-id=""  style="font-size: 1rem;">SHOW</a>
                                                            </div>
                                                        </td>

                                                        <td class="text-center">     
                                                            <button type="submit" style="margin: 0%" class="fa fa-trash btn btn-red btn-md" data-toggle="modal" data-id="{{$item -> id}}"  data-target="#modalProdDel" style="font-size: 1rem; "></button>
                                                        </td>            
             
                                                </tr>

                                                <!--Delete Account-->
                                               <div class="modal fade" id="modalProdDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                               aria-hidden="true">
                                               <div class="modal-dialog" role="document">
                                                   <div class="modal-content">
                                                       <div class="modal-header" style="background-color: #b71c1c;">
                                                           <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                           </button>
                                                       </div>
                                                       <form action="{{ route('admin.products.destroy', $item -> id) }}" method="post">
                                                               @csrf
                                                               @method('DELETE')
                                                       <div class="modal-body">
                                                           <h5><p>Are you sure you want to delete this item?</p></h5>
                                                           <input type="hidden" name="Prod_id" id="Prod_id" value="">
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                           <button type="submit" class="btn btn-primary">Delete</button>
                                                           
                                                       </div>
                                                   </form>
                                                   </div>
                                               </div>
                                           </div>
                                           <!--Delete Account-->  

                                                @endforeach
                                                             
                                               
                                                
                                        </tbody>    
                                </table>
                            </div>
                     
                </div>
                
                </div> 
        
                </div>
            </div> 
@endsection