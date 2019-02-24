@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

        <div class="col-lg-7">
                <div class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row">
                                    <h2 id="ct1" class="card-title">Product Categories</h2>
                                    
                            </div>

                            <!-- Choose file -->
                            <form class="text-center border border-light p-5">
                                    <div class="form-group">
                                            <label for="exampleInputFile" class="bmd-label-floating">Input a file: </label>
                                            <input type="file" class="form-control-file" id="exampleInputFile">
                                            
                                          </div>
                            </form>
                            <!-- Choose file-->
    
                
                    </div>
                </div>
        </div>
    </div>        

<br>
<br>

    <div id="cf1" class="container-fluid">

            <div class="col-lg-10">
                    <div class="card shadow-md mb-6">
                        <div class="card-body">
                                <div class="row">
                                                <div class="table-responsive">
                                                 <table class="table table-bordered" id="crud_table">
                                                 <tr>
                                                 <th width="30%">Item Name</th>
                                                 <th width="10%">Item Code</th>
                                                 <th width="45%">Description</th>
                                                 <th width="10%">Price</th>
                                                 <th width="5%"></th>
                                                 </tr>
                                                 <tr>
                                                 <td contenteditable="true" class="item_name"></td>
                                                 <td contenteditable="true" class="item_code"></td>
                                                 <td contenteditable="true" class="item_desc"></td>
                                                 <td contenteditable="true" class="item_price"></td>
                                                 <td></td>
                                                 </tr>
                                                 </table>
                                                 <div class="right">
                                                 <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                                                 </div>
                                                 <div class="center">
                                                 <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                                                 </div>
                                                 <br />
                                                 <div id="inserted_item_data"></div>
                                                 </div>
                                        
                                </div>
                        </div>
                    </div>
            </div>
        </div>        

@endsection