<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('public/img/default_profile.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>User Name</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN</li>
          
        <li>
          <a href="{{ url('/customer') }}">
           <i class="fa fa-user"></i>
            <span>
              Customer
            </span>
          </a>
        </li>
        <li>
          <a href="{{ url('/product') }}">
           <i class="fa fa-barcode"></i>
            <span>
              Product
            </span>
          </a>
        </li>  
        <li>
          <a href="{{ url('/order') }}">
           <i class="fa fa-cart-plus"></i>
            <span>
              Order
            </span>
          </a>
        </li>  
       
     
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>