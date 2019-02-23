<!-- Sidebar -->
<div class="sidebar-fixed position-fixed" style="overflow-y: auto;">
    <div class="sidebar-header ">
 <a class="logo-wrapper waves-effect">
      <img src={{ asset('images/CafeDe\'Nilo.png') }} class="img-fluid" alt="">
  </a>
</div>
  <div class="list-group list-group-flush ">
        
        <div class="accordion md-accordion" id="accordionExample">
            <!-- #1-->
            <div class="card-header " id="headingOne">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h6 class="mb-0">
                            <i class="fa fa-bar-chart mr-3"></i>Reports
                            <i class="fa fa-angle-down float-right mt-1"></i>
                        </h6>     
                    </a>
                </div>
                <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <a href="items">
                                
                                <a href="/admin/salesummary">
                                        <h6 class="mb-2">
                                            <i class="fa fa-shopping-bag mr-3" style="visibility: hidden;"></i>Sales summary
                                        <h6>        
                                </a>

                                <a href="/admin/salesbyproduct">
                                        <h6 class="mb-2">
                                            <i class="fa fa-shopping-bag mr-3" style="visibility: hidden;"></i>Sales by Product
                                        <h6>        
                                </a>

                            
                        </a>
                    </div>
                </div>

                

                <!-- #2.5 -->
                <div class="card-header" id="headingTwoFive">
                        <a data-toggle="collapse" href="#collapseTwoFive" aria-expanded="false" aria-controls="collapseTwoFive">
                                <h6 class="mb-0">
                                        <i class="fa fa-shopping-bag mr-3"></i>Products
                                    <i class="fa fa-angle-down float-right mt-1"></i>
                                </h6>     
                            </a>
                </div>
                
                <div id="collapseTwoFive" class="collapse" aria-labelledby="headingTwoFive" data-parent="#accordionExample">
                        <div class="card-body">
                                <a href="/admin/products">
                                        <h6 class="mb-2">
                                            <i class="fa fa-shopping-bag mr-3" style="visibility: hidden;"></i>Products
                                        <h6>        
                                </a>
    
                                <a href="/admin/productcategories">
                                        <h6 class="mb-2">
                                            <i class="fa fa-shopping-bag mr-3" style="visibility: hidden;"></i>Product Categories
                                        <h6>        
                                </a>
                        </div>
                </div>
                
                <!-- #3-->
                <div class="card-header" id="headingThree">
                    <a data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h6 class="mb-0">
                            <i class="fas fa-shopping-cart mr-3"></i>Inventory Management
                            <i class="fa fa-angle-down float-right mt-1"></i>
                        </h6>     
                    </a>
                </div>

                

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">

                                <a href="/admin/item_list">
                                        <h6 class="mb-2">
                                            <i class="fa fa-shopping-bag mr-3" style="visibility: hidden;"></i>Item list
                                        <h6>        
                                </a>
    
                                <a href="/admin/categories">
                                        <h6 class="mb-2">
                                            <i class="fa fa-shopping-bag mr-3" style="visibility: hidden;"></i>Item Categories
                                        <h6>        
                                </a>

                                <a href="/admin/stockadjustment">
                                    <h6 class="mb-2">
                                        <i class="fa fa-shopping-bag mr-3" style="visibility: hidden;"></i>Stock Adjustment History
                                    <h6>        
                                </a>
                                
                                <a href="/admin/critical_stock">
                                    <h6 class="mb-2">
                                        <i class="fa fa-shopping-bag mr-3" style="visibility: hidden;"></i>Critical Stock
                                    <h6>        
                            </a>
                        </div>
                    </div>
                </div>

                <!-- #4-->
                <div class="card-header waves-effect" id="headingFour">
                    <a href="/admin/accounts">
                            <h6 class="mb-0">
                                    <i class="fa fa-user mr-3"></i>Accounts
                            </h6>           
                    </a>
                </div>
              
                <div  id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordionExample" >
                    <div class="card-body">
                            <a href="accounts" class=" waves-effect">
                                <i class="fa fa-user mr-3"></i>Employees
                            </a>
                    </div>
                </div>
                
                

                <!-- #6 -->
                <div class="card-header" id="headingFive">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                <h6 class="mb-0">
                                    <i class="fas fa-sign-out-alt mr-3"></i>Logout
                                <h6>     
                        </a>
                </div>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
                
             </div>
        </div>

        <!--<a href="Msample" class="list-group-item waves-effect">
            <i class="fa fa-bar-chart mr-3"></i>Reports
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-shopping-bag mr-3"></i>Items
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-shopping-cart mr-3"></i>Inventory Management
        </a>
        <a href="accounts" class="list-group-item list-group-item-action waves-effect" >
            <i class="fa fa-user mr-3"></i>Employees
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-cog mr-3"></i>Settings
        </a>-->
  </div>

</div>
<!-- Sidebar -->