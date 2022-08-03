
<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    

<div class="page-body">
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
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-xl-6">
          <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" class="theme-form" id="submitForm" action="<?php echo e($data['url']); ?>">
                <?php echo csrf_field(); ?>
              <div class="card">
                
                <div class="card-body">

                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="plan_name">Name Of Plan</label>
                      <input class="form-control" id="plan_name" name="plan_name" type="text" aria-describedby="" value="<?php echo e($post->plan_name); ?>" placeholder="Enter Name Of Plan">
                    </div>                  
                    
                    
                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="duration_of_plan">Duration Of Plan</label>
                      <input class="form-control" id="duration_of_plan" name="duration_of_plan" type="text" value="<?php echo e($post->duration_of_plan); ?>" aria-describedby="" placeholder="Enter Duration Of Plan">
                    </div>  
                    
                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="no_of_hostel">No. Of Hostel</label>
                      <input class="form-control" id="no_of_hostel" name="no_of_hostel" type="text" aria-describedby="" value="<?php echo e($post->no_of_hostel); ?>" placeholder="Enter No. Of Books">
                    </div>  
                    
                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="price">Price Of Plan</label>
                      <input class="form-control" id="price" name="price" type="text" aria-describedby="" value="<?php echo e($post->price); ?>" placeholder="Enter Price">
                    </div>                 
                
                  </div>


                <div class="card-footer">
                  <button id="submitButton"  type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Update" class="btn btn-primary">Update</button>
                    <a  href= "<?php echo e(route('plan-list')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e(asset('admin/assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                        var btn = '<a href="<?php echo e(route('plan-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Tags', data.msg, btn);
                        setTimeout(function() {
                            window.location.href = "<?php echo e(route('plan-list')); ?>";
                            }, 3000);

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Plan', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Plan', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/merarum/public_html/app/resources/views/admin/plan/plan-edit.blade.php ENDPATH**/ ?>