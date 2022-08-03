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
                                      <th scope="col" width="200">Booking Date</th>
                                      <th scope="col"  width="500"><?php echo e(date('d M Y',strtotime($booking->booking_date))); ?></th>
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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/tourist_guide/resources/views/admin/booking/booking-show.blade.php ENDPATH**/ ?>