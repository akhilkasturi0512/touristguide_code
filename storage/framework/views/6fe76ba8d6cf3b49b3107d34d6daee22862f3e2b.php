
<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/datatables.css')); ?>">
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
        <div class="col-sm-12 col-xl-12">
          <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-ui-hostelOwner"></i>Basic Details</a></li>
                      <li class="nav-item"><a class="nav-link" id="documents-info-tab" data-bs-toggle="tab" href="#info-documents" role="tab" aria-controls="info-documents" aria-selected="false"><i class="icofont icofont-file-document"></i>Documents</a></li>
                      <li class="nav-item"><a class="nav-link" id="bank-info-tab" data-bs-toggle="tab" href="#info-bank" role="tab" aria-controls="info-bank" aria-selected="false"><i class="icofont icofont-bank"></i>Bank Details </a></li>
                    </ul>
                    <div class="tab-content" id="info-tabContent">

                      <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                        <form  enctype="multipart/form-data" method="POST" class="theme-form" id="submitForm" action="<?php echo e($data['url']); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                            
                            <div class="card-body">

                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="name">Name</label>
                                  <input class="form-control" id="name" name="name" type="text" aria-describedby="" value="<?php echo e($post->name); ?>" placeholder="Enter Name">
                                </div>


                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="email">Email</label>
                                  <input class="form-control" id="email" name="email" type="text" aria-describedby="" value="<?php echo e($post->email); ?>" placeholder="Enter Email">
                                </div>


                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="name">Mobile</label>
                                  <input class="form-control" id="mobile" name="mobile" type="text" aria-describedby="" value="<?php echo e($post->mobile); ?>" placeholder="Enter Mobile">
                                </div>

                                <!--<div class="mb-3">-->
                                <!--  <label class="col-form-label pt-0" for="latitude">Latitude</label>-->
                                <!--  <input class="form-control" id="latitude" name="latitude" type="text" aria-describedby="" value="<?php echo e($post->latitude); ?>" placeholder="Enter latitude">-->
                                <!--</div>-->
                                
                                <!--<div class="mb-3">-->
                                <!--  <label class="col-form-label pt-0" for="longitude">Longitude</label>-->
                                <!--  <input class="form-control" id="longitude" name="longitude" type="text" aria-describedby="" value="<?php echo e($post->longitude); ?>" placeholder="Enter Longitude">-->
                                <!--</div>-->

                                   <div class="mb-3">
                                      <label class="col-form-label pt-0" for="title">States</label>
                                      <select id="state_id" name="state_id" class="form-control states">
                                          <option value="">Select States</option>
                                          <?php $__currentLoopData = $data['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(($post->state==$vals->id)?'selected':''); ?>  value="<?php echo e($vals->id); ?>"><?php echo e($vals->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <label class="col-form-label pt-0" for="title">Cities</label>
                                      <select id="city_id" name="city_id" class="form-control states">
                                          <option value="">Select City</option>
                                          
                                      </select>
                                    </div>
                    
                                


                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="title">Status</label>
                                  <select class="form-select" id="status" name="status" >
                                      <option value="">Select</option>
                                      <option value="1" <?php echo e(($post->status==1)?'selected':''); ?>>Active</option>
                                      <option value="0" <?php echo e(($post->status==0)?'selected':''); ?>>Inactive</option>
                                    </select>
                                </div>


                                <div class="mb-3">

                                  <label  class="col-form-label pt-0"> Image </label>

                                  <div class="row">
                                      <div class="col-md-10 ">
                                          <input id="profile_image" type="file" class="form-control align-middle custom-file-input" name="profile_image" onchange="readURL(this, 'FileImg');">
                                      </div>


                                      <div class="col-md-2 ">
                                        <img id="FileImg" src="<?php echo e(url(''.$post->profile_image)); ?>"  style="width: 71px;height: 71px">
                                      </div>
                                  </div>

                              </div>


                            </div>
                            <div class="card-footer">
                              <button   type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>
                              
                            </div>
                          </div>
                          
                            <!--<input type="hidden" name="city_id" id="city_id1" value="<?php echo e($post->city_id); ?>" />-->
                        </form>

                      </div>


                      <div class="tab-pane fade" id="info-documents" role="tabpanel" aria-labelledby="documents-info-tab">
                        <form  enctype="multipart/form-data" method="POST" class="theme-form" id="documentForm" action="<?php echo e(route('documentupdate', $post->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="business_name">Business Name</label>
                                        <input class="form-control" id="business_name" name="business_name" type="text" aria-describedby="" value="<?php echo e(($post->documents)?$post->documents->business_name:''); ?>" placeholder="Enter Name">
                                    </div>
                                    <div class="mb-3">

                                        <label  class="col-form-label pt-0"> Aadhar Card </label>

                                        <div class="row">
                                            <div class="col-md-10 ">
                                                <input id="aadharcard" type="file" class="form-control align-middle custom-file-input" name="aadharcard" onchange="readURL(this, 'FileImg');">
                                            </div>


                                        </div>

                                    </div>

                                    <div class="mb-3">

                                        <label  class="col-form-label pt-0"> Pan Card </label>

                                        <div class="row">
                                            <div class="col-md-10 ">
                                                <input id="pancard" type="file" class="form-control align-middle custom-file-input" name="pancard" onchange="readURL(this, 'FileImg');">
                                            </div>



                                        </div>

                                    </div>

                                    <div class="mb-3">

                                        <label  class="col-form-label pt-0"> Other </label>

                                        <div class="row">
                                            <div class="col-md-10 ">
                                                <input id="other" type="file" class="form-control align-middle custom-file-input" name="other" onchange="readURL(this, 'FileImg');">
                                            </div>



                                        </div>

                                    </div>


                                    <div class="mb-3">

                                        <label  class="col-form-label pt-0"> Business Pancard </label>

                                        <div class="row">
                                            <div class="col-md-10 ">
                                                <input id="business_pancard" type="file" class="form-control align-middle custom-file-input" name="business_pancard" onchange="readURL(this, 'FileImg');">
                                            </div>



                                        </div>

                                    </div>

                                    <div class="mb-3">
                                    <label class="col-form-label pt-0" for="title">Status</label>
                                    <select class="form-select" id="status" name="status" >
                                        <option value="">Select</option>
                                        <option value="1" <?php echo e(($post->status==1)?'selected':''); ?>>Approved</option>
                                        <option value="0" <?php echo e(($post->status==0)?'selected':''); ?>>Not Approved</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                              <button   type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>
                              
                            </div>
                        </form>
                      </div>

                      <div class="tab-pane fade" id="info-bank" role="tabpanel" aria-labelledby="bank-info-tab">

                        <form  enctype="multipart/form-data" class="theme-form" method="POST"  id="bankForm" aria-labelledby="bank-info-tab" action="<?php echo e(route('bankupdate', $post->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                            
                            <div class="card-body">

                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="name">Bank Name</label>
                                  <input class="form-control" id="name" name="name" type="text" aria-describedby="" value="<?php echo e(($post->bank)?$post->bank->name:''); ?>" placeholder="Enter Name">
                                </div>


                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="ifsc_code">Ifsc Code</label>
                                  <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" aria-describedby="" value="<?php echo e(($post->bank)?$post->bank->ifsc_code:''); ?>" placeholder="Enter Ifsc Code">
                                </div>


                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="account_no">Account Number</label>
                                  <input class="form-control" id="account_no" name="account_no" type="text" aria-describedby="" value="<?php echo e(($post->bank)?$post->bank->account_no:''); ?>" placeholder="Enter Account Number">
                                </div>



                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="ac_holder_name">Account Holder Name </label>
                                  <input class="form-control" id="ac_holder_name" name="ac_holder_name" type="text" aria-describedby="" value="<?php echo e(($post->bank)?$post->bank->ac_holder_name:''); ?>" placeholder="Enter Account Holder Name ">
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="name">Branch Name </label>
                                    <input class="form-control" id="branch" name="branch" type="text" aria-describedby="" value="<?php echo e(($post->bank)?$post->bank->branch:''); ?>" placeholder="Enter Branch Name">
                                </div>


                                <div class="mb-3">
                                  <label class="col-form-label pt-0" for="title">Status</label>
                                  <select class="form-select" id="status" name="status" >
                                      <option value="">Select</option>
                                      <option value="1" <?php echo e(($post->status==1)?'selected':''); ?>>Active</option>
                                      <option value="0" <?php echo e(($post->status==0)?'selected':''); ?>>Inactive</option>
                                    </select>
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
        </div>

      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagejs'); ?>

<script src="<?php echo e(asset('admin/assets/js/dropzone/dropzone.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/dropzone/dropzone-script.js')); ?>"></script>
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
                        var btn = '<a href="<?php echo e(route('hostelOwner-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Hostel Owner', data.msg, btn);
                        $('#submitForm')[0].reset();
    
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                                errorDiv = $('#'+fieldName).parent('div');
                                errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                                
                            });
                        });
                        errorMsg('Create Hostel Owner', 'Input Error');
                    }
                    buttonLoading('reset', $this);
    
                },
                error: function() {
                    errorMsg('Create Hostel Owner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
            });





            $('#documentForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#documentForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#documentForm')[0]),
                success: function(data) {
                    if(data.status){
                        var btn = '';
                        successMsg('Documents', data.msg, btn);
                        $('#documentForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#documentForm #'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#documentForm #'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Documents', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Documents', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });



           $('#bankForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#bankForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#bankForm')[0]),
                success: function(data) {
                    if(data.status){
                        var btn = '';
                        successMsg('Bank', data.msg, btn);
                        $('#bankForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#bankForm #'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#bankForm #'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Bank', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Bank', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
    });
    
    
          
        $(".states").select2();
        // $(".js-data-example-ajax").on('change',function(){
            
        // var data = $(this).select2('data')
        //     $("#city_id1").val(data[0].id);
        //     // $("#city_name").val(data[0].text);
        //     // alert(data[0].text);
        //     // alert(data[0].id);
          
        // });
      
    // $('.js-data-example-ajax').select2({
    //       ajax:{
    //         url: '<?php echo e(route('get-serviceable')); ?>',
    //         data: function (params) {
    //           var query = {
    //             search: params.term,
    //             state_id: $("#state_id option:selected").val()
    //           }
    //           return query;
    //         }
    //       }
    // });
    
    function getCities(){
        
        
         $.ajax({
                url:  '<?php echo e(route('get-serviceable')); ?>',
                type: 'GET',
                data: {state_id:$("#state_id option:selected").val()},
                success: function(data) {
                    var html = "";
                    var city_id = '<?php echo e($post->city); ?>';
                        console.log(city_id);
                        
                    $.each(data.results,function(key,value){
                        if(city_id==value.id){
                            html+=`<option selected value='${value.id}'>${value.name}</option>`;
                        }
                        else{
                            html+=`<option  value='${value.id}'>${value.name}</option>`;                            
                        }

                    });
                    
                    $("#city_id").html(html);
                    
                    
                }
            });
            
    }
    
    getCities();
    
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/hostelowner/hostelowner-edit.blade.php ENDPATH**/ ?>