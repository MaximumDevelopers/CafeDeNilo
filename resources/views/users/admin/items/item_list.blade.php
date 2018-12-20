@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Items</h2>
                                
                                <button type="button" class="btn btn-primary btn-sm ml-auto btnLogin" 
                                data-toggle="modal" data-target="#modalAdd">Add Items
                                </button>
                        </div>

                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header blue darken-2">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Items</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            <form method="POST" action="">
                                    @csrf
                                    <div class="modal-body mb-1">
                                    <div class="form-group md-form ml-0 mr-0">
                                            <i class="far fa-list-alt prefix"></i>
                                            <input id="item_name" name="item_name" type="text" class="form-control" name="item" required>
                                            <label for="item" class="ml-8">{{ __('Item Name') }}</label>
      
                                    </div>
                                    <div class="form-group md-form ml-0 mr-0">
                                        
                                        <select name="role" id="role" class="form-control">
                                            <option disabled selected>Select Category here..</option>
                                            <option value="admin">Admin</option>
                                            <option value="barista">Barista</option>
                                            <option value="captain crew">Captain Crew</option>
                                            <option value="owner">Owner</option>
                                        </select>
                                       
                                    </div>


                                    <div class="form-group md-form ml-0 mr-0">
                                        <i class="far fa-list-alt prefix"></i>
                                        <input id="category_name" name="category_name" type="text" class="form-control" name="category" required>
                                        <label for="category" class="ml-8">{{ __('Enter new category here..') }}</label>
  
                                </div>
                                    </div>

                                    <div class="modal-footer">
                                            <button type="button" class=" form-group btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class=" form-group btn btn-primary">Add item</button>
                                        </div>

                                </form>

                            </div>
                        </div>
                    </div>        
                    
                    <div class="table-reponsive text-nowrap">

                            <table id="dtItem" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Cost</th>
                                            

                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                    
                                        </tr>
                                        <tbody>
                                    </thead>
                                       
                                                
                                                <tr>
                                                       
                                                      
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        
                                                                    
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="margin: 0%" class="far fa-edit btn btn-yellow btn-md" data-toggle="modal" data-target="#modalCategoryEdit" style="font-size: 1rem;"></button>
                                                            </div>
                                                        </td>

                                                        <td class="text-center">      
                                                            <button type="submit" style="margin: 0%" class="fa fa-trash btn btn-red btn-md" data-toggle="modal"  data-target="#modalCategoryDel" style="font-size: 1rem; "></button>
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
                                                                    <form method="POST" action="">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="modal-body mx-3">

                                                                        <div class="form-group md-form ml-0 mr-0">
                                                                                <i class="far fa-list-alt prefix grey-text"></i>
                                                                                <input id="cat_edit" type="text" class="form-control" name="category_name" value="" required>
                                                                                <label for="cat_edit" class="ml-8">{{ __('Category Name') }}</label>
                                                                                <input type="hidden" name="cat_id" id="cat_id" value=""> 
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
                                                                    <form action="" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                    <div class="modal-body">
                                                                        <h5><p>Are you sure you want to delete this category?</p></h5>
                                                                        <input type="hidden" name="cat_id" id="cat_id" value="">
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
                                               
                                        </tbody>    
                            </table>
        
        
                            </div>
                     
                </div>
                
                </div> 
        
                </div>
            </div> 
@endsection