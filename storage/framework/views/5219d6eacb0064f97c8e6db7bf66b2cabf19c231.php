<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>
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
                      <label class="col-form-label pt-0" for="title">States</label>
                      <select id="state_id" name="state_id" class="form-control states">
                          <option value="">Select States</option>
                          <?php $__currentLoopData = $data['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($vals->id); ?>"><?php echo e($vals->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="title">Cities</label>
                      <select id="city_id" class="form-control js-data-example-ajax">
                          <option value="">Select City</option>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="title">Image</label>
                      <input type="file" name="image" id="image" class="form-control" />
                    </div>
                    
                    <div class="areass">
                        <div class="row">
                            <div class="mb-3 col-md-10">
                                <div class="form-group">
                                    <label>Areas</label>
                                    <input type="text" id="areas-0" class="form-control" name="areas[]"/>
                                </div>
                            </div>
    
                            <div class="mb-3 col-md-2">
                                <div class="form-group">
                                    <button type="button" onclick="addMore()" class=" mt-4 btn btn-primary"> 
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                
                </div>
                
                
                <div class="card-footer">
                  <button   type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>
                  <!--<button class="btn btn-secondary">Cancel</button>-->
                </div>
              </div>
              <input type="hidden" name="city_id" id="city_id1" />
               <input type="hidden" name="city_name" id="city_name" />
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
        var counter = 0;
        
        function addMore(){
                counter++;
            $(".areass").append(`
                    <div class="row" id="row${counter}">
                         <div class="mb-3 col-md-10">
                            <div class="form-group">
                                <label>Areas</label>
                                <input type="text" class="form-control " id="areas.${counter}" name="areas[]"/>
                            </div>
                        </div>
            
                        <div class="mb-3 col-md-1">
                            <div class="form-group">
                                <button type="button" onclick="removeThis(${counter})" class="mt-4 btn btn-danger btn-circle btn-sm"> 
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
            `);
        
        }
        
        function removeThis(counter){
            $("#row"+counter).remove();
        }
        

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
                                console.log(fieldName.replace(".","-"));
                                
                                $('#'+fieldName.replace(".","-")).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName.replace(".","-")).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg.replace(index," ")+'</div>');
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
      
      $(".states").select2();
      
      
      $(".js-data-example-ajax").on('change',function(){
         
         var data = $(this).select2('data')
            
            $("#city_id1").val(data[0].id);
            $("#city_name").val(data[0].text);
            
            // alert(data[0].text);
            // alert(data[0].id);
          
      });
      
    $('.js-data-example-ajax').select2({
          ajax: {
            url: '<?php echo e(route('get-serviceable')); ?>',
            data: function (params) {
              var query = {
                search: params.term,
                state_id: $("#state_id option:selected").val()
              }
        
              // Query parameters will be ?search=[term]&type=public
              return query;
            }
          }
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/cities/cities-create.blade.php ENDPATH**/ ?>