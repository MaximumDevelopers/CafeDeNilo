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
                        
                        <a id="btnsales"  href="/admin/salesummaryd" class="btn btn-primary btn-sm ml-auto btnLogin">Today
                        </a>
                            
                       
                            <a id="btnsales"  href="/admin/salesummarym" class="btn btn-primary btn-sm ml-auto btnLogin">Monthly
                            </a>

                            <a id="btnsales"  href="/admin/salesummaryy" class="btn btn-primary btn-sm ml-auto btnLogin">Year
                            </a>

                            <br>
                            <br>
                            <!-- Small Box (Stat card) -->
        <div id="widget" class="container-fluid">
        <div class="row" >
                <div class="col-md-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      @if ($ordered_products->isNotEmpty())
                      @foreach($ordered_products as $transactions)
                      <h3>&#8369;{{count($ordered_products)}}</h3>
                                 @endforeach
                      @else
                      <h3>&#8369;0.00</h3>
                      @endif
                                
                      <p>Gross Sales</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-shopping-cart"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-success">
                    <div class="inner">
                        @if ($ordered_products4->isNotEmpty())
                        @foreach($ordered_products4 as $transactions)
                        <h3>&#8369;{{$transactions -> discount}}</h3>
                                   @endforeach
                        @else
                        <h3>&#8369;0.00</h3>
                        @endif
                      <p>Discount</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                        @if ($ordered_products5->isNotEmpty())
                        @foreach($ordered_products5 as $transactions)
                        <h3>&#8369;{{ $transactions -> vat}}</h3>
                                   @endforeach
                        @else
                        <h3>&#8369;0.00</h3>
                        @endif
                      <p>VAT</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                        @if ($ordered_products3->isNotEmpty())
                        @foreach($ordered_products3 as $transactions)
                        <h3>&#8369;{{$transactions -> net_sales}}</h3>
                                   @endforeach
                        @else
                        <h3>&#8369;0.00</h3>
                        @endif
                      <p>Net Sales</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                  
                  </div>
                </div>
      
                
                <!-- ./col -->
              </div>
              <!-- /.row -->
        </div>

   
                        
                   <div class="table-reponsive text-nowrap">
    
                                <table id="dtSaleSummary" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 
                                              
                                              <th scope="col">Date</th>
                                              <th scope="col">Gross Sales</th>
                                              
                                              <th scope="col">Net Sales</th>
                                              <th></th>

                                             
                                              
                                              
                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($ordered_products2 as $transaction)
                                                <tr>
                                                                  
                                                                
                                                            <td data-sort>{{$transaction -> date}}</td>
                                                            <td>&#8369;{{$transaction -> total_price}}</td>
                                                            <td>&#8369;{{$transaction -> net_sales}}</td>
                                                            
                                                            
                                                            <td class="text-center">
                                                               @if ($date == "day")
                                                               <a style="margin: 0%" href="{{route('admin.salessummaryshow.show',$transaction -> id)}}" class="btn btn-blue btn-md"   style="font-size: 1rem; ">Show</a> 
                                                              
                                                               @elseif($date == "month")
                                                               <a style="margin: 0%" href="{{route('admin.salesummarym.show',$transaction -> date)}}" class="btn btn-blue btn-md"   style="font-size: 1rem; ">Show</a> 

                                                               @elseif($date == "year")
                                                               <a style="margin: 0%" href="{{route('admin.salesummaryy.show',$transaction -> date)}}" class="btn btn-blue btn-md"   style="font-size: 1rem; ">Show</a> 
                                                               
                                                               @endif
                                                                
                                                                
                                                               
                                                                    
                                                               
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