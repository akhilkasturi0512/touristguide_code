<?php $__env->startSection('title'); ?>
<title>Coupon Create</title>
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
            <h3>Coupon Forms</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item">coupon create </li>
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
                <form id="submitForm"  class="forms-sample" action="<?php echo e(route('coupon-store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="card">
                        <div class="card-body">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Vendor')): ?>
                            <div class="form-group">
                                    <label class="form-label">Vendor Name *</label>
                                    <select name="vendor_id" id="vendor_id"  class="form-control">
                                        <option value=""> Select </option>
                                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                            <?php endif; ?>
    
                            <div class="form-group">
                            <label for="coupon_name">Coupon Name</label>
                            <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="Enter name of the coupon">
                          </div>
    
                            <div class="form-group">
                            <label for="coupon_name">Coupon Code</label>
                            <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Enter name of the coupon code">
                          </div>
    
                            <div class="form-group">
                            <label for="coupon_image">Coupon Image</label>
                            <input type="file" name="coupon_image" id="coupon_image" class="form-control">
                          </div>
    
                            <div class="form-group">
                                <label >Begin Date</label>
                                <input type="date" class="form-control" name="begin_date" id="begin_date">
                            </div>
    
                            <div class="form-group">
                                <label >Last Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
        
                            <div class="form-group">
                                <label>Coupon Type</label>
                                <select class="form-control" name="coupon_type" id="coupon_type">
                                    <option values="">Select</option>
                                    <option value="percentage">Percentage</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>
        
                            <div class="form-group">
                                <label >Discount</label>
                                <input type="number" class="form-control" name="coupon_discount" id="coupon_discount">
                            </div>
                            <div class="form-group">
                            <label for="cart_value">Min Cart Value</label>
                            <input type="text" class="form-control" id="cart_value" name="cart_value" placeholder="Enter the min cart value">
                          </div>
    
                            <div class="form-group">
                                <label for="cart_value">Coupon Limit</label>
                                <input type="text" class="form-control" id="coupon_limit" name="coupon_limit" placeholder="Coupon Limit">
                            </div>
                            
                            <div class="form-group">
                                <label for="cart_value">Is Explore Now</label>
                                <select class="form-control" name="is_explore_now" id="is_explore_now">
                                    <option values="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                               
                            </div>
    
                            
    
                            <div class="form-group">
                            <label for="coupon_description">Coupon Description</label>
                            <textarea type="text" class="form-control" id="coupon_description" name="coupon_description" placeholder="Enter description"></textarea>
                          </div>
                            <button type="submit"  id="submitButton"  class="btn btn-primary mr-2 float-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Submit">Submit</button>
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

<script src="<?php echo e(asset('admin/assets/plugins/wysiwyag/jquery.richtext.js')); ?>"></script>
<script type="text/javascript">

    
        $(document).ready(function(){
        	
            $(".des_price").hide();
            
            $(".img").on('change', function(){
                $(".des_price").show();
                
            });
        });

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
                        var btn = '<a href="<?php echo e(route('coupon-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Coupon', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Coupon', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Coupon', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/merarum/public_html/app/resources/views/admin/coupon/coupon-create.blade.php ENDPATH**/ ?>