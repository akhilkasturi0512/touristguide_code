<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/summernote.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/jquery.fileuploader.css" rel="stylesheet" />
<link href="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/css/jquery.fileuploader-theme-dragdrop.css" rel="stylesheet" />

<style>
.pac-container{

z-index:9999;

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
                       
                        <!--<div class="form-group col-6">-->
                        <!--    <label class="form-label">State *</label>-->
                        <!--    <select required="required" onchange="getCities()" name="state_id" id="state_id" class="form-control states">-->
                        <!--        <option value="">Select</option>-->
                
                        <!--        <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                        <!--        <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>-->
                        <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                        <!--    </select>-->
                        <!--</div>-->

                        <!--<div class="form-group col-6">-->
                        <!--    <label class="form-label">City </label>-->
                        <!--    <select name="city_id" onchange="getName('city_id','name')" id="city_id" class="form-control states">-->
                        <!--        <option value="">Select</option>-->
                        <!--    </select>-->
                        <!--</div>-->
                       
                        <div class="form-group col-6">
                          <label class="col-form-label pt-0" for="title">States</label>
                          <select id="state_id" name="state_id" class="form-control states">
                              <option value="">Select States</option>
                              <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vals->id); ?>"><?php echo e($vals->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                        
                        <div class="form-group col-6">
                          <label class="col-form-label pt-0" for="title">Cities</label>
                          <select id="city_id"  class="form-control js-data-example-ajax">
                              <option value="">Select City</option>
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
                                  
                                    <a class="mt-3 " onclick="mapModal(0)"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" style="text-decoration: underline;" href="javascript:void(0)"> 
                                        Set on Map
                                    </a>

                                  
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


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Set Location</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
               <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label"> Enter Location * </label>
                                <input id="searchInput" class="form-control" name="location_address" id="location_address"  type="text" placeholder="Enter a location">
                            </div>
                </div>
                            
             <div id="map" style="height:400px;width:100%;"></div> 
             
             <input type="hidden" id="maps_id" />
             
          </div>
          
           <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Save</button>
          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagejs'); ?>

<script src="<?php echo e(asset('admin/assets/js/editor/summernote/summernote.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/editor/summernote/summernote.custom.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/jquery.fileuploader.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/js/custom.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyARSV8negP1xdpSm1Sb-xBKgwVAzJ0dN3c&callback=initMap" async defer></script>

<script type="text/javascript">


    function mapModal(id){
        $("#maps_id").val('');
        $("#maps_id").val(id);
    }

   function initMap() {
    
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 26.9124, lng: 75.7873},
      zoom: 14,
      mapTypeId: 'roadmap',
      streetViewControl: false,
      mapTypeControl: false,
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);

        // Location details
        // for (var i = 0; i < place.address_components.length; i++) {
        //     if(place.address_components[i].types[0] == 'postal_code'){
                
        //         document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
                
        //     }
        //     if(place.address_components[i].types[0] == 'country'){
        //         document.getElementById('country').innerHTML = place.address_components[i].long_name;
        //     }
        // }
        
        
        
        console.log("Location :",place.formatted_address);
        console.log("latitude :",place.geometry.location.lat());
        console.log("longitude :",place.geometry.location.lng());
        
        var maps_id = $("#maps_id").val();
        
        
        
        document.getElementById('address'+maps_id).value = place.formatted_address;
        document.getElementById('latitude'+maps_id).value = place.geometry.location.lat();
        document.getElementById('longitude'+maps_id).value = place.geometry.location.lng();
    });
}


    function setLatandLong(address,latitude,longitude){
        
        
        
    }



var counter = 1;

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

                <a class="mt-3 "  onclick="mapModal(${counter})"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" style="text-decoration: underline;" href="javascript:void(0)"> 
                    Set on Map
                </a>
               
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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/merarum/public_html/app/resources/views/admin/institute/institute-create.blade.php ENDPATH**/ ?>