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
                            
                            <a id="btnsales"  href="/admin/salesummary" class="btn btn-primary btn-sm ml-auto btnLogin">Per Transaction
                            </a>
                        
                        <a id="btnsales"  href="/admin/salesummaryd" class="btn btn-primary btn-sm ml-auto btnLogin">Daily
                        </a>
                            
                        
                            <a id="btnsales"  href="/admin/salesummarym" class="btn btn-primary btn-sm ml-auto btnLogin">Monthly
                            </a>

                            <a id="btnsales"  href="/admin/salesummaryy" class="btn btn-primary btn-sm ml-auto btnLogin">Yearly
                            </a>

                            <br>
                            <br>
                           
   
                        
                   <div class="table-reponsive text-nowrap">
    
                                <table id="dtSaleSummary" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 
                                              
                                              <th scope="col">Date</th>
                                              <th scope="col">Gross Sales</th>
                                              <th scope="col">Net Sales</th>
                                              <th scope="col">Cash</th>
                                              <th scope="col">Discount</th>
                                              <th scope="col">Vat</th>
                                              <th></th>

                                             
                                              
                                              
                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($ordered_products2 as $transaction)
                                                <tr>
                                                                  
                                                                
                                                            <td data-sort>{{$transaction -> date}}</td>
                                                            <td>&#8369;{{$transaction -> total_price}}</td>
                                                            <td>&#8369;{{$transaction -> net_sales}}</td>
                                                            <td>&#8369;{{$transaction -> cash}}</td>
                                                            <td>&#8369;{{$transaction -> discount}}</td>
                                                            <td>&#8369;{{$transaction -> vat}}</td>
                                                            <td class="text-center">          
                                                                <a style="margin: 0%" href="{{route('admin.salessummaryshow.show',$transaction -> id)}}" class="btn btn-blue btn-md"   style="font-size: 1rem; ">Show</a>

                                                           
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