<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/home') }}">
        <div class="sidebar-brand-icon">
         <img src="https://webmobilez.com/wp-content/themes/webmobilez/images/logo.svg"/>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

 
    <!-- Divider -->
    <hr class="sidebar-divider">

@if(App\Libraries\Access::checkUserAccess())

    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/user*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/user/') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Users List</span></a>
        </li>
         <li class="nav-item {{ request()->is('admin/reports*') ? 'active' : '' }}">
       
              <a class="nav-link" href="{{ url('admin/reports/') }}">
                <i class="fas fa-fw fa-flag"></i>
                <span>Daily Progress Report</span></a>

        </li>


@endif
@if(App\Libraries\Access::salescheckUserAccess())

        <li class="nav-item {{ request()->is('admin/userreports*') ? 'active' : '' }}">
       
              <a class="nav-link" href="{{ url('admin/userreports/') }}">
                <i class="fas fa-fw fa-flag"></i>
                <span>Daily Progress Report</span></a>

        </li>
      

@endif
  
       



<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
