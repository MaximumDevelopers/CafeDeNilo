@extends('layouts.admin.app')
@section('content')


<!--Frappenilo Cups -->

<div id="cf" class="container-fluid">

        <div class="col-lg-11">
                <div id="c2" class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row">
                                    <h2 id="ct1" class="">Sales Summary</h2>
                                    
                            </div>
                            
                            <!-- Small Box (Stat card) -->
        
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Gross sales</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Discount</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>
                <p>Vat</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Net Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-2 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>150</h3>
            
                            <p>Gross sales</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                          </div>
                          <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
   
                        
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
                                                @foreach ($ordered_products as $transaction)
                                                <tr>
                                                                  
                                                            <td>{{$transaction -> date}}</td>
                                                            <td>&#8369;{{$transaction -> total_price}}</td>
                                                          
                                                            <td class="text-center">          
                                                                <a style="margin: 0%" href="{{route('admin.salesummary.show',$transaction -> id)}}" class="btn btn-blue btn-md"   style="font-size: 1rem; ">Show</a>
                                     
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