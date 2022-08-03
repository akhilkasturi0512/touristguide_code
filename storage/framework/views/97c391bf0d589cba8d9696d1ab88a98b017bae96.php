<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/summernote.css')); ?>">
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
        <form enctype="multipart/form-data" class="theme-form d-flex" id="submitForm" action="<?php echo e($data['url']); ?>">
          <?php echo csrf_field(); ?>
          <div class="col-sm-12 col-xl-12">
            <div class="row">
              <div class="col-sm-12">

                <div class="card">
                  <div class="card-body row">

                      <div class="mb-3">
                        <label class="col-form-label pt-0" for="title">Institute Name</label>
                        <input class="form-control" id="name" name="name" type="text" aria-describedby="" placeholder="Enter Institute Name">
                      </div>
                      
                       <div class="mb-3">
                        <label class="col-form-label pt-0" for="image">Institute Image</label>
                        <input class="form-control" id="image" name="image" type="file" placeholder="Image">
                       </div>
                       
                        <div class="form-group col-6">
                            <label class="form-label">State *</label>
                            <select required="required" onchange="getCities()" name="state_id" id="state_id" class="form-control">
                                <option value="">Select</option>
                
                                <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">City </label>
                            <select name="city_id" onchange="getName('city_id','name')" id="city_id" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                       

                      
    
                        
                      <div class="copies-data">

                          <div class="row">
                            <div class="col-md-11" style="border: 1px solid #24695c; padding: 33px;">
                              <div class="row">
                                  
                                  <div class="mb-3 col-md-3">
                                    <label class="col-form-label pt-0" for="branch_name0">Branch Name</label>
                                    <input class="form-control" id="branch_name0" required name="branch_name[]" type="text" aria-describedby="" placeholder="Enter Branch Name">
                                  </div>
                                  
                                  
                                  <div class="mb-3 col-md-3">
                                    <label class="col-form-label pt-0" for="pincode0">Pincode </label>
                                    <input class="form-control" id="pincode0" required name="pincode[]" type="text" aria-describedby="" placeholder="Enter Pincode">
                                  </div>


                                  <div class="mb-3 col-md-3">
                                    <label class="col-form-label pt-0" for="address0">address</label>
                                    <input class="form-control" id="address0" required name="address[]" type="text" aria-describedby="" placeholder="Enter Address">
                                  </div>

                                  <div class="mb-3 col-md-3">
                                    <label class="col-form-label pt-0" for="latitude0">Latitude</label>
                                    <input class="form-control" id="latitude0" required name="latitude[]" type="text" aria-describedby="" placeholder="Enter Latitude">
                                  </div>

                                  <div class="mb-3 col-md-3">
                                    <label class="col-form-label pt-0" for="longitude0">longitude</label>
                                    <input class="form-control" id="longitude0" required name="longitude[]" type="text" aria-describedby="" placeholder="Enter Longitude">
                                  </div>

                                  
                              </div>
                            </div>

                            <div class="col-md-1" style="border: 1px solid #24695c; padding: 33px;">
                              <br />
                              <button class="btn mt-2 btn-primary " type="button" onclick="addMoreData()"> <i class="fa fa-plus"></i> </button>
                            </div>
                          </div>

                      </div>
                  </div>
                  <div class="card-footer">
                    <button   type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>
                    <!--<button class="btn btn-secondary">Cancel</button>-->
                  </div>
                </div>

              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagejs'); ?>

<script src="<?php echo e(asset('admin/assets/js/editor/summernote/summernote.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/editor/summernote/summernote.custom.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e(asset('admin/assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript">
var counter = 1;

    function getCities(){
        
        var state_id = $("#state_id option:selected").val();
        
         $.ajax({
                url: '',
                type: "GET",
                data: {state_id:state_id},
                success: function(data) {
                    var html = '';
                    
                    $.each(data.data, function(key, value){
                        
                        $("#city_id").append(` <option value="${value.id}">${value.city}</option> `);

                    });
                     
                     //$("#city_id").append(html);
                     
                     
                },
                error: function() {

                }

            });
        
    }

    function addMoreData(){




      $(".copies-data").append(`

      <div class="row copiesrow${counter}">
          <div class="col-md-11" style="border: 1px solid #24695c; padding: 33px;">
            <div class="row">

                 <div class="mb-3 col-md-3">
                    <label class="col-form-label pt-0" for="branch_name${counter}">Branch Name</label>
                    <input class="form-control" id="branch_name${counter}" required name="branch_name[]" type="text" aria-describedby="" placeholder="Enter Branch Name">
                </div>
                
                <div class="mb-3 col-md-3">
                    <label class="col-form-label pt-0" for="pincode${counter}">Pincode </label>
                    <input class="form-control" id="pincode${counter}" required name="pincode[]" type="text" aria-describedby="" placeholder="Enter Pincode">
                </div>
                <div class="mb-3 col-md-3">
                    <label class="col-form-label pt-0" for="address${counter}">address</label>
                    <input class="form-control" id="address${counter}" required name="address[]" type="text" aria-describedby="" placeholder="Enter Address">
                </div>

                <div class="mb-3 col-md-3">
                    <label class="col-form-label pt-0" for="latitude${counter}">Latitude</label>
                    <input class="form-control" id="latitude${counter}" required name="latitude[]" type="text" aria-describedby="" placeholder="Enter Latitude">
                </div>

                <div class="mb-3 col-md-3">
                    <label class="col-form-label pt-0" for="longitude${counter}">longitude</label>
                    <input class="form-control" id="longitude${counter}" required name="longitude[]" type="text" aria-describedby="" placeholder="Enter Longitude">
                </div>

               
            </div>
          </div>

          <div class="col-md-1" style="border: 1px solid #24695c; padding: 33px;">
            <br />
            <button class="btn mt-2 btn-danger " type="button" onclick="removeData(${counter})"> <i class="fa fa-trash"></i> </button>
          </div>

        </div>

      `);

      $(".tagsmulti"+counter).select2();

      counter++;

    }

    function removeData(counter){

        $(".copies-data .copiesrow"+counter).remove();
    }

    $(".tagsmulti0").select2();

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
                        var btn = '<a href="<?php echo e(route('institute-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Institute', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Institute', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Institute', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
    
    <script type="text/javascript">


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\merarooms\resources\views/admin/institute/institute-create.blade.php ENDPATH**/ ?>