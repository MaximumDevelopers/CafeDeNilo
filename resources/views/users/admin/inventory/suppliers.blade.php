@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Suppliers</h2>
                                
                                <button type="button" class="btn btn-primary btn-sm ml-auto btnLogin" 
                                data-toggle="modal" data-target="#modalAdd">Add Supplier
                                </button>
                        </div>
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header blue darken-2">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            <form method="POST" action="">
                                    @csrf
                                    @method('')
                                    <div class="modal-body mb-1">
                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-truck prefix"></i>
                                                    <input id="supName" type="text" class="form-control" name="supName" value="" required>
                                                    <label for="supName" class="ml-8">{{ __('Supplier Name') }}</label>
                    

                                                   
                                            </div>
                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-users prefix"></i>
                                                    <input id="Scontact" type="text" class="form-control" name="Scontact" value="" required>
                                                    <label for="Scontact" class="ml-8">{{ __('Contact') }}</label>
                    

                                                   
                                            </div>
                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-at prefix"></i>
                                                    <input id="Semail" type="email" class="form-control" name="Semail" value="" required>
                                                    <label for="Semail" class="ml-8">{{ __('Email') }}</label>
                    

                                                   
                                            </div>
                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-phone prefix"></i>
                                                    <input id="SpNum" type="text" class="form-control" name="SpNum" value="" required>
                                                    <label for="SpNum" class="ml-8">{{ __('Phone Number') }}</label>
                    

                                                   
                                            </div>
                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="fas fa-map-marker-alt prefix"></i>
                                                    <input id="Saddress" type="text" class="form-control" name="Saddress" value="" required>
                                                    <label for="Saddress" class="ml-8">{{ __('Address') }}</label>
                    

                                                   
                                            </div>
                                            <div class="form-group md-form ml-0 mr-0">
                                                    <i class="far fa-comment-alt prefix"></i>
                                                    <input id="Snote" type="text" class="form-control" name="Snote" value="" required>
                                                    <label for="Snote" class="ml-8">{{ __('Note') }}</label>
                    

                                                   
                                            </div>
                                    </div>

                                    <div class="modal-footer">
                                            <button type="button" class=" form-group btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class=" form-group btn btn-primary">Add Supplier</button>
                                        </div>

                                </form>

                            </div>
                        </div>
                    </div>        
                    
                    <div class="table-reponsive text-nowrap">

                            <table id="dtCategories" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                             
                                          <th scope="col">Supplier Name</th>
                                          <th scope="col">Contact</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Phone Number</th>
                                          <th scope="col">Address</th>
                                          <th scope="col">Note</th>
                                         
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                          
                                        </tr>
                                      </thead>
                                      <tbody>

                                           
                                                    <tr>
                                                            
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form  method="POST" action="">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="modal-body mx-3">

                                                                            <div class="form-group md-form ml-0 mr-0">
                                                                                    <i class="fas fa-truck prefix"></i>
                                                                                    <input id="sName" type="text" class="form-control" name="sName" value="" required>
                                                                                    <label for="sName" class="ml-8">{{ __('Supplier Name') }}</label>
                                                    
            
                                                                                   
                                                                            </div>
                                                                            <div class="form-group md-form ml-0 mr-0">
                                                                                    <i class="fas fa-users prefix"></i>
                                                                                    <input id="contact" type="text" class="form-control" name="contact" value="" required>
                                                                                    <label for="contact" class="ml-8">{{ __('Contact') }}</label>
                                                    
            
                                                                                   
                                                                            </div>
                                                                            <div class="form-group md-form ml-0 mr-0">
                                                                                    <i class="fas fa-at prefix"></i>
                                                                                    <input id="sEmail" type="email" class="form-control" name="sEmail" value="" required>
                                                                                    <label for="sEmail" class="ml-8">{{ __('Email') }}</label>
                                                    
            
                                                                                   
                                                                            </div>
                                                                            <div class="form-group md-form ml-0 mr-0">
                                                                                    <i class="fas fa-phone prefix"></i>
                                                                                    <input id="pNum" type="text" class="form-control" name="pNum" value="" required>
                                                                                    <label for="pNum" class="ml-8">{{ __('Phone Number') }}</label>
                                                    
            
                                                                                   
                                                                            </div>
                                                                            <div class="form-group md-form ml-0 mr-0">
                                                                                    <i class="fas fa-map-marker-alt prefix"></i>
                                                                                    <input id="address" type="text" class="form-control" name="address" value="" required>
                                                                                    <label for="address" class="ml-8">{{ __('Address') }}</label>
                                                    
            
                                                                                   
                                                                            </div>
                                                                            <div class="form-group md-form ml-0 mr-0">
                                                                                    <i class="far fa-comment-alt prefix"></i>
                                                                                    <input id="note" type="text" class="form-control" name="note" value="" required>
                                                                                    <label for="note" class="ml-8">{{ __('Note') }}</label>
                                                    
            
                                                                                   
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
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Supplier</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5><p>Are you sure you want to delete this supplier?</p></h5>
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