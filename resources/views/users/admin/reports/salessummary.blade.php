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
                            <br>
                            
                            <!-- Small Box (Stat card) -->
        <div id="widget" class="container-fluid">
        <div class="row" >
                <div class="col-md-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-info">
                    <div class="inner">
                                
                      <h3>$29000</h3>
                                 
                      <p>Gross Sales</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-shopping-cart"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-2 col-6">
                  <!-- small card -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>20<sup style="font-size: 20px">%</sup></h3>
      
                      <p>Discount</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-2 col-6">
                  <!-- small card -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>12<sup style="font-size: 20px">%</sup></h3>
                      <p>VAT</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-2 col-6">
                  <!-- small card -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>65</h3>
      
                      <p>Net Sales</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                  
                  </div>
                </div>
      
                <div class="col-md-2 col-6">
                              <!-- small card -->
                              <div class="small-box bg-info">
                                <div class="inner">
                                  <h3>150</h3>
                  
                                  <p>Gross Profit</p>
                                </div>
                                <div class="icon">
                                  <i class="fa fa-shopping-cart"></i>
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