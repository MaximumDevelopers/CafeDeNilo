@extends('layouts.owner.graphs1')
@section('content')


<!--Frappenilo Cups -->

<div id="cf" class="container-fluid">
        <div class="row">

        <div class="col-md-7">
                <div id="c2" class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row">
                                    <h2 id="ct1" class="card-title">Sales by Product</h2>
                                    
                            </div>
                            <a id="btnsales"  href="/owner/salesbyproduct" class="btn btn-primary btn-sm ml-auto btnLogin">Today
                            </a>
                                
                           
                                <a id="btnsales"  href="/owner/salesbyproductm" class="btn btn-primary btn-sm ml-auto btnLogin">This Month
                                </a>
    
                                <a id="btnsales"  href="/owner/salesbyproducty" class="btn btn-primary btn-sm ml-auto btnLogin">This Year
                                </a>
                           

                                        <br>
                                        <br>
   
                        
                        <div class="table-reponsive text-nowrap">
    
                                <table id="dtSaleSummary1" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 
                                              
                                            
                                              <th scope="col">Product Name</th>
                                              <th scope="col">Quantity</th>
                                              <th scope="col">Price</th>
                                             
                                              
                                              
                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($ordered_products as $transaction)
                                                <tr>
                                                                  
                                                            
                                                          
                                                            <td>{{$transaction -> product_name}}</td>
                                                            <td align="right" data-sort>{{$transaction -> quantity }}</td>
                                                            <td align="right">&#8369;{{$transaction -> total_price}}</td>
                                                           

                                                          
                                                            
                                                    </tr>
                                                    @endforeach
                        
                                            </tbody>
                                        
                                      </table>
            
            
                               </div>
                         
                    </div>
        
        
                       
                        </div>
                        
                  
                       
            
                    </div>



         <!--Grid column-->
         <div class="col-md-5">

                        <!--Card-->
                        <div class="card">
    
                            <!-- Card header -->
                            <div class="card-header">Top 5 Products</div>
    
                            <!--Card content-->
                            <div class="card-body">
    
                                <canvas id="doughnutChart"></canvas>
    
                            </div>
    
                        </div>
                        <!--/.Card-->
    
                    </div>
                    <!--Grid column-->        
        </div>

                    
        </div>
       

        <!-- Frappenilo Cups -->

            


<script>
        //doughnut
$(document).ready(function () {  
var ctxD = document.getElementById("doughnutChart").getContext('2d');
var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
        labels: [

        @if(count($graphs) != 0)
                @foreach($graphs as $graph)
                '{{$graph -> product_name}}',
                
                @endforeach  
                
        @else
        'No Data Available',
        @endif
                

        ],
        datasets: [{
            data: [

                @if(count($graphs) != 0)
                @foreach($graphs as $graph)
                '{{$graph -> quantity}}',
                
                @endforeach 
                
                @else
                '1',
                @endif
                
               
            ],
            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
    },
    options: {
        responsive: true
    }
});
});
        </script>




@endsection