@extends('layouts.admin.app')
@section('content')

<div id="cf" class="container-fluid">

        <div class="col-lg-7">
                <div class="card shadow-md mb-6">
                    <div class="card-body">
                            <div class="row">
                                    <h2 id="ct1" class="card-title">Product Categories</h2>
                                     
                                    
                            </div>

                                                        <!-- Default form subscription -->
                            <form class="text-center border border-light p-5">

                                <p class="h4 mb-4">Subscribe</p>

                                <p>Join our mailing list. We write rarely, but only the best content.</p>

                                <p>
                                    <a href="" target="_blank">See the last newsletter</a>
                                </p>

                                <!-- Name -->
                                <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Name">

                                <!-- Email -->
                                <input type="email" id="defaultSubscriptionFormEmail" class="form-control mb-4" placeholder="E-mail">

                                <!-- Sign in button -->
                                <button class="btn btn-info btn-block" type="submit">Sign in</button>


                            </form>
                            <!-- Default form subscription -->
    
                
                    </div>
                </div>
        </div>
    </div>        

@endsection