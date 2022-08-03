<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
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
                      <label class="col-form-label pt-0" for="title">Name</label>
                      <input class="form-control" id="name" name="name" type="text" aria-describedby="" placeholder="Enter Name">
                    </div>


                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="email">Email</label>
                      <input class="form-control" id="email" name="email" type="text" aria-describedby="" placeholder="Enter Email">
                    </div>
                    
                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="name">Password</label>
                      <input class="form-control" id="password" name="password" type="text" aria-describedby="" placeholder="Enter Password">
                    </div>

                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="mobile">Mobile Number</label>
                      <input class="form-control" id="mobile" name="mobile" type="text" aria-describedby="" placeholder="Enter Mobile">
                    </div>
                    
                    
                        <div class="mb-3">
                            <label class="form-label">State *</label>
                            <select required="required" onchange="getCities()" name="state_id" id="state_id" class="form-control">
                                <option value="">Select</option>
                
                                <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">City </label>
                            <select name="city_id" onchange="getName('city_id','name')" id="city_id" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>


                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="title">Status</label>
                      <select class="form-select" id="status" name="status" >
                          <option value="">Select</option>                          
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>                          
                        </select>
                    </div>
                  
                    
                    <div class="mb-3">
                      
                      <label  class="col-form-label pt-0"> Image </label>
                      
                      <div class="row">
                          <div class="col-md-10 ">
                              <input id="profile_image" type="file" class="form-control align-middle custom-file-input" name="profile_image" onchange="readURL(this, 'FileImg');">

                            </div>
                          <div class="col-md-2 ">
                          <img id="FileImg" src="<?php echo e(url('/uploads/profile/default.png')); ?>"  style="width: 71px;height: 71px">
                          </div>
                      </div>
                    
                  </div>

                  

                </div>
                <div class="card-footer">
                  <button   type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>
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
                        var btn = '<a href="<?php echo e(route('user-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create User', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create User', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create User', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
    
    <script type="text/javascript">

  var counter = 1;

    function getCities(){
        
        var state_id = $("#state_id option:selected").val();
        
         $.ajax({
                url: '<?php echo e(route('get-Cities')); ?>',
                type: "GET",
                data: {state_id:state_id},
                success: function(data) {
                    var html = '';
                    
                    $.each(data.data, function(key, value){
                        
                        $("#city_id").append(` <option value="${value.id}">${value.name}</option> `);

                    });
                     
                     //$("#city_id").append(html);
                     
                     
                },
                error: function() {

                }

            });
        
    }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/tourist_guide/resources/views/admin/users/user-create.blade.php ENDPATH**/ ?>