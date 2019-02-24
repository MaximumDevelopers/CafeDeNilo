@extends('layouts.admin.app')
@section('content')

<form action="/admin/product/post" method="POST">
                                        {{csrf_field()}}
<div id="cf" class="container-fluid">

        <div class="col-lg-10">
                <div class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row mb-0">
                                    <h2 id="ct1" class="card-title">NEW PRODUCT</h2>
     
                            </div>
                            
                            <div class="container mt-0">
                                <br>
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                                @endif
                                    
                                        <section>
                                                <h4 id="ct1" class="ml-0" >Product</h4>

                                                <div class="row">
                                                                <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="product_name" class="form-control" placeholder="Please enter product name">
                                                            </div></div>
                                           
                                                        </div>


                                                <h4 id="ct1" class="ml-0" >Product Item Composition</h4>
                                            <div class="panel panel-footer" >
                                                <table class="table table-bordered mt-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                            
                                                            <th><a href="#" class="fas fa-plus btn btn-sm btn-blue addRow" onclick="addRow()"><i class="glyphicon glyphicon-plus"></i></a></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                        <tr>

                                        <td>
                                        
                                            <select name="item_name[]" class="form-control" required="">
                                                <option value="empty">Select Item Here..</option>
                                                    @foreach ($ItemList as $item_name)
                                                    
                                                        <option value="{{$item_name -> id}}"> {{$item_name -> item_name}} </option>     
                                                 
                                                    @endforeach
                                                    
                                            </select>

                                            
                                            
                                        </select> 
                                           
                                        </td>  
                                          <td><input type="text" name="quantity[]" class="form-control quantity"></td>
                                          <td><input type="text" name="budget[]" class="form-control budget"></td>
                                          <td><input type="text" name="amount[]" class="form-control amount"></td>
                                        <td><a href="#" class="btn btn-danger btn-md remove far fa-trash-alt"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td style="border: none"></td>
                                                            <td style="border: none"></td>
                                                            <td>Total</td>
                                                            <td><b class="total"> &#8369;0.00</b></td>
                                                            <td></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <script type="text/javascript">

                                                

function addRow()
{
    
    
    var tr='<tr>'+ 
    
    '<td> <select name="item_name[]" class="form-control" required=""> <option value="empty">Select Item Here..</option>'+
        @foreach ($ItemList as $category) 
        '<option value="{{$category -> id}}" >  {{$category -> item_name}}  </option>'+
        @endforeach
        ' </select> </td>'+
     '<td><input type="text" name="quantity[]" class="form-control quantity" ></td>'+
    '<td><input type="text" name="budget[]" class="form-control budget"></td>'+
    ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
    '<td><a href="#" class="btn btn-danger btn-md remove far fa-trash-alt"><i class="glyphicon glyphicon-remove"></i></a></td>'+
    '</tr>';
    $('tbody').append(tr);
};
                                                        </script>
                                            </div>

                                            <div class="row mr-auto">
                                                        <input type="submit" name="" value="Submit" class="btn btn-sm btn-success ml-auto">
                                               </div>
                                        </section>
                                        
                                        
                                </form> 
                               </div>
                               
                               
    
                
                    </div>
                </div>
        </div>
    </div> 

    



@endsection