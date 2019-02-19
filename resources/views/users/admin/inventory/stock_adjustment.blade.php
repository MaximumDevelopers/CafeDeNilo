@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

    <div class="col-lg-11">
            <div id="c2" class="card shadow-md mb-6">
                <div class="card-body">
                        <div class="row">
                                <h2 id="ct1" class="card-title">Stock Adjustment History</h2>
                                     
                        </div>
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header blue darken-2">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>        
                    
                    <div class="table-reponsive text-nowrap">

                            <table id="dtStockAdjustment" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                             
                                          <th scope="col">Item Name</th>
                                          <th scope="col">Reason</th>
                                          <th scope="col">Note</th>
                                          <th scope="col">Stock before</th>
                                          <th scope="col">Stock after</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($StockAdjustment as $adjustments)
                                            
                                                <tr>
                                                            
                                                        <td>{{$adjustments -> item_name}}</td>
                                                        <td>{{$adjustments -> reason}}</td>
                                                        <td>{{$adjustments -> note}}</td>
                                                        <td>{{$adjustments -> stock_before}}</td>
                                                        <td>{{$adjustments -> stock_after}}</td>
                                                                                                             
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