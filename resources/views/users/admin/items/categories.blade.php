@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Categories</h2>
                                
                                <button type="button" class="btn btn-primary btn-sm ml-auto btnLogin" 
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
                                
                            <form method="POST" action="">
                                    @csrf
                                    @method('')
                                    <div class="modal-body mb-1">
                                    <div class="form-group md-form ml-0 mr-0">
                                            <i class="far fa-list-alt prefix"></i>
                                            <input id="category" type="text" class="form-control" name="category" required>
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
                                             
                                          <th scope="col">Categories</th>
                                         
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                          
                                        </tr>
                                      </thead>
                                      <tbody>

                                           
                                                    <tr>
                                                            
                                                            
                                                            <td></td>
                                                            
                                                            <td>
                                                            <div class="text-center">
                                                                <button type="button" class="far fa-edit btn btn-yellow  btn-sm"   data-toggle="modal" data-target="#modalEdit" style="font-size: 1rem;"></button>
                                                            </div>
                                                            <!--Edit Account-->
                                                            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                            aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                         <div class="modal-header yellow darken-2">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form  method="POST" action="">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="modal-body mx-3">

                                                                            <div class="form-group md-form ml-0 mr-0">
                                                                                    <i class="far fa-list-alt prefix grey-text"></i>
                                                                                    <input id="cat_edit" type="text" class="form-control" name="cat_edit" value="" required>
                                                                                    <label for="cat_edit" class="ml-8">{{ __('Category Name') }}</label>
                                                    
            
                                                                                   
                                                                                
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
                                                            </td>
                                                            
                                                            <!--Delete Account-->
                                                            <td class="text-center">
                                                                    
                                                                            
                                                                            <button type="submit" class="fa fa-trash btn btn-red btn-sm" data-toggle="modal" data-target="#modalLRFormDemo2" style="font-size: 1rem; "></button>
                                                                    
                                                                
                                                                
                                                                <div class="modal fade" id="modalLRFormDemo2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="background-color: #b71c1c;">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5><p>Are you sure you want to delete this category?</p></h5>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <form  method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Delete Account-->
                                                            </td>
                                                    </tr>
   
                                        </tbody>
                                    
                                  </table>
        
        
                           </div>
                     
                </div>
    
    
                   
                    </div>
              
                   
        
                </div>
        
    </div>

@endsection