<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar - Brand -->
    <a class="mobile-nav-bar align-items-center justify-content-center hide-always d-md-none" href="{{ url('admin/home') }}">
        <div class="sidebar-brand-icon">

        </div>
    </a>
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <a href="{{ url('admin/userreports') }}"><img  src="https://webmobilez.com/consultants/css/Group%201.png" 
                                                   height="50px" class="svg-content"></a>



    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item  no-arrow">

            <a class="nav-link " href="{{url('admin/hotlist')}}"  role="button" >

                <span class="mr-2 d-none d-lg-inline small btn btn-web"><i class="fa fa-file" aria-hidden="true"></i>  Documents</span>

            </a>
        </li>
        <li class="nav-item  no-arrow">

            <a class="nav-link " href="{{url('admin/sales')}}"  role="button" >

                <span class="mr-2 d-none d-lg-inline small btn btn-web">Hot List</span>

            </a>
        </li>
        <li class="nav-item  no-arrow">

            <a class="nav-link " href="{{url('admin/interviews')}}"  role="button" >

                <span class="mr-2 d-none d-lg-inline small btn btn-web">Schedule Interviews</span>

            </a>
        </li>
        @php

        $usertype = \Auth::user()->user_type;
        if($usertype=='A')
        {

        @endphp
       

        <li class="nav-item  no-arrow">

            <a class="nav-link " href="{{url('admin/user')}}"  role="button" >

                <span class="mr-2 d-none d-lg-inline small btn btn-web">Users</span>

            </a>
        </li>

        @php
        }
        @endphp

        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline small btn btn-web">Consultants</span>

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="{{ url('admin/user/'.Auth::user()->id) }}">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                     Profile
                 </a> -->
                <a class="dropdown-item" href="{{url('admin/userreports/create')}}">

                    <i class="fa fa-address-card mr-2 text-gray-400"></i>
                    Add Consultant
                </a> 
                @if ($usertype=='A')
                <a class="dropdown-item" href="{{url('admin/reports')}}">
                    <i class="fa fa-address-card mr-2 text-gray-400"></i>
                    View Consultants
                </a>
                @else
                <a class="dropdown-item" href="{{url('admin/userreports')}}">
                    <i class="fa fa-address-card mr-2 text-gray-400"></i>
                    View Consultants
                </a>
                @endif
               
              

            </div> 
        </li>
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline small btn btn-web">Vendors</span>

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="{{ url('admin/user/'.Auth::user()->id) }}">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                     Profile
                 </a> -->
       
                @if ($usertype=='A')
                <a class="dropdown-item" href="{{url('admin/adminvendors')}}">
                    <i class="fa fa-industry mr-2 text-gray-400"></i>
                    Consultant Submissions
                </a>
                <a class="dropdown-item" href="{{url('admin/companies/create')}}">

                    <i class="fa fa-address-card mr-2 text-gray-400"></i>
                     Vendor Details
                </a>    
                <a class="dropdown-item" href="{{url('admin/allvendors')}}">

                    <i class="fa fa-address-card mr-2 text-gray-400"></i>
                     Vendor Contacts
                </a>    
                @else
                <a class="dropdown-item" href="{{url('admin/vendors')}}">
                    <i class="fa fa-industry mr-2 text-gray-400"></i>
                    Consultant Submissions
                </a>

                @endif
               
            </div> 
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small">{{ Auth::user()->name }}</span>
                <i class="fa fa-user"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="{{ url('admin/user/'.Auth::user()->id) }}">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                     Profile
                 </a> -->
                <a class="dropdown-item" href="{{ url('admin/change-password/') }}">
                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div> 
        </li>

    </ul>

</nav>
<!-- End of Topbar -->