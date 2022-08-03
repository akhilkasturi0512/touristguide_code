<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
<style>

</style>
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
                  <!--<ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">-->
                  <!--  <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-ui-user"></i>Basic Details</a></li>-->
                  <!--</ul>-->
                  <div class="tab-content" id="info-tabContent">

                    <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>

                            <tr>

                              <th scope="col" width="200">Institute Name : </th>
                              <th scope="col"  width="500"><?php echo e($institute->name); ?></th>

                            </tr>
                          </thead>

                        </table>
                      </div>

                    </div>

                  </div>



                  <h5 class="mt-5 mb-4"> <b> Institute Branch</b> </h5>

                  <ul class="nav nav-tabs border-tab nav-primary" style="overflow: hidden;overflow-x: scroll;" id="info-tab" role="tablist">

                    <?php $__currentLoopData = $institute->institutecopies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                          <a  style="width: 200px;"  class="nav-link <?php echo e(($key==0)?'active':''); ?> " id="info-home-tab<?php echo e($item->id); ?>" data-bs-toggle="tab" href="#info-home<?php echo e($item->id); ?>" role="tab" aria-controls="info-home" aria-selected="true">
                              <i class="icofont icofont-ui-user"></i>
                              <?php echo e($item->branch_name); ?>

                          </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </ul>




                  <div class="tab-content" id="info-tabContent">

                    <?php $__currentLoopData = $institute->institutecopies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="tab-pane fade show <?php echo e(($key==0)?'active':''); ?> " id="info-home<?php echo e($item->id); ?>" role="tabpanel" aria-labelledby="info-home-tab<?php echo e($item->id); ?>">



                        <div class="table-responsive">

                          <table class="table table-hover">
                            <thead>

                              <tr>
                                  <th scope="col" width="200">  Pincode : </th>
                                  <th scope="col" width="500">  <?php echo e($item->pincode); ?></th>
                              </tr>

                              <tr>
                                <th scope="col" width="200">  Address : </th>
                                <th scope="col" width="500">  <?php echo e($item->address); ?></th>
                              </tr>

                              <tr>
                                <th scope="col" width="200">  Latitude : </th>
                                <th scope="col" width="500">  <?php echo e($item->latitude); ?></th>
                              </tr>

                              <tr>
                                <th scope="col" width="200">  Longitude : </th>
                                <th scope="col" width="500">  <?php echo e($item->longitude); ?></th>
                              </tr>

                              <tr>
                                <th scope="col" width="200">  branch_name : </th>
                                <th scope="col" width="500">  <?php echo e($item->branch_name); ?></th>
                              </tr>

                            </thead>

                          </table>

                        </div>

                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/institute/institute-show.blade.php ENDPATH**/ ?>