<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="page-body">



  <div class="container-fluid">
      <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
          <div class="card">

                <div class="card-header pb-0">
                    <h5><?php echo e($data['title']); ?></h5>
                </div>
                
                <div class="card-body">

                  <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-ui-hostelOwner"></i>Booking Details</a></li>
                  </ul>
                  
                  <div class="tab-content" id="info-tabContent">

                    <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                      <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                                    <tr>
                                      <th scope="col" width="200">Booking ID</th>
                                      <th scope="col"  width="500"><?php echo e(($booking->unique_id)?$booking->unique_id:''); ?></th>
                                    </tr>
                                    
                                    <tr>
                                      <th scope="col" width="200">Payment Type</th>
                                      <th scope="col"  width="500"><?php echo e(($booking->payment_type)?$booking->payment_type:''); ?></th>
                                    </tr>
                                    
                                    <?php if($booking->payment_type=='BookOnline'): ?>
                                    <tr>
                                      <th scope="col" width="200">Transaction ID</th>
                                      <th scope="col"  width="500"><?php echo e(($booking->transaction_id)?$booking->transaction_id:''); ?></th>
                                    </tr>
                                    <?php endif; ?>
                                  
                                    
                                    
                                    <tr>
                                      <th scope="col" width="200">Booking Date</th>
                                      <th scope="col"  width="500"><?php echo e(date('d M Y',strtotime($booking->booking_date))); ?></th>
                                    </tr>
                                    
                                    <tr>
                                      <th scope="col" width="200">Payment Status</th>
                                      
                                      <th scope="col"  width="500"> <span class="badge badge-<?php echo e(($booking->payment_status=='complete')?'success':'warning'); ?>"> <?php echo e($booking->payment_status); ?></span></th>
                                    </tr>                                 
                                    
                                    <tr>
                                      <th scope="col" width="200">Booking Status</th>
                                      <th scope="col"  width="500"><?php echo e($booking->status); ?></th>
                                    </tr>

                            </thead>
                            
                            
                        </table>

                      </div>

                    </div>
                  </div>


                <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="info-owner-tab" data-bs-toggle="tab" href="#info-owner" role="tab" aria-controls="info-owner" aria-selected="true"><i class="icofont icofont-ui-hostelOwner"></i>Owner Details</a></li>
                </ul>
                  
                <div class="tab-content" id="info-tabContent">

                    <div class="tab-pane fade show active" id="info-owner" role="tabpanel" aria-labelledby="info-home-tab">

                      <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                                     <tr>
                                      <th scope="col" width="200"><i class="text-success fa fa-user"></i> Name</th>
                                      <th scope="col"  width="500"><?php echo e(($booking->hostelowner)?$booking->hostelowner->name:''); ?></th>
                                    </tr>
                                    
                                    <tr>
                                      <th scope="col" width="200"><i class="text-success fa fa-phone"></i> Mobile </th>
                                      <th scope="col"  width="500"><?php echo e(($booking->hostelowner)?$booking->hostelowner->mobile:''); ?></th>
                                    </tr>
                                    
                                     <tr>
                                      <th scope="col" width="200"><i class="text-success fa fa-envelope"></i> E-mail </th>
                                      <th scope="col"  width="500"><?php echo e(($booking->hostelowner)?$booking->hostelowner->email:''); ?></th>
                                    </tr>
                                    
                                    <tr>
                                      <th scope="col" width="200"><i class="text-success fa fa-envelope"></i> Image </th>
                                      <th scope="col"  width="500"><?php if($booking->hostelowner): ?> <img style="width:100px" src="<?php echo e(asset($booking->hostelowner->profile_image)); ?>"  <?php endif; ?></th>
                                    </tr>
                                    
                                    
                            
                            </thead>
                            
                            
                        </table>

                      </div>

                    </div>
                
                </div>
                
                
                
                
                <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="info-owner-tab" data-bs-toggle="tab" href="#info-owner" role="tab" aria-controls="info-owner" aria-selected="true"><i class="icofont icofont-ui-hostelOwner"></i>Room Details</a></li>
                </ul>
                  
                <div class="tab-content" id="info-tabContent">

                    <div class="tab-pane fade show active" id="info-owner" role="tabpanel" aria-labelledby="info-home-tab">

                      <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                                 <tr>
                                  <th scope="col" width="200"><i class="text-success fa fa-home"></i> Room Type </th>
                                  <th scope="col"  width="500">
                                      
                                      <?php if($booking->room_details): ?>
                                          
                                          <?php if($booking->room_details->room_type): ?>
                                            <?php echo e($booking->room_details->room_type->name); ?>

                                          <?php else: ?>
                                        
                                            <?php echo e('N/A'); ?>    
                                        
                                          <?php endif; ?>
                                        
                                        <?php else: ?>
                                        
                                        <?php echo e('N/A'); ?>

                                      <?php endif; ?>
                                      
                                  </th>
                                </tr>
                                
                                <tr>
                                  <th scope="col" width="200"><i class="text-success fa fa-inr"></i> Price </th>
                                  <th scope="col"  width="500">
                                      
                                       <?php if($booking->room_details): ?>
                                         <i class="text-success fa fa-inr"></i> <?php echo e(number_format($booking->room_details->price)); ?>

                                        <?php else: ?>
                                        <?php echo e('N/A'); ?>

                                      <?php endif; ?>
                                      
                                  </th>
                                </tr>
                                
                                 
                            </thead>
                            
                            
                        </table>

                      </div>

                    </div>
                
                </div>
                  
                </div>


          </div>
        </div>

      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>


<script>


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\merarooms\resources\views/admin/booking/booking-show.blade.php ENDPATH**/ ?>