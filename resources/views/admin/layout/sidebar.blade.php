<header class="main-nav">
    
          <div class="sidebar-user text-center" style="padding:4px">
              <a class="setting-primary" href="{{ route('setting') }}">
                  
                  <i data-feather="settings"></i></a><a href="{{route('admin.dashboard')}}"><img class="img-70 rounded-circle" src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt=""></a>
              <a href="{{route('admin.dashboard')}}"><h6 class="mt-3 f-14 f-w-600" style="margin-bottom: 10px;">{{Auth::guard("admin")->user()->name}}</h6></a>
              @php
                $roles = Auth::guard('admin')->user()->roles->pluck('name');
             
              @endphp
          </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">

                <ul class="nav-menu custom-scrollbar" style="height:calc(80vh - 95px)!important">

                  <li class="sidebar-main-title"></li>
                  
                   <li class="dropdown"><a class="nav-link menu-title active" href="{{route('admin.dashboard')}}"><i data-feather="box"></i><span>Dashboard</span></a>
                    
                  </li>
                  
                    @can('Role Master')
                    <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Role & Permission</span></a>
                        <ul class="nav-submenu menu-content">
                            @can('Role Create')
                                <li><a href="{{route('role-create')}}" class="  ">Create Role</a></li>
                            @endcan
                            
                            @can('Role List')                            
                            <li><a href="{{route('role-list')}}">List Role</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                  @can('Business Master')
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Business Category</span></a>
                    <ul class="nav-submenu menu-content">
                      @can('Business Create')
                        <li><a href="{{route('business_cat-create')}}" class="  ">Create Business Category</a></li>
                      @endcan

                      @can('Business List')
                        <li><a href="{{route('business_cat-list')}}">List Business Category</a></li>
                      @endcan 

                    </ul>
                  </li>
                  @endcan
                  
               
                @can('Property Master')
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Service Property</span></a>
                    <ul class="nav-submenu menu-content">
                        @can('Property Create')
                        <li><a href="{{route('service_property-create')}}" class="">Create Service Property</a></li>
                        @endcan
                        
                        @can('Property List')
                        <li><a href="{{route('service_property-list')}}">List Service Property</a></li>
                        @endcan
                         
                    </ul>
                  </li>
                @endcan
                
                
                @can('User Master')
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>User</span></a>
                    <ul class="nav-submenu menu-content">
                        @can('User Create')
                            <li><a href="{{route('user-create')}}" class="  ">Create User</a></li>
                        @endcan
                        
                        @can('User List')
                        <li><a href="{{route('user-list')}}">List User</a></li>
                        @endcan
                        
                    </ul>
                  </li>
                @endcan
                  
                    
                    @can('Booking Master')
                      <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Booking</span></a>
                        <ul class="nav-submenu menu-content">

                            @can('Booking List')
                                <li><a href="{{route('bookingoffline-list','pending')}}" class="  ">Pending</a></li>
                            @endcan
                            
                            @can('Booking List')
                                <li><a href="{{route('bookingoffline-list','accepted')}}" class="  ">Accepted</a></li>
                            @endcan

                            @can('Booking List')
                                <li><a href="{{route('bookingoffline-list','rejected')}}" class="  ">Cancelled</a></li>
                            @endcan

                        </ul>
                        
                      </li>
                    @endcan

                </ul>
               
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
