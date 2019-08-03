@extends('layouts.admin.app')

<div class="row mt-5">
    <h2 id="ct1" class="card-title">Sales Summary</h2>
    
</div>
<table id="" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
             
            <th scope="col">Transaction ID</th>
          <th scope="col">Date</th>
          <th scope="col">Gross Sales</th>
          <th scope="col">Net Sales</th>
          <th scope="col">Cash</th>
          <th scope="col">Discount</th>
          <th scope="col">Vat</th>
          

          

        </tr>
      </thead>
      <tbody>
            @foreach ($ordered_products2 as $transaction)
            <tr>
                              
                        <td>{{$transaction -> id}}</td>  
                        <td data-sort>{{$transaction -> date}}</td>
                        <td align="right">&#8369;{{$transaction -> total_price}}</td>
                        <td align="right">&#8369;{{$transaction -> net_sales}}</td>
                        <td align="right">&#8369;{{$transaction -> cash}}</td>
                        <td align="right">&#8369;{{$transaction -> discount}}</td>
                        <td align="right">&#8369;{{$transaction -> vat}}</td>
                        
                       

                      

                </tr>
                @endforeach

        </tbody>
    
  </table>
