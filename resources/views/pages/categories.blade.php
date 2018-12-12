@extends('layouts.app')
@section('content')

<div class="container-fluid">
<div class="col-lg-11">
<div class="card shadow-md mb-6">
<div class="card-body">
        <h2 id="ct2" class="card-title">Categories</h2>
        
        <div class="row">
    
        <form>
        <div class="md-form form-group">
                
              <input type="text" class="form-control" id="category" >
            <label class="col-xs-4" for="category">Enter new category here..</label>
               
            <button type="button" class="btn btn-primary btn-sm ml-auto btnLogin">Save Category</button>
        </div>
    
            
                 </form>
 </div>
           
         <div class="table-responsive text-nowrap">
               <br>
               <br>
               <br>
                <h4 id="CL">Category List</h4>
                <table id="CTable" class="table table-striped table-bordered table-sm" cellspacing="0">
                <thead>
                        <tr>
                                
                          <th scope="col"></th>
                          <th scope="col">Categories</th>
                          
                          
          
                        </tr>
                      </thead>

                </table>
        </div>
</div>
</div>
</div>
</div>



    
@endsection