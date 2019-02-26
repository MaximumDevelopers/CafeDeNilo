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
                            
                          <!--  <a id="btnsales"  href="/admin/salesummary" class="btn btn-primary btn-sm ml-auto btnLogin">Per Transaction
                            </a> -->
                        
                      <!--  <a id="btnsales"  href="/admin/salesummaryd" class="btn btn-primary btn-sm ml-auto btnLogin">Today
                        </a> -->
                            
                         <!--   <a id="btnsales"  href="/admin/salesummarym" class="btn btn-primary btn-sm ml-auto btnLogin">Month
                            </a> -->

                          <!--  <a id="btnsales"  href="/admin/salesummaryy" class="btn btn-primary btn-sm ml-auto btnLogin">Year
                            </a> -->

                                        <br>
                                        <br>
   
                        
                        <div class="table-reponsive text-nowrap">
    
                                <table id="dtSaleSummary" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 
                                              
                                              <th scope="col">Date</th>
                                              <th scope="col">Gross Sales</th>
                                              <th scope="col">Discount</th>
                                              <th scope="col">Net Sales</th>
                                              <th scope="col">Gross Profit</th>

                                             
                                              
                                              
                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($ordered_products as $transaction)
                                                <tr>
                                                                  
                                                                
                                                            <td data-sort>{{$transaction -> date}}</td>
                                                            <td>&#8369;{{$transaction -> total_price}}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                           

                                                          

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