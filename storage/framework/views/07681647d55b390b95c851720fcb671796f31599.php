<?php $__env->startSection('title'); ?>
<title>Offer Create</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrum'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3>Offer Forms</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item">Offer create </li>
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
               <form id="submitForm"  method="post" enctype="multipart/form-data" action="<?php echo e(route('offers-update', $post->id)); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
    					<div class="form-group col-sm-6">
    						<label class="form-label">Title *</label>
    						<input type="text" class="form-control" name="title" id="title" value="<?php echo e($post->title); ?>">
                        </div>
    
    					
                        
    					<div class="form-group col-sm-6">
    						<label class="form-label">Banner</label>
    						<input type="file" class="form-control" name="banner" id="banner">
    						<?php if($post->banner): ?>
    							<img src="<?php echo e(url($post->banner)); ?>" style="width:100px margin-top:15px; height:100px">
    						<?php endif; ?>
                        </div>
    
                        
                       
                        <div class="form-group col-sm-6">
    						<label class="form-label">Status</label>
    						<select name="status" id="status" class="form-control custom-select">
    							<option <?php if($post->status == 1): ?> selected <?php endif; ?> value="1">Active</option>
    							<option <?php if($post->status == 0): ?> selected <?php endif; ?> value="0">InActive</option>
    						</select>
                        </div>
    
                    </div>
                    <div class="card-footer"></div>
                        <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Update">Update</button>
    				    <a  href= "<?php echo e(route('offers-list')); ?>" class="btn btn-secondary">Cancel</a>
    				</div>
            `   </form>
			</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<script src="<?php echo e(asset('admin/assets/plugins/wysiwyag/jquery.richtext.js')); ?>"></script>
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
                        var btn = '';
                        successMsg('Update Offer Banner', data.msg, btn);
						window.location.reload();
                        //$('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Edit Offer Banner', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Update offer banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/merarum/public_html/app/resources/views/admin/offers/offers-edit.blade.php ENDPATH**/ ?>