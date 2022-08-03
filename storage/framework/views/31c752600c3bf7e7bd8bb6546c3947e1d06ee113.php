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

                   <table class="display  data-table" >
                      <thead>
                        <tr>
                            <th scope="col" width="200" style="padding-bottom:90px">Name</th>
                            <th scope="col"  width="500" style="padding-bottom:90px"><?php echo e($room_type->name); ?></th>
                        </tr>
                        <tr>
                            <th scope="col" width="200">Image</th>
                            <th scope="col"  width="500"><img style="height:100px;width:100px" src="<?php echo e(url($room_type->icon)); ?>"></th>
                        </tr>
                      </thead>
                      <tbody>

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
<script>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/room_type/room_type-show.blade.php ENDPATH**/ ?>