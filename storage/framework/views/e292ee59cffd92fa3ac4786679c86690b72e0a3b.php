

<?php $__env->startSection('title'); ?>
    <title>Dashboard</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>
<style>


.name {
    font-weight: 600;
    color: #000;
    font-size: 12px;
    padding:3px;
}


.type_name {
    border: 1px solid #000;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-body">
  <div class="container-fluid">
    </div>

<div class="card-body">
<div class="app-content">
   <div class="side-app">
      <div class="row">

         <div class=" col-md-12 col-lg-12 col-xl-12">
            <div class="row">
                
                
                   <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <div class="card">
                     <a href="<?php echo e(route('service_property-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/20211217_135700 (1)@1X.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalproperty); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 16px;color:black;">Properties</h4>
                        </div>
                        </div>
                     </div></a>
                  </div>
               </div>
                
                
            
               
               
               
               
                       <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <div class="card">
                     <a href="<?php echo e(route('user-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/users.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalusers); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 16px;color:black;">Total Users</h4>
                        </div>
                        </div>
                     </div></a>
                  </div>
               </div>
                
                
                    <div class="col-sm-12 col-lg-3 col-md-3 ">
                  <div class="card">
                     <a href="<?php echo e(route('service_property-create')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-between;">
                            <div style="display:flex;align-items:right">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/sp.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                         <img style="height:30px;width:30px"src="<?php echo e(asset('admin/assets/images/add.png')); ?>">
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Service Property</h4>
                        </div>
                        </div>
                     </div></a>
                  </div>
               </div>
               
                
               
                    <div class="col-sm-12 col-lg-3 col-md-3 ">
                  <div class="card">
                     <a href="<?php echo e(route('user-create')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/users.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                         <img style="height:30px;width:30px"src="<?php echo e(asset('admin/assets/images/add.png')); ?>">
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Users</h4>
                        </div>
                        </div>
                     </div></a>
                  </div>
               </div>
                
                
                
              
                
                
                  <div class="col-sm-12 col-lg-3 col-md-3 ">
                  <div class="card">
                     <a href="<?php echo e(route('business_cat-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:30px;width:30px" src="<?php echo e(asset('admin/assets/images/bc.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 12px"><?php echo e($totalBusinesscat); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Business <br> Categories</h4>
                        </div>
                        </div>
                     </div></a>
                  </div>
               </div>
               
              

               <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('booking-list')); ?>">
                        <div class="card">
                            <div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                                <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Bookings</h4>
                                <div style="display:flex;align-items:center">
                                <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/booking.jpg')); ?>">
                                <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalbooking); ?></h2>
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



<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\tourist\resources\views/admin/welcome.blade.php ENDPATH**/ ?>