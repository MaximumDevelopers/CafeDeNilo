@extends('layouts.owner.app')
@section('content')

<form action="/owner/product/post" method="POST">
                                        {{csrf_field()}}
<div id="cf" class="container-fluid">

        <div class="col-lg-10">
                <div class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row mb-0">
                                    <h2 id="ct1" class="" style="font-weight: 500">NEW PRODUCT</h2>
     
                            </div>
                            
                            <div class="container mt-0">
                                <br>
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                                @endif
                                    
                                        <section>
                                                
                                                <div class="row">
                                                                <div class="col-md-6">
                                                            <div class="form-group">
                                                                    <h5 class="">Product Name</h5>
                                                                <input type="text" name="product_name" class="form-control" placeholder="Please enter product name">
                                                            </div></div>

                                                            <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <h5 class="">Product Category</h5>
                                                                            
                                                                       <select name="category" class="supplierPicker" style="width: 100%">
                                                                        @foreach ($ProductCategories as $category)
                                                                        
                                                                            <option value="{{$category -> id}}"> {{$category -> product_category_name}} </option>     
                                                                    
                                                                        @endforeach
                                                                       </select>
                                                                    </div>
                                                            </div>
                                           
                                                        </div>
                                                        <div class="row">
                                                                
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                        <h5 class="">Time</h5>

                                                                        <div class="input-group date"  id="datetimepicker3" data-target-input="nearest">
                                                                                <input type="text" name="time" class="form-control datetimepicker-input" data-target="#datetimepicker3" value="00:00:00"/>
                                                                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                                                    <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                                                                </div>
                                                                            </div>
                                                                </div>
                                                        </div>

                                                    </div>

                                                <h4 id="ct1" class="ml-0" >Product Item Composition</h4>
                                            <div class="panel panel-footer" >
                                                <table class="table table-bordered mt-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Name</th>
                                                            <th>Quantity</th>
                                                            
                                                            
                                                            <th><a href="#" class="fas fa-plus btn btn-sm btn-blue addRow" onclick="addRow()"><i class="glyphicon glyphicon-plus"></i></a></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                        <tr>

                                        <td>
                                        
                                            <select name="item_name[]" class="form-control select3" style="width: 100%" required="">
                                                <option value="empty">Select Item Here..</option>
                                                    @foreach ($ItemList as $item_name)
                                                    
                                                        <option value="{{$item_name -> id}}"> {{$item_name -> item_name}} </option>     
                                                 
                                                    @endforeach
                                                    
                                            </select>
  
                                        </select> 
                                           
                                        </td>  
                                        
                                          <td><input type="text" name="quantity[]" class="form-control quantity" required></td>
                                         
                                        <td><a href="#" class="btn btn-danger btn-md remove far fa-trash-alt"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>
                                                        </tr>
                                                    </tbody>
                                                   
                                                </table>
                                                <script type="text/javascript">

                                                

function addRow()
{
    
    
    var tr='<tr>'+ 
    
    '<td> <select name="item_name[]" class="form-control select3" style="width: 100%"  required=""> <option value="empty">Select Item Here..</option>'+
        @foreach ($ItemList as $category) 
        '<option value="{{$category -> id}}" >  {{$category -> item_name}}  </option>'+
        @endforeach
        ' </select> </td>'+
     '<td><input type="text" name="quantity[]" class="form-control quantity" required ></td>'+
    '<td><a href="#" class="btn btn-danger btn-md remove far fa-trash-alt"><i class="glyphicon glyphicon-remove"></i></a></td>'+
    '</tr>';
    $('tbody').append(tr);

    $('.select3').select2(); 
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