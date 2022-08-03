

<?php $__env->startSection('title'); ?>
    <title>Dashboard</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-body">
  <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-sm-6">
            <h3>Dashboard</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item">dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

<div class="card-body">
<div class="app-content">
   <div class="side-app">
      <!-- ROW-2 OPEN -->
      <div class="row">

         <div class=" col-md-12 col-lg-12 col-xl-12">
            <div class="row">
               <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <div class="card">
                     <a href="<?php echo e(route('business_cat-list')); ?>"><div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Business Categories</h4>
                        <div style="display:flex;align-items:center">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/Business.jpg')); ?>">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalBusinesscat); ?></h2>
                        </div>
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <a href="<?php echo e(route('hostelOwner-list')); ?>"> <div class="card">
                     <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Hostel Owners</h4>
                        <div style="display:flex;align-items:center">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/hostelowner.jpg')); ?>">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalhostelowner); ?></h2>
                        </div>
                     </div>
                  </div></a>
               </div>
               
               <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <a href="<?php echo e(route('institute-list')); ?>"> <div class="card">
                     <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Institutes</h4>
                        <div style="display:flex;align-items:center">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/institute.jpg')); ?>">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalinstitute); ?></h2>
                        </div>
                     </div>
                  </div></a>
               </div>
               <div class="col-sm-12 col-lg-4 col-md-4 ">
                   <a href="<?php echo e(route('aminities-list')); ?>"><div class="card">
                     <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Amanities</h4>
                        <div style="display:flex;align-items:center">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/amanities.jpg')); ?>">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalaminities); ?></h2>
                        </div>
                     </div>
                  </div></a>
               </div>
                
               <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <div class="card"> <a href="<?php echo e(route('user-list')); ?>">
                     <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Users</h4>
                        <div style="display:flex;align-items:center">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/user.jpg')); ?>">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalusers); ?></h2>
                        </div>
                     </div>
                  </div></a>
               </div>
               <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <a href="<?php echo e(route('plan-list')); ?>"> <div class="card">
                     <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Subscription Plans</h4>
                        <div style="display:flex;align-items:center">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/subscription.jpg')); ?>">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalplan); ?></h2>
                        </div>
                     </div>
                  </div></a>
               </div>
               <div class="col-sm-12 col-lg-4 col-md-4 ">
                   <a href="<?php echo e(route('offers-list')); ?>"><div class="card">
                     <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Offers</h4>
                        <div style="display:flex;align-items:center">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/offers.jpg')); ?>">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totaloffers); ?></h2>
                        </div>
                     </div>
                  </div></a>
               </div>
               <div class="col-sm-12 col-lg-4 col-md-4 ">
                   <a href="<?php echo e(route('coupon-list')); ?>"><div class="card">
                     <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Coupon</h4>
                        <div style="display:flex;align-items:center">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/coupon.jpg')); ?>">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalcoupon); ?></h2>
                        </div>
                     </div>
                  </div></a>
               </div>

               <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('coupon-list')); ?>">
                        <div class="card">
                            <div class="card-body" >
                                <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Bookings</h4>
                                <div style="display:flex;align-items:center">
                                <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/booking.jpg')); ?>">
                                <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalbooking); ?></h2>
                                </div>
                            </div>
                        </div>
                    </a>
               </div>

               <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('coupon-list')); ?>">
                        <div class="card">
                            <div class="card-body" >
                                <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Online Bookings</h4>
                                <div style="display:flex;align-items:center">
                                <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/online.jpg')); ?>">
                                <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($total_online_booking); ?></h2>
                                </div>
                            </div>
                        </div>
                    </a>
               </div>

               <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('coupon-list')); ?>">
                        <div class="card">
                            <div class="card-body" >
                                <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Offline Bookings</h4>
                                <div style="display:flex;align-items:center">
                                <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/offline.jpg')); ?>">
                                <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($total_offline_booking); ?></h2>
                                </div>
                            </div>
                        </div>
                    </a>
               </div>

            </div>
            </div>
         </div>
      </div>
   </div>
</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\merarooms\resources\views/admin/welcome.blade.php ENDPATH**/ ?>