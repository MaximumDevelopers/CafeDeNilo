@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Product Categories</h2>
                                
                                <button type="button" class="btn btn-primary btn-sm smml-auto btnLogin" 
                                data-toggle="modal" data-target="#modalAdd">Add Category
                                </button>
                        </div>

                        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header blue darken-2">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            <form method="POST" action="{{ route('admin.productcategories.store')}}">
                                    @csrf
                                    <div class="modal-body mb-1">
                                    <div class="form-group md-form ml-0 mr-0">
                                            <i class="far fa-list-alt prefix"></i>
                                            <input id="category_name" name="category_name" type="text" class="form-control" name="category" required>
                                            <label for="category" class="ml-8">{{ __('Enter new category here..') }}</label>
                                    </div>
                                    </div>

                                    <div class="modal-footer">
                                            <button type="button" class=" form-group btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class=" form-group btn btn-primary">Add category</button>
                                        </div>

                                </form>

                            </div>
                        </div>
                    </div>        
                    
                    <div class="table-reponsive text-nowrap">

                            <table id="dtCategories" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                                    
                                            <th scope="col">Product Category Name</th>
                                            <th scope="col"></th>
                                                <th scope="col"></th>
                                    
                                        </tr>
                                        <tbody>
                                    </thead>
                                        @if (count($ProductCategories)>=1)
                                                @foreach ($ProductCategories as $category)
                                                
                                                <tr>
                                                        <td>{{$category -> product_category_name}}</td>
                                                                    
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="margin: 0%" class="far fa-edit btn btn-yellow btn-md" data-toggle="modal" data-category="{{$category -> product_category_name}}" data-id="{{$category -> id}}" data-target="#modalCategoryEdit" style="font-size: 1rem;"></button>
                                                            </div>
                                                        </td>

                                                        <td class="text-center">      
                                                            <button type="submit" style="margin: 0%" class="fa fa-trash btn btn-red btn-md" data-toggle="modal" data-id="{{$category -> id}}" data-target="#modalCategoryDel" style="font-size: 1rem; "></button>
                                                        </td>
                                                         
                                                        <!--Edit Account-->
                                                        <div class="modal fade" id="modalCategoryEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header yellow darken-2">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST" action="{{ route('admin.productcategories.update', $category -> id) }}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="modal-body mx-3">

                                                                        <div class="form-group md-form ml-0 mr-0">
                                                                                <i class="far fa-list-alt prefix grey-text"></i>
                                                                                <input id="cat_edit" type="text" class="form-control" name="category_name" value="{{$category -> product_category_name}}" required>
                                                                                <label for="cat_edit" class="ml-8">{{ __('Product Category Name') }}</label>
                                                                                <input type="hidden" name="cat_id" id="cat_id" value="{{$category -> id}}"> 
                                                                        </div>
                                                                          
                                                                        </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Edit Account-->
                                                        
                                                        <!--Delete Account-->
                                                            <div class="modal fade" id="modalCategoryDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #b71c1c;">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{ route('admin.productcategories.destroy', $category -> id) }}" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                    <div class="modal-body">
                                                                        <h5><p>Are you sure you want to delete this category?</p></h5>
                                                                        <input type="hidden" name="cat_id" id="cat_id" value="{{$category -> id}}">
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