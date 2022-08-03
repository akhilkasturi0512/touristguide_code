<header class="main-nav">
          <div class="sidebar-user text-center" style="padding:4px">
              <a class="setting-primary" href="<?php echo e(route('setting')); ?>"><i data-feather="settings"></i></a><a href="<?php echo e(route('admin.dashboard')); ?>"><img class="img-70 rounded-circle" src="<?php echo e(asset('admin/assets/images/dashboard/logo.jpg')); ?>" alt=""></a>
            <!--<div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="<?php echo e(route('admin.login')); ?>">-->
              <a href="<?php echo e(route('admin.dashboard')); ?>"><h6 class="mt-3 f-14 f-w-600" style="margin-bottom: 10px;"><?php echo e(Auth::guard("admin")->user()->name); ?></h6></a>
              <?php
                $roles = Auth::guard('admin')->user()->roles->pluck('name');
             
              ?>
            <?php echo $roles; ?>

            <!--<p class="mb-0 font-roboto"><?php echo e(Auth::guard("admin")->user()->name); ?></p>-->
            
          </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">

                <ul class="nav-menu custom-scrollbar" style="height:calc(100vh - 250px)!important">

                  <li class="sidebar-main-title"></li>
                  
                   <li class="dropdown"><a class="nav-link menu-title active" href="<?php echo e(route('admin.dashboard')); ?>"><i data-feather="box"></i><span>Dashboard</span></a>
                    
                  </li>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Business Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Business Category</span></a>
                    <ul class="nav-submenu menu-content">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Business Create')): ?>
                        <li><a href="<?php echo e(route('business_cat-create')); ?>" class="  ">Create Business Category</a></li>
                      <?php endif; ?>

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Business List')): ?>
                        <li><a href="<?php echo e(route('business_cat-list')); ?>">List Business Category</a></li>
                      <?php endif; ?> 

                    </ul>
                  </li>
                  <?php endif; ?>

                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Amenities</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('aminities-create')); ?>" class="  ">Create Amenities</a></li>
                        <li><a href="<?php echo e(route('aminities-list')); ?>">List Amenities</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Cities</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('cities-create')); ?>" class="  ">Create Cities</a></li>
                        <li><a href="<?php echo e(route('cities-list')); ?>">List Cities</a></li>
                    </ul>
                  </li>
                  

                    <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Role & Permission</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="<?php echo e(route('role-create')); ?>" class="  ">Create Role</a></li>
                            <li><a href="<?php echo e(route('role-list')); ?>">List Role</a></li>
                        </ul>
                    </li>


                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Room Type</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('room_type-create')); ?>" class="  ">Create Room Type</a></li>
                        <li><a href="<?php echo e(route('room_type-list')); ?>">Room Type List</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Banner Type</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('banner_type-create')); ?>" class="  ">Create Banner Type</a></li>
                        <li><a href="<?php echo e(route('banner_type-list')); ?>">Banner Type List</a></li>
                    </ul>
                  </li>
                  

                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Vendor</span></a>
                    <ul class="nav-submenu menu-content">
                        
                        <li><a href="<?php echo e(route('hostelOwner-list')); ?>">List Vendor</a></li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Institute</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('institute-create')); ?>" class="">Create Institute</a></li>
                        <li><a href="<?php echo e(route('institute-list')); ?>">List Institute</a></li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Service Property</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('service_property-create')); ?>" class="">Create Service Property</a></li>
                        <li><a href="<?php echo e(route('service_property-list')); ?>">List Service Property</a></li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Admin Users</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('admin-create')); ?>" class="  ">Create Admin</a></li>
                        <li><a href="<?php echo e(route('admin-list')); ?>">List Admin</a></li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>User</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('user-create')); ?>" class="  ">Create User</a></li>
                        <li><a href="<?php echo e(route('user-list')); ?>">List User</a></li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Banner</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('banner-create')); ?>" class="  ">Create User Banner</a></li>
                        <li><a href="<?php echo e(route('banner-list')); ?>">List User Banner</a></li>
                        <li><a href="<?php echo e(route('vendorbanner-create')); ?>" class="  ">Create Vendor Banner</a></li>
                        <li><a href="<?php echo e(route('vendorbanner-list')); ?>">List Vendor Banner</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Coupon</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('coupon-create')); ?>" class="  ">Coupon Add</a></li>
                        <li><a href="<?php echo e(route('coupon-list')); ?>">Coupon List</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Offers</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('offers-create')); ?>" class="  ">Offer Add</a></li>
                        <li><a href="<?php echo e(route('offers-list')); ?>">Offers List</a></li>
                    </ul>
                  </li>
                  
                   <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Subscription Plan</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('plan-create')); ?>" class="  ">Plan Add</a></li>
                        <li><a href="<?php echo e(route('plan-list')); ?>">Plan List</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Notification</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('notification-create')); ?>" class="  ">Notification Create</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Booking</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('booking-list')); ?>" class="  ">Booking List</a></li>
                        
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Faq's</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('faq-list')); ?>" class="">Faq's List</a></li>
                        <li><a href="<?php echo e(route('faq-create')); ?>">Faq Add</a></li>
                    </ul>
                  </li>
                  
                   <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>CMS</span></a>
                    <ul class="nav-submenu menu-content">
                        <li><a href="<?php echo e(route('cms-list')); ?>" class="">CMS List</a></li>
                        <li><a href="<?php echo e(route('cms-create')); ?>">CMS Add</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="<?php echo e(route('rating-list')); ?>"><i data-feather="airplay"></i><span>Rating</span></a></li>


                  


                </ul>
                
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
<?php /**PATH C:\xampp\htdocs\merarooms\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>