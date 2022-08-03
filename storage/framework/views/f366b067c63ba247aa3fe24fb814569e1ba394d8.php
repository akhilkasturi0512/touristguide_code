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

                      <div class="mb-3 ">
                        <label class="col-form-label pt-0" for="title">Name</label>
                        <input class="form-control" id="name" name="name"  value="<?php echo e($post->name); ?>"  type="text" aria-describedby="" placeholder="Enter Name">
                      </div>
                      
                       <div class="mb-3">
                        <label class="col-form-label pt-0" for="image">Institute Image</label>
                        <input class="form-control" id="image" name="image" type="file" placeholder="Image">
                       </div>
                       
                       
                        <div class="form-group ">
                            <label class="form-label">State *</label>
                            <select name="state_id"  id="state_id"    onchange="getCities('state_id','city_id')"  class=" form-control state_id">
                               <option value="">Select State</option>
                                <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($post->state == $state->id ? 'selected' : ''); ?>  value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                         
                        </div>
                        
                        
    
                        <div class="form-group">
                           
                            <label class="form-label">City *</label>
                            <select name="city_id" id="city_id" class=" form-control city_id">
                            <option value="">Select City</option>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(($city->id==$post->city)?'selected':''); ?>  value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                           
                        </div>
                        


                      <div class="copies-data">

                          <?php $__currentLoopData = $post->institutecopies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <div class="row copiesrow<?php echo e($key+1); ?>">
                            <div class="col-md-11" style="border: 1px solid #24695c; padding: 33px;">
                                <div class="row">
                                    
                                     <div class="mb-3 col-md-3">
                                      <label class="col-form-label pt-0" for="branch_name0">Branch Name</label>
                                      <input class="form-control" id="branch_name<?php echo e($key); ?>" required name="branch_name[]"   value="<?php echo e($item->branch_name); ?>"  type="text" aria-describedby="" placeholder="Enter Branch Name">
                                    </div>
                                    
                                    <div class="mb-3 col-md-3">
                                      <label class="col-form-label pt-0" for="pincode0">Pincode </label>
                                      <input class="form-control" id="pincode<?php echo e($key); ?>" required name="pincode[]" value="<?php echo e($item->pincode); ?>" type="text" aria-describedby="" placeholder="Enter Pincode">
                                    </div>


                                    <div class="mb-3 col-md-3">
                                      <label class="col-form-label pt-0" for="address0">address</label>
                                      <input class="form-control" id="address<?php echo e($key); ?>" required name="address[]"  value="<?php echo e($item->address); ?>" type="text" aria-describedby="" placeholder="Enter Address">
                                    </div>

                                    <div class="mb-3 col-md-3">
                                      <label class="col-form-label pt-0" for="latitude0">latitude</label>
                                      <input class="form-control" id="latitude<?php echo e($key); ?>" required name="latitude[]"  value="<?php echo e($item->latitude); ?>" type="text" aria-describedby="" placeholder="Enter latitude">
                                    </div>

                                    <div class="mb-3 col-md-3">
                                      <label class="col-form-label pt-0" for="longitude0">longitude</label>
                                      <input class="form-control" id="longitude<?php echo e($key); ?>" required name="longitude[]"  value="<?php echo e($item->longitude); ?>"  type="text" aria-describedby="" placeholder="Enter Longitude">
                                    </div>

                                   


                                </div>
                            </div>

                          <?php if($key==0): ?>
                            <div class="col-md-1" style="border: 1px solid #24695c; padding: 33px;">
                            <br />
                            <button class="btn mt-2 btn-primary " type="button" onclick="addMoreData()"> <i class="fa fa-plus"></i> </button>
                          </div>
                          <?php else: ?>
                          <div class="col-md-1" style="border: 1px solid #24695c; padding: 33px;">
                            <br />
                            <button class="btn mt-2 btn-danger " type="button" onclick="removeData(<?php echo e($key+1); ?>)"> <i class="fa fa-trash"></i> </button>
                          </div>
                          <?php endif; ?>

                        </div>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

    
    
    </script>

<script type="text/javascript">
var counter = <?php echo e($post->institutecopies->count()+1); ?>;

    function addMoreData(){


      $(".copies-data").append(`

      <div class="row copiesrow${counter}">
          <div class="col-md-11" style="border: 1px solid #24695c; padding: 33px;">
            <div class="row">
            
                <div class="mb-3 col-md-3">
                  <label class="col-form-label pt-0" for="branch_name${counter}">Branch Name</label>
                  <input class="form-control" required id="branch_name${counter}" name="branch_name[]" type="text" aria-describedby="" placeholder="Enter Branch Name">
                </div>

                <div class="mb-3 col-md-3">
                  <label class="col-form-label pt-0" for="pincode${counter}">pincode </label>
                  <input class="form-control" required id="pincode${counter}" name="pincode[]" type="text" aria-describedby="" placeholder="Enter pincode">
                </div>


                <div class="mb-3 col-md-3">
                  <label class="col-form-label pt-0" for="address${counter}">address</label>
                  <input class="form-control" required id="address${counter}" name="address[]" type="text" aria-describedby="" placeholder="Enter address">
                </div>

                <div class="mb-3 col-md-3">
                  <label class="col-form-label pt-0" for="latitude${counter}">latitude</label>
                  <input class="form-control" required id="latitude${counter}" name="latitude[]" type="text" aria-describedby="" placeholder="Enter latitude">
                </div>

                <div class="mb-3 col-md-3">
                  <label class="col-form-label pt-0" for="longitude${counter}">longitude</label>
                  <input class="form-control" required id="longitude${counter}" name="longitude[]" type="text" aria-describedby="" placeholder="Enter longitude">
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
    
     
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/institute/institute-edit.blade.php ENDPATH**/ ?>