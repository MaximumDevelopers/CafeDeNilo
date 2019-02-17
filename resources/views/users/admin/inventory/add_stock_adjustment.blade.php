@extends('layouts.admin.app')
@section('content')

<div class="container-fluid">
   <div class="col-lg-11">
      <div class="card shadow-md mb-6">
           <div class="card-body">
               <form>

                <div class="form-group md-form ml-0 mr-0">
                        <select class="browser-default custom-select">
                                
                                <option value="1">Select Reason</option>
                                <option value="2">Receive Items</option>
                                <option value="3">Inventory Count</option>
                                <option value="4">Loss</option>
                                <option value="5">Damage</option>
                        </select>                                       
                </div>
                
                <div class="form-group md-form ml-0 mr-0">
                        
                        
                        <div class="md-form">
                                        <textarea id="note textarea-char-counter" name="note" class="form-control md-textarea" length="120" rows="1s"></textarea>
                                        <label for="textarea-char-counter">Note</label>
                         </div>                     
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