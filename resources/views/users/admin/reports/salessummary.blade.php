@extends('layouts.admin.app')
@section('content')


<!--Frappenilo Cups -->

<div id="cf" class="container-fluid">

        <div class="col-lg-11">
                <div id="c2" class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row">
                                    <h2 id="ct1" class="card-title">Sales Summary</h2>
                                    
                            </div>
                            
                            <a id="btnsales" type="button" href="/admin/salesummary" class="btn btn-primary btn-sm ml-auto btnLogin">Per Transaction
                            </a>
                        
                        <a id="btnsales" type="button" href="/admin/salesummaryd" class="btn btn-primary btn-sm ml-auto btnLogin">Today
                        </a>
                            
                            <a id="btnsales" type="button"  href="/admin/salesummarym" class="btn btn-primary btn-sm ml-auto btnLogin">Month
                            </a>

                            <a id="btnsales" type="button"  href="/admin/salesummaryy" class="btn btn-primary btn-sm ml-auto btnLogin">Year
                            </a>

                                        <br>
                                        <br>
   
                        
                        <div class="table-reponsive text-nowrap">
    
                                <table id="dtSaleSummary" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 
                                              
                                              <th scope="col">Date</th>
                                              <th scope="col">Price</th>
                                             
                                              <th scope="col"></th>
                                              
                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($transactions as $transaction)
                                                <tr>
                                                                  
                                                            
                                                            <td>{{$transaction -> date}}</td>
                                                            <td>&#8369;{{$transaction -> total_price}}</td>
                                                           

                                                          
                                                            <td class="text-center">
                                                                <button type="button" style="margin: 0%" class="btn btn-blue btn-md" data-id="{{$transaction -> id}}" data-toggle="modal"  data-target="#modalInfo" style="font-size: 1rem; ">Show</button>

                                                            <!--Sales Details -->
                                                                <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="background-color: dark-blue;">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Sales Details</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <form id="edit-form" method="POST" action=" {{route('admin.salesummary.update',$transaction->id)}} ">
                                                                                @csrf
                                                                                @method('PATCH')
                                                                            <div class="modal-body">
                                                                                
                                                                                <table id="dtSaleSummary1" class="table table-bordered table-sm" cellspacing="0" width="100%">
                                                                                    <thead>
                                                                                        <tr>
                                                                                                                                                                                   
                                                                                          <th scope="col">Ordered Date</th>
                                                                                          <th scope="col">Price</th>

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="shProducts">
                                                                                        <tr>
                                                                                                <td id="tdDate"></td>
                                                                                                <td id="tdPrice"></td>
                                                                                        </tr>
                                                                                      </tbody>
                                                                                </table>
                                                                
                                                                            </div>
                                                                        
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Sales Details-->
                                                        </td>
                                                    </tr>
                                                    @endforeach
                        
                                            </tbody>
                                        
                                      </table>
            
            
                               </div>
                         
                    </div>
        
        
                       
                        </div>
                  
                       
            
                    </div>
            
        </div>

        <!-- Frappenilo Cups -->



@endsection