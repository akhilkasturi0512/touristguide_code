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
                    <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true">Faq's Details</a></li>
                  </ul>
                  <div class="tab-content" id="info-tabContent">

                  <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th scope="col" width="200">Title</th>
                                          <th scope="col"  width="500"><?php echo e($faq->title); ?></th>
                                        </tr>

                                       <tr>
                                          <th scope="col" width="200">Description</th>
                                          <th scope="col"  width="500"><?php echo e($faq->description); ?></th>
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
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/faq/faq-show.blade.php ENDPATH**/ ?>