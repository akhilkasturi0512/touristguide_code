<?php $__env->startSection('title'); ?>
<title>Offer Create</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrum'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3>Offer</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item">offer create </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-xl-12">
          <div class="row">
            <div class="col-sm-12">
                <form id="submitForm"  method="post" enctype="multipart/form-data" action="<?php echo e(route('offers-store')); ?>">

                            <?php echo e(csrf_field()); ?>


                            <div class="row">

                                <div class="form-group col-sm-6">

                                    <label class="form-label">Title *</label>

                                    <input type="text" class="form-control" name="title" id="title">

                                </div>

                                <!--<div class="form-group col-sm-6">-->

                                <!--<label class="form-label">Link *</label>-->

                                <!--<input type="url" class="form-control" name="link" id="link">-->

                                <!--</div>-->

                       
                                
                                  <div class="form-group col-sm-6">

                                    <label class="form-label"> Banner *</label>

                                    <input type="file" class="form-control" name="banner" id="banner">

                                </div>


                                

                                        



                                        <div class="form-group col-sm-6">

                                            <label class="form-label">Status</label>

                                            <select name="status" id="status" class="form-control custom-select">

                                                <option value="1">Active</option>

                                                <option value="0">InActive</option>

                                            </select>

                                        </div>

                                    </div>



                                    <div class="card-footer"></div>

                                    <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Create">Create</button>


									
                                </div>
                                
                            </form>
		    </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<script type="text/javascript">
        $(function () {

           $('#submitForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
                        var btn = '<a href="<?php echo e(route('offers-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create offer', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create offer', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create offer', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\merarooms\resources\views/admin/offers/offers-create.blade.php ENDPATH**/ ?>