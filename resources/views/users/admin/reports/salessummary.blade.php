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