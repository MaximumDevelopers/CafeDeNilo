@extends('layouts.admin.app')
<h2 id="ct1" class="card-title">Sales Summary Per Month</h2>  
<table id="" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
             
          
          <th scope="col">Date</th>
          <th scope="col">Gross Sales</th>
          
          <th scope="col">Net Sales</th>


         
          
          

        </tr>
      </thead>
      <tbody>
            @foreach ($ordered_products2 as $transaction)
            <tr>
                              
                            
                        <td data-sort>{{$transaction -> date}}</td>
                        <td align="right">&#8369;{{$transaction -> total_price}}</td>
                        <td align="right">&#8369;{{$transaction -> net_sales}}</td>
                        
                      

                </tr>
                @endforeach

        </tbody>
    
  </table>