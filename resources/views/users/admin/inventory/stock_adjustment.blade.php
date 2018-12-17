@extends('layouts.admin.app')
@section('content')

<div class="container-fluid">
   <div class="col-lg-11">
      <div class="card shadow-md mb-6">
          <div class="card-body ml-auto">
                <div class="row">
                    <a href="addstockadj">
                   <button id="btnSA" type="button" class="btn btn-primary btn-md">
                   <i class="fas fa-plus"></i>    Add Stock Adjustments
                </button>
                    </a>

                </div>
            </div>
       </div>
    </div>
</div>

@endsection