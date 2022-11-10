@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">	
    <div class="user-profile">
      <div class="ulogo">
        <a href="index.html">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">					 	
            <img src="{{ asset('backend/images/sports lover logo W.png') }}" height="30px" widhth="50px" alt="">
            <h3><b>Sports lover</b> Admin</h3>
          </div>
        </a>
      </div>
    </div>
    
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">  
      <li class="{{ ($route == 'admin.dashboard')? 'active':'' }}">
        <a href="{{ route('admin.dashboard') }}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>  

      <li class="header nav-small-cap"><b style="color:white">Manage Items :</b></li>
  
      <li class="treeview {{ ($prefix == '/brand')? 'active':'' }}">
        <a href="#">
          <i data-feather="box"></i> <span>Brands</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All brand</a></li>
        </ul>
      </li> 
    
      <li class="treeview {{ ($prefix == '/category')? 'active':'' }}">
        <a href="#">
          <i data-feather="list"></i> <span>Category</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All category</a></li>
          <li class="{{ ($route == 'all.SubCategory')? 'active':'' }}"><a href="{{ route('all.SubCategory') }}"><i class="ti-more"></i>Sub category</a></li>
          <li class="{{ ($route == 'all.SubSubCategory')? 'active':'' }}"><a href="{{ route('all.SubSubCategory') }}"><i class="ti-more"></i>Sub->Sub category</a></li>
        </ul>
      </li>
  
      <li class="treeview {{ ($prefix == '/product')? 'active':'' }}">
        <a href="#">
          <i data-feather="shopping-bag"></i> <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'add.product')? 'active':'' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
          <li class="{{ ($route == 'manage.product')? 'active':'' }}"><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Products</a></li>
        </ul>
      </li> 		  
    
      <li class="header nav-small-cap"><b style="color:white">Manage Website :</b></li>
    
      <li class="treeview {{ ($prefix == '/slider')? 'active':'' }}">
        <a href="#">
          <i data-feather="image"></i><span>Slider</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'manage.slider')? 'active':'' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manager Slider</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/infobox')? 'active':'' }}">
        <a href="#">
          <i data-feather="info"></i><span>Info box</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'manage.infobox')? 'active':'' }}"><a href="{{ route('manage.infobox') }}"><i class="ti-more"></i>Manager Info box</a></li>
        </ul>
      </li>

      <!-- ################# freelance it lab start ################## -->

      <!-- freelance it is comment out -->

      {{-- 

      <li class="header nav-small-cap"><b style="color:white">Freelance IT Lab :</b></li>
    
      <li class="treeview {{ ($prefix == '/business')? 'active':'' }}">
        <a href="#">
          <i data-feather="home"></i><span>Business</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'new.business')? 'active':'' }}"><a href="{{ route('new.business') }}"><i class="ti-more"></i>New Business</a></li>
          <li class="{{ ($route == 'all.business')? 'active':'' }}"><a href="{{ route('all.business') }}"><i class="ti-more"></i>All Business</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/transaction')? 'active':'' }}">
        <a href="#">
          <i data-feather="dollar-sign"></i><span>Transaction</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'new.transaction')? 'active':'' }}"><a href="{{ route('new.transaction') }}"><i class="ti-more"></i>New Transaction</a></li>
          <li class="{{ ($route == 'all.transaction')? 'active':'' }}"><a href="{{ route('all.transaction') }}"><i class="ti-more"></i>All Transaction</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/marketer')? 'active':'' }}">
        <a href="#">
          <i data-feather="smile"></i><span>Marketer</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'new.marketer')? 'active':'' }}"><a href="{{ route('new.marketer') }}"><i class="ti-more"></i>New Marketer</a></li>
          <li class="{{ ($route == 'all.marketer')? 'active':'' }}"><a href="{{ route('all.marketer') }}"><i class="ti-more"></i>All Marketer</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/visit')? 'active':'' }}">
        <a href="#">
          <i data-feather="navigation"></i><span>Visit</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'new.visit')? 'active':'' }}"><a href="{{ route('new.visit') }}"><i class="ti-more"></i>New Visit</a></li>
          <li class="{{ ($route == 'all.visit')? 'active':'' }}"><a href="{{ route('all.visit') }}"><i class="ti-more"></i>All Visit</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/marketer')? 'active':'' }}">
        <a href="#">
          <i data-feather="target"></i><span>Target</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'set.target')? 'active':'' }}"><a href="{{ route('set.target') }}"><i class="ti-more"></i>Set target</a></li>
          <li class="{{ ($route == 'all.target')? 'active':'' }}"><a href="{{ route('all.target') }}"><i class="ti-more"></i>view target</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/comission')? 'active':'' }}">
        <a href="#">
          <i data-feather="tag"></i><span>Comission</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'new.comission')? 'active':'' }}"><a href="{{ route('new.comission') }}"><i class="ti-more"></i>New Comission</a></li>
          <li class="{{ ($route == 'all.comission')? 'active':'' }}"><a href="{{ route('all.comission') }}"><i class="ti-more"></i>All Comission</a></li>
        </ul>
      </li>

      --}}

      <!-- freelance it is comment out -->

      <!-- ################# freelance it lab End ################## -->

    </ul>
  </section>

  <div class="sidebar-footer">
    <!-- item -->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item -->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item -->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
  </div>

</aside>