<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
    
        <a href="index3.html" class="brand-link bg-danger">
                <img src="{{ asset('images/CafeDe\'Nilo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Cafe De Nilo</span>
              </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            
            <div class="info">
              <a href="#" class="d-block">ADMIN</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
              <!-- Reports -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-bar-chart"></i>
                  <p>
                    Reports
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/salesummary" class="nav-link">
                      <i class="fa fa-circle-o nav-icon" style="visibility: hidden;"></i>
                      <p>Sales summary</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/salesbyproduct" class="nav-link">
                      <i class="fa fa-circle-o nav-icon" style="visibility: hidden;"></i>
                      <p>Sales by Product</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
    
              <!-- Products-->
              <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link"> 
                      <i class="nav-icon fa fa-shopping-bag"></i>
                      <p>
                        Products
                        <i class="right fa fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="/admin/products" class="nav-link">
                          <i class="fa fa-circle-o nav-icon" style="visibility: hidden;"></i>
                          <p>Products</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/admin/productcategories" class="nav-link ">
                          <i class="fa fa-circle-o nav-icon" style="visibility: hidden;"></i>
                          <p>Product Categories</p>
                        </a>
                      </li>
                      
                    </ul>
                  </li>
    
                <!-- Inventory-->
              <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link"> 
                      <i class="nav-icon fa fa-shopping-cart"></i>
                      <p>
                        Inventory
                        <i class="right fa fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="/admin/item_list" class="nav-link">
                          <i class="fa fa-circle-o nav-icon" style="visibility: hidden;"></i>
                          <p>Item list</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/admin/categories" class="nav-link ">
                          <i class="fa fa-circle-o nav-icon" style="visibility: hidden;"></i>
                          <p>Item Categories</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/admin/stockadjustment" class="nav-link ">
                          <i class="fa fa-circle-o nav-icon" style="visibility: hidden;"></i>
                          <p>Stock History</p>
                        </a>
                      </li>
                     
                      <li class="nav-item">
                        <a href="/admin/critical_stock" class="nav-link">
                          <i class="fa fa-circle-o nav-icon" style="visibility: hidden;"></i>
                          <p>Critical Stock</p>
                        </a>
                      </li>
                      
                    </ul>
                  </li>  
    
                  <!-- accoutns -->
              <li class="nav-item">
                <a href="/admin/accounts" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    Accounts
                    
                  </p>
                </a>
              </li>
    
              <!-- accoutns -->
    
              <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      <i class="nav-icon fas fa-sign-out-alt"></i>
                      <p>
                            Logout
                      </p>
                    </a>
                  </li>
    
    
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
    
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>