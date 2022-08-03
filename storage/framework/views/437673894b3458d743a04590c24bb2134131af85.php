<header class="main-nav">
    
          <div class="sidebar-user text-center" style="padding:4px">
              <a class="setting-primary" href="<?php echo e(route('setting')); ?>">
                  
                  <i data-feather="settings"></i></a><a href="<?php echo e(route('admin.dashboard')); ?>"><img class="img-70 rounded-circle" src="<?php echo e(asset('admin/assets/images/dashboard/logo.jpg')); ?>" alt=""></a>
            <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="<?php echo e(route('admin.login')); ?>">
              <a href="<?php echo e(route('admin.dashboard')); ?>"><h6 class="mt-3 f-14 f-w-600" style="margin-bottom: 10px;"><?php echo e(Auth::guard("admin")->user()->name); ?></h6></a>
              <?php
                $roles = Auth::guard('admin')->user()->roles->pluck('name');
             
              ?>
            <!--<?php echo $roles; ?>-->
            <!--<p class="mb-0 font-roboto"><?php echo e(Auth::guard("admin")->user()->name); ?></p>-->
          
            
          </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">

                <ul class="nav-menu custom-scrollbar" style="height:calc(100vh - 150px)!important">

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

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Amenities Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Amenities</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Amenities Create')): ?>
                        <li><a href="<?php echo e(route('aminities-create')); ?>" class="  ">Create Amenities</a></li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Amenities List')): ?>                        
                        <li><a href="<?php echo e(route('aminities-list')); ?>">List Amenities</a></li>
                        <?php endif; ?>
                    </ul>
                  </li>
                <?php endif; ?>
                  
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Cities Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Cities</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Cities Create')): ?>
                            <li><a href="<?php echo e(route('cities-create')); ?>" class="  ">Create Cities</a></li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Cities List')): ?>
                        <li><a href="<?php echo e(route('cities-list')); ?>">List Cities</a></li>
                       <?php endif; ?>
                    </ul>
                  </li>
                   <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Role Master')): ?>
                    <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Role & Permission</span></a>
                        <ul class="nav-submenu menu-content">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Role Create')): ?>
                                <li><a href="<?php echo e(route('role-create')); ?>" class="  ">Create Role</a></li>
                            <?php endif; ?>
                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Role List')): ?>                            
                            <li><a href="<?php echo e(route('role-list')); ?>">List Role</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('RoomType Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Room Type</span></a>
                    <ul class="nav-submenu menu-content">
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('RoomType Create')): ?>
                            <li><a href="<?php echo e(route('room_type-create')); ?>" class="  ">Create Room Type</a></li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('RoomType List')): ?>
                        <li><a href="<?php echo e(route('room_type-list')); ?>">Room Type List</a></li>
                        <?php endif; ?>
                    </ul>
                  </li>
                <?php endif; ?>
                  
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Banner Type</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
                        <li><a href="<?php echo e(route('banner_type-create')); ?>" class="  ">Create Banner Type</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                        <li><a href="<?php echo e(route('banner_type-list')); ?>">Banner Type List</a></li>
                        <?php endif; ?>
                    </ul>
                  </li>
                   <?php endif; ?>
                   
                   
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Vendor Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Vendor</span></a>
                    <ul class="nav-submenu menu-content">
                        
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Vendor Create')): ?>
                      <li><a href="<?php echo e(route('hostelOwner-create')); ?>" class="  ">Create Vendor</a></li>    
                      <?php endif; ?>

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Vendor List')): ?>
                       <li><a href="<?php echo e(route('hostelOwner-list')); ?>">All</a></li>
                            <?php 
                                $business = DB::table('business_category')->get();
                            ?>
                            <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('hostelOwner-list',$vals->id)); ?>"><?php echo e($vals->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                        
                    </ul>
                  </li>
                <?php endif; ?>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Institute Master')): ?>
                 <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Institute</span></a>
                    <ul class="nav-submenu menu-content">
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Institute Create')): ?>
                        <li><a href="<?php echo e(route('institute-create')); ?>" class="">Create Institute</a></li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Institute List')): ?>
                        <li><a href="<?php echo e(route('institute-list')); ?>">List Institute</a></li>
                        <?php endif; ?>
                    </ul>
                  </li>
                <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Property Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Service Property</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Property Create')): ?>
                        <li><a href="<?php echo e(route('service_property-create')); ?>" class="">Create Service Property</a></li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Property List')): ?>
                        <li><a href="<?php echo e(route('service_property-list')); ?>">List Service Property</a></li>
                        <?php endif; ?>
                         
                    </ul>
                  </li>
                <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Admin Users</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin Create')): ?>
                            <li><a href="<?php echo e(route('admin-create')); ?>" class="  ">Create Admin</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin List')): ?>
                        <li><a href="<?php echo e(route('admin-list')); ?>">List Admin</a></li>
                        <?php endif; ?>
                    </ul>
                  </li>
                <?php endif; ?>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>User</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User Create')): ?>
                            <li><a href="<?php echo e(route('user-create')); ?>" class="  ">Create User</a></li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User List')): ?>
                        <li><a href="<?php echo e(route('user-list')); ?>">List User</a></li>
                        <?php endif; ?>
                        
                    </ul>
                  </li>
                <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Banner</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
                        <li><a href="<?php echo e(route('banner-create')); ?>" class="  ">Create User Banner</a></li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                        <li><a href="<?php echo e(route('banner-list')); ?>">List User Banner</a></li>
                        <?php endif; ?>
                         
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
                        <li><a href="<?php echo e(route('vendorbanner-create')); ?>" class="  ">Create Vendor Banner</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                        <li><a href="<?php echo e(route('vendorbanner-list')); ?>">List Vendor Banner</a></li>
                        <?php endif; ?>
                        
                    </ul>
                  </li>
                <?php endif; ?>
                   
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Coupon Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Coupon</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Coupon Create')): ?>
                        <li><a href="<?php echo e(route('coupon-create')); ?>" class="">Coupon Add</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Coupon List')): ?>
                        <li><a href="<?php echo e(route('coupon-list')); ?>">Coupon List</a></li>
                        <?php endif; ?>
                        
                    </ul>
                  </li>
                <?php endif; ?>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Offers Master')): ?>
                  <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Offers</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Offers Create')): ?>
                            <li><a href="<?php echo e(route('offers-create')); ?>" class="  ">Offers Add</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Offers List')): ?>
                        <li><a href="<?php echo e(route('offers-list')); ?>">Offers List</a></li>
                        <?php endif; ?>
                        
                    </ul>
                  </li>
                <?php endif; ?>
                  
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Plan Master')): ?>
                    <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Subscription Plan</span></a>
                        <ul class="nav-submenu menu-content">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Plan Create')): ?>
                                <li><a href="<?php echo e(route('plan-create')); ?>" class="  ">Plan Add</a></li>
                            <?php endif; ?>
                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Plan List')): ?>                            
                            <li><a href="<?php echo e(route('plan-list')); ?>">Plan List</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                
                   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Notifications Master')): ?>
                      <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Notification</span></a>
                        <ul class="nav-submenu menu-content">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Notifications Create')): ?>
                                <li><a href="<?php echo e(route('notification-create')); ?>" class="  ">Notification Create</a></li>
                            <?php endif; ?>
                        </ul>
                      </li>
                   <?php endif; ?>
                   
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking Master')): ?>
                      <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Booking Online</span></a>
                        <ul class="nav-submenu menu-content">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking List')): ?>
                                <li><a href="<?php echo e(route('booking-list','pending')); ?>" class="  ">Pending</a></li>
                            <?php endif; ?>
                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking List')): ?>
                                <li><a href="<?php echo e(route('booking-list','accepted')); ?>" class="  ">Accepted</a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking List')): ?>
                                <li><a href="<?php echo e(route('booking-list','rejected')); ?>" class="  ">Cancelled</a></li>
                            <?php endif; ?>

                        </ul>
                        
                      </li>
                    <?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking Master')): ?>
                      <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Booking Offline</span></a>
                        <ul class="nav-submenu menu-content">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking List')): ?>
                                <li><a href="<?php echo e(route('bookingoffline-list','pending')); ?>" class="  ">Pending</a></li>
                            <?php endif; ?>
                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking List')): ?>
                                <li><a href="<?php echo e(route('bookingoffline-list','accepted')); ?>" class="  ">Accepted</a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking List')): ?>
                                <li><a href="<?php echo e(route('bookingoffline-list','rejected')); ?>" class="  ">Cancelled</a></li>
                            <?php endif; ?>

                        </ul>
                        
                      </li>
                    <?php endif; ?>
                  
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Master')): ?>
                      <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Faq's</span></a>
                        <ul class="nav-submenu menu-content">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                                <li><a href="<?php echo e(route('faq-list')); ?>" class="">Faq's List</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
                            <li><a href="<?php echo e(route('faq-create')); ?>">Faq Add</a></li>
                            <?php endif; ?>
                        </ul>
                      </li>
                    <?php endif; ?>
                  
                   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Master')): ?>
                   <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>CMS</span></a>
                    <ul class="nav-submenu menu-content">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                        <li><a href="<?php echo e(route('cms-list')); ?>" class="">CMS List</a></li>
                         <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
                        <li><a href="<?php echo e(route('cms-create')); ?>">CMS Add</a></li>
                         <?php endif; ?>
                    </ul>
                  </li>
                  <?php endif; ?>
                   <li class="dropdown"><a class="nav-link menu-title active" href="<?php echo e(route('setting-edit',1)); ?>"><i data-feather="box"></i><span>Setting</span></a>
                  
                  <li class="dropdown"><a class="nav-link menu-title active" href="<?php echo e(route('rating-list')); ?>"><i data-feather="airplay"></i><span>Rating</span></a></li>


               

                </ul>
               
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
<?php /**PATH /home/merarum/public_html/app/resources/views/admin/layout/sidebar.blade.php ENDPATH**/ ?>