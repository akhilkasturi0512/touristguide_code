<header class="main-nav">
    
          <div class="sidebar-user text-center" style="padding:4px">
              <a class="setting-primary" href="<?php echo e(route('setting')); ?>">
                  
                  <i data-feather="settings"></i></a><a href="<?php echo e(route('admin.dashboard')); ?>"><img class="img-70 rounded-circle" src="<?php echo e(asset('admin/assets/images/dashboard/logo.jpg')); ?>" alt=""></a>
              <a href="<?php echo e(route('admin.dashboard')); ?>"><h6 class="mt-3 f-14 f-w-600" style="margin-bottom: 10px;"><?php echo e(Auth::guard("admin")->user()->name); ?></h6></a>
              <?php
                $roles = Auth::guard('admin')->user()->roles->pluck('name');
             
              ?>
          </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">

                <ul class="nav-menu custom-scrollbar" style="height:calc(80vh - 95px)!important">

                  <li class="sidebar-main-title"></li>
                  
                   <li class="dropdown"><a class="nav-link menu-title active" href="<?php echo e(route('admin.dashboard')); ?>"><i data-feather="box"></i><span>Dashboard</span></a>
                    
                  </li>
                  
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
                  
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Booking Master')): ?>
                      <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="box"></i><span>Booking</span></a>
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

                </ul>
               
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
<?php /**PATH C:\wamp64\www\tourist\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>