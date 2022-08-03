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
                    <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-ui-user"></i>Basic Details</a></li>
                 
                  </ul>
                  <div class="tab-content" id="info-tabContent">

                    <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col" width="200">Name</th>
                              <th scope="col"  width="500"><?php echo e($user->name); ?></th>
                            </tr>
                            
                             <tr>
                              <th scope="col" width="200"style="padding-bottom:50px">Profile Image</th>
                              <th><img style="width:100px;height:100px" src="<?php echo e(url($user->profile_image)); ?>"></th>
                            </tr>

                            <tr>
                              <th scope="col" width="200">E-mail</th>
                              <th scope="col"  width="500"><?php echo e($user->email); ?></th>
                            </tr>

                            <tr>
                              <th scope="col" width="200">Mobile</th>
                              <th scope="col"  width="500"><?php echo e($user->mobile); ?></th>
                            </tr>
                            
                            <tr>
                              <th scope="col" width="200">Raferal Id</th>
                              <th scope="col"  width="500"><?php echo e($user->referal_id); ?></th>
                            </tr>

                            <tr>
                              <th scope="col" width="200">Status</th>
                              <th scope="col"  width="500"><?php echo ($user->status=='1')?'<span class="badge badge-success"> Active </span>':'<span class="badge badge-danger"> INActive </span>'; ?></th>
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

 $(document).on('click','.removeBookmark', function(){

          dataID = $(this).attr("data-id");

          url = $(this).attr('data-url');

          var $this = $(this);

          buttonLoading('loading', $this);

          $.ajax({
              url: url,
              type: 'POST',
              data:{_token:'<?php echo e(csrf_token()); ?>'},
              success: function(data){

                $(".bookmarkcol"+dataID).remove();

                successMsg('Bookmark', data.msg, '');

              }
        });

});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/tourist_guide/resources/views/admin/users/user-show.blade.php ENDPATH**/ ?>