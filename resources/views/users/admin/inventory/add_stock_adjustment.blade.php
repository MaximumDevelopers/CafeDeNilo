@extends('layouts.admin.app')
@section('content')

<div class="container-fluid">
   <div class="col-lg-11">
      <div class="card shadow-md mb-6">
           <div class="card-body">
               <form>

                <div class="form-group md-form ml-0 mr-0">
                        <select class="browser-default custom-select">
                                <option  disabled selected>Reason</option>
                                <option value="1">All Reasons</option>
                                <option value="2">Receive Items</option>
                                <option value="3">Inventory Count</option>
                                <option value="4">Loss</option>
                                <option value="5">Damage</option>
                        </select>                                       
                </div>
                
                <div class="form-group md-form ml-0 mr-0">
                        <i class="far fa-sticky-note prefix"></i>
                        <input id="note" type="text" class="form-control" name="note" required>
                        <label for="note" class="ml-8">{{ __('Note..') }}</label>                     
                </div>
                
               </form>
         </div>
       </div>
    </div>
</div>
<br>

<div class="container-fluid">
        <div class="col-lg-11">
           <div class="card shadow-md mb-6">
                <div class="card-body">
                        <h3 id="ct2" class="card-title">Items</h3>

                        <div class="table-responsive text-nowrap">
                    
                                 <table class="table table-striped table-bordered table-sm" cellspacing="0">
                                 <thead>
                                         <tr>
                                                 
                                           <th scope="col">No.</th>
                                           <th scope="col">Name</th>
                                           <th scope="col">Weight</th>
                                           <th scope="col">Symbol</th>
                                           
                                           
                           
                                         </tr>
                                       </thead>
                 
                                 </table>
                         </div>
     
     
     
     
                    
              </div>
            </div>
            <div id="btnAdj" class="row mr-auto">
                <a href="stockadj">
                    <button type="button" class="btn btn-primary btn-sm">Cancel</button>
                </a>
                    <button type="button" class="btn btn-primary btn-sm">Adjust</button>
              </div>
         </div>
        
     </div>
     
    
@endsection