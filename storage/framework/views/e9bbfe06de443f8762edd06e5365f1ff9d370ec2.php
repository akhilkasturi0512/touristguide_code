

<?php $__env->startSection('title'); ?>
    <title>Dashboard</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>
<style>
    .vendor_type {
    display: flex;
    justify-content:space-between;
}

.name {
    font-weight: 600;
    color: #000;
    font-size: 12px;
    padding:3px;
}

.card-body.vendor {
    padding: 16px 5px !important;
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
     <!-- <div class="page-header">
        <div class="row">
          <div class="col-sm-6">
            <h3>Dashboard</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item">dashboard</li>
            </ol>
          </div>
        </div>
      </div>-->
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
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
                
                
                
                     <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <div class="card">
                    <div class="card-body vendor"style="padding:20px;border: 2px solid black; border-radius: 2%;" >
                        <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                                <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/owner.png')); ?>">
                            </div>
                            <div style="display:block;align-items:right">
                                <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalhostelowner); ?></h2>
                                <h4 class="mb-1" style="font-weight: 600;font-size: 16px;color:black;">Vendors/Owners</h4>
                            </div>
                            
                        </div>
                        <div class="vendor_type">
                                    <div class="type_name">
                                        <a href="<?php echo e(route('hostelOwner-list',1)); ?>">
                                            <p class="name">Girls Hostel</p>
                                        </a>
                                    </div>
                                    
                                     <div class="type_name">
                                         <a href="<?php echo e(route('hostelOwner-list',2)); ?>">
                                              <p class="name">Boys Hostel</p>
                                         </a>
                                    </div>
                                    <div class="type_name">
                                        <a href="<?php echo e(route('hostelOwner-list',4)); ?>">
                                            <p class="name">Girls Pg</p>
                                        </a>
                                    </div>
                                    
                                     <div class="type_name">
                                         <a href="<?php echo e(route('hostelOwner-list',3)); ?>">
                                              <p class="name">Boys Pg</p>
                                         </a>
                                    </div>
                                    
                                </div>
                        <!--<p>Total Orders</p> -->
                     </div>
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
                        <!--<p>Total Orders</p> -->
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
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               
                
                    <div class="col-sm-12 col-lg-3 col-md-3 ">
                  <div class="card">
                     <a href="<?php echo e(route('hostelOwner-create')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-between;">
                            <div style="display:flex;align-items:right">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/owner.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                         <img style="height:30px;width:30px"src="<?php echo e(asset('admin/assets/images/add.png')); ?>">
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Vendors/Owners</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
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
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
                
                       <div class="col-sm-12 col-lg-3 col-md-3 ">
                  <div class="card">
                     <a href="<?php echo e(route('institute-create')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/sp.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                         <img style="height:30px;width:30px"src="<?php echo e(asset('admin/assets/images/add.png')); ?>">
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Institute</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
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
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               
                  <div class="col-sm-12 col-lg-3 col-md-3 ">
                  <div class="card">
                     <a href="<?php echo e(route('room_type-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:30px;width:30px" src="<?php echo e(asset('admin/assets/images/rt.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 12px"><?php echo e($totalRoomtype); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Room <br>Types</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               
               
               
                      <div class="col-sm-12 col-lg-3 col-md-3 ">
                  <div class="card">
                     <a href="<?php echo e(route('aminities-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:30px;width:30px" src="<?php echo e(asset('admin/assets/images/am.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 12px"><?php echo e($totalaminities); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Aminities</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               
               
                   <div class="col-sm-12 col-lg-3 col-md-3 ">
                  <div class="card">
                     <a href="<?php echo e(route('coupon-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:30px;width:30px" src="<?php echo e(asset('admin/assets/images/cp.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 12px"><?php echo e($totalcoupon); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Coupons</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               
                   <div class="col-sm-12 col-lg-2 col-md-2 ">
                  <div class="card">
                     <a href="<?php echo e(route('offers-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:30px;width:30px" src="<?php echo e(asset('admin/assets/images/ofr.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 12px"><?php echo e($totaloffers); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Offers</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               
                
            
                 <div class="col-sm-12 col-lg-2 col-md-2 ">
                  <div class="card">
                     <a href="<?php echo e(route('institute-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:30px;width:30px" src="<?php echo e(asset('admin/assets/images/in.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 12px"><?php echo e($totalinstitute); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Institutes</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               
               
                     <div class="col-sm-12 col-lg-2 col-md-2 ">
                  <div class="card">
                     <a href="<?php echo e(route('cities-list')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:30px;width:30px" src="<?php echo e(asset('admin/assets/images/cities.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                           <h2 class="mb-1 number-font" style="padding-left: 12px"><?php echo e($totalcities); ?></h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:black;">Cities</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
                     </div></a>
                  </div>
               </div>
               
                      <div class="col-sm-12 col-lg-4 col-md-4 ">
                  <div class="card"style="background-color: black;">
                     <a href="<?php echo e(route('role-create')); ?>"><div class="card-body"style="border: 2px solid black; border-radius: 2%;" >
                <div style="display:flex;align-items:center;justify-content: space-evenly;">
                            <div style="display:flex;align-items:right">
                           <img style="height:55px;width:55px" src="<?php echo e(asset('admin/assets/images/sub.png')); ?>">
                           </div>
                            <div style="display:block;align-items:right">
                            <h2 class="mb-1" style="font-weight: 600;font-size: 17px;color:white;">Sub-Admins</h2>
                            <h4 class="mb-1" style="font-weight: 600;font-size: 12px;color:#00CEFF;">Role/Permissions</h4>
                        </div>
                        </div>
                        <!--<p>Total Orders</p> -->
                     </div></a>
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
</div>


<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/travelguide/resources/views/admin/welcome.blade.php ENDPATH**/ ?>