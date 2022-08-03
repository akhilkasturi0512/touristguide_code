<div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <!--<div class="logo-wrapper"><a href=""><b>Mera Room</b></a></div>-->
      <div class="name" style="display:grid">
        <img class="img-50 rounded-circle" src="<?php echo e(asset('admin/assets/images/dashboard/logo.jpg')); ?>" alt="" >
          <!--<a style="font-weight: bold;margin-left: 20px;" href="<?php echo e(url('admin/dashboard')); ?>"><?php echo e(Auth()->user()->name); ?></a>-->
      </div> 
      <!--<a class="setting-primary" href="<?php echo e(route('setting')); ?>"><i data-feather="settings"></i></a>-->

      <div class="dark-logo-wrapper"><a href=""><img class="img-fluid" src="<?php echo e(asset('admin/assets/images/dashboard/logo.jpg')); ?>" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
    </div>
    
    
   <!-- <div class="left-menu-header col">
      <ul>
        <li>
          <form class="form-inline search-form">
            <div class="search-bg"><i class="fa fa-search"></i>
              <input class="form-control-plaintext" placeholder="Search here.....">
            </div>
          </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
        </li>
      </ul>
    </div>-->
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">

        
     

        
        
        <li> <a href="<?php echo e(route('admin.dashboard')); ?>"style="color:white;"><h6 class="mt-3 f-14 f-w-600" style="margin-bottom: 10px;"><?php echo e(Auth::guard("admin")->user()->name); ?></h6></a>
              <?php
                $roles = Auth::guard('admin')->user()->roles->pluck('name');
             
              ?>
              <?php echo $roles; ?>

              </li>
        <li class="on
        hover-dropdown p-0">

          <button class="btn btn-primary-light" type="button"><a href="<?php echo e(route('admin.logout')); ?>"style="color:red;"><i data-feather="log-out"></i>Log out</a></button>
        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
<?php /**PATH C:\wamp64\www\tourist\resources\views/admin/layout/header.blade.php ENDPATH**/ ?>