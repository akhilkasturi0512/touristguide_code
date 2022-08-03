<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>

<style>
.btn-group{
        width: 100%;    
}
.multiselect-container{
        width: 100%!important;    
        overflow: scroll!important;
        height: 500px!important;
        margin-top: 43%!important;
}
    .multiselect{
        width: 100%;
        text-align: left;
    }
</style>
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
                    <?php echo e(csrf_field()); ?>

                            
                    <div class="col-sm-12 col-xl-12">
                    <div class="row">
                      <div class="col-sm-12">
                
                        <div class="card">
                          <div class="card-body row">
                           
                           	    <div class="form-group">
                                    <label class="form-label">User Type *</label>
                                    <select name="user_type"  id="user_type" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">User</option>                                        
                                        <option value="2">Vendor</option>
                                    </select>
                                </div>
                                

                               
                                    
    							<div class="form-group " id="user_div" style="display:none">
                                    <label class="form-label">User Name *</label>
                                    <select name="user_id[]"   id="user_id" multiple="multiple" class="w-100  form-control js-example-basic-single">
                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                <div class="form-group" id="vendor_div" style="display:none"> 
                                    <label class="form-label">Vendor Name *</label>
                                    <select name="vendor_id[]"    multiple="multiple" class="w-100  form-control js-example-basic-single">
                                        <?php $__currentLoopData = $hostelowner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                
     
                                 <div class="form-group">
                                    <label class="form-label">Title *</label>
                                    <textarea class="form-control" name="title"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Description *</label>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-form-label pt-0" for="image">Notification Image</label>
                                    <input class="form-control" id="image" name="image" type="file" placeholder="image">
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
                        var btn = '<a href="<?php echo e(route('business_cat-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Business_category', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Business_category', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Business_category', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
    <script>
      
$("#user_type").on('change',function(){
    

   if( $("#user_type option:selected").val()==1){
     $("#user_div").show();
     $("#vendor_div").hide();
   } 
   else{
     $("#user_div").hide();
     $("#vendor_div").show();
       
   }
   
});


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/notification/notification-create.blade.php ENDPATH**/ ?>