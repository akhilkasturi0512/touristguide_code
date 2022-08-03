<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/datatables.css')); ?>">
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
              <div class="card-header">

                <div class="container-fluid">
                    <div class="page-header">
                      <div class="row">
                        <div class="col-sm-6">
                          <h3><?php echo e($data['title']); ?></h3>
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                            <li class="breadcrumb-item"><?php echo e($data['title']); ?> </li>
                          </ol>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>
              <div class="card-body">

                <div class="table-responsive">

                    <table class="display table data-table" >
                        <thead>
                          <tr>
                            <th >ID</th>
                            <th>Business Category</th>
                            <th>Owner Name</th>
                            <th>Property Name</th>
                            <th>Owner Mobile</th>
                            <th>User Name</th>
                            <th>User Mobile</th>
                            <th>Created At</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                            
                            <?php $__currentLoopData = $recently; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($vals->id); ?></th>
                                <th><?php echo e($vals->business_cat_name); ?></th>
                                <th><?php echo e($vals->vendor_name); ?></th>
                                <th><?php echo e($vals->property_name); ?></th>
                                <th><?php echo e($vals->vendor_mobile); ?></th>
                                <th><?php echo e($vals->user_name); ?></th>
                                <th><?php echo e($vals->user_mobile); ?></th>
                                 <th><?php echo e(date('d M Y  h:i:s A',strtotime($vals->created_at))); ?></th>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                          
                        </tbody>
                        
                      </table>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
<script src="<?php echo e(asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>


    <script type="text/javascript">


            var table = $('.data-table').DataTable();

       

		

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/service/recently-view.blade.php ENDPATH**/ ?>