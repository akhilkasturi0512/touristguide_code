
<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecss'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/summernote.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css"
integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link
href="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/jquery.fileuploader.css"
rel="stylesheet" />
<link
href="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/css/jquery.fileuploader-theme-dragdrop.css"
rel="stylesheet" />

<style>
@import  url(https://fonts.googleapis.com/icon?family=Material+Icons);
@import  url("https://fonts.googleapis.com/css?family=Raleway");
    .wrapper {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-items: center;
}

h1 {
  font-family: inherit;
  margin: 0 0 0.75em 0;
  color: #728c8d;
  text-align: center;
}

.box {
  display: block;
  min-width: 300px;
  height: 300px;
  margin: 10px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  overflow: hidden;
}

.upload-options {
  position: relative;
  height: 75px;
  background-color: cadetblue;
  cursor: pointer;
  overflow: hidden;
  text-align: center;
  transition: background-color ease-in-out 150ms;
}
.upload-options:hover {
  background-color: #7fb1b3;
}
.upload-options input {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.upload-options label {
  display: flex;
  align-items: center;
  width: 100%;
  height: 100%;
  font-weight: 400;
  text-overflow: ellipsis;
  white-space: nowrap;
  cursor: pointer;
  overflow: hidden;
}
.upload-options label::after {
  content: "add";
  font-family: "Material Icons";
  position: absolute;
  font-size: 2.5rem;
  color: #e6e6e6;
  top: calc(50% - 2.5rem);
  left: calc(50% - 1.25rem);
  z-index: 0;
}
.upload-options label span {
  display: inline-block;
  width: 50%;
  height: 100%;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  vertical-align: middle;
  text-align: center;
}
.upload-options label span:hover i.material-icons {
  color: lightgray;
}

.js--image-preview {
  height: 225px;
  width: 100%;
  position: relative;
  overflow: hidden;
  background-image: url("");
  background-color: white;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}
.js--image-preview::after {

  font-family: "Material Icons";
  position: relative;
  font-size: 4.5em;
  color: #e6e6e6;
  top: calc(50% - 3rem);
  left: calc(50% - 2.25rem);
  z-index: 0;
}
.js--image-preview.js--no-default::after {
  display: none;
}
.js--image-preview:nth-child(2) {
  background-image: url("http://bastianandre.at/giphy.gif");
}

i.material-icons {
  transition: color 100ms ease-in-out;
  font-size: 2.25em;
  line-height: 55px;
  color: white;
  display: block;
}

.drop {
  display: block;
  position: absolute;
  background: rgba(95, 158, 160, 0.2);
  border-radius: 100%;
  transform: scale(0);
}

.animate {
  -webkit-animation: ripple 0.4s linear;
          animation: ripple 0.4s linear;
}

@-webkit-keyframes ripple {
  100% {
    opacity: 0;
    transform: scale(2.5);
  }
}

@keyframes  ripple {
  100% {
    opacity: 0;
    transform: scale(2.5);
  }
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
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="info-home-tab"
                                    data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home"
                                    aria-selected="true"><i class="icofont icofont-home"></i>Property Details</a></li>
                                    <li class="nav-item"><a class="nav-link" id="room-info-tab"
                                        data-bs-toggle="tab" href="#info-room" role="tab" aria-controls="info-room"
                                        aria-selected="false"><i class="icofont icofont-ui-home"></i>Room Details</a>
                                    </li>
                                    
                                    <li class="nav-item"><a class="nav-link" id="mess-info-tab"
                                        data-bs-toggle="tab" href="#info-mess" role="tab" aria-controls="info-mess"
                                        aria-selected="false"><i class="icofont icofont-lunch"></i>Mess Details </a>
                                    </li>
                                    
                                    <li class="nav-item"><a class="nav-link" id="mess-info-tab"
                                        data-bs-toggle="tab" href="#buy-subscription" role="tab" aria-controls="buy-subscription"
                                        aria-selected="false"><i class="icofont icofont-lunch"></i>Subscription Details </a>
                                    </li>
                                    
                                    
                                    
                                </ul>
                                
                                <div class="tab-content" id="info-tabContent">

                                    <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                                    <form enctype="multipart/form-data" class="theme-form d-flex" id="submitForm" action="<?php echo e($data['url']); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-sm-12 col-xl-12">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-body row">
                                                        <div class="mb-3 col-md-3">
                                                            <label class="form-label"
                                                            for="hostelowner_id">Hostel Owner</label>
                                                            <select class="form-select" id="hostelowner_id" name="hostelowner_id">
                                                                <option value="">Select</option>
                                                                <?php $__currentLoopData = $hostelowner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option <?php echo e($post->hostelowner_id == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"> <?php echo e($item->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                            <label class="col-form-label pt-0" for="title">Business Name</label>
                                                            <input class="form-control" id="business_name" name="business_name" value="<?php echo e($post->business_name); ?>" type="text" aria-describedby="" placeholder="Enter Business Name">
                                                        </div>

                                                        <div class="mb-3 col-md-3">

                                                            <label class="form-label"
                                                            for="businesscat_id">Business Category</label>
                                                            <select class="form-select" id="businesscat_id"
                                                            name="businesscat_id">
                                                            <?php $__currentLoopData = $business_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    <?php echo e($post->businesscat_id == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>">
                                                                    <?php echo e($item->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>


                                                <div class="mb-3 col-md-3">
                                                    <label class="col-form-label pt-0"
                                                    for="title">Minimum Price</label>
                                                    <input class="form-control"
                                                    value="<?php echo e($post->min_price); ?>" id="min_price" name="min_price"
                                                    type="text" aria-describedby=""
                                                    placeholder="Enter minimum price">
                                                </div>

                                                <div class="mb-3 col-md-3">
                                                    <label class="col-form-label pt-0"
                                                    for="title">Maximum Price</label>
                                                    <input class="form-control"
                                                    value="<?php echo e($post->max_price); ?>" id="max_price" name="max_price"
                                                    type="text" aria-describedby=""
                                                    placeholder="Enter maximum price">
                                                </div>

                                                <div class="mb-3 col-md-3">
                                                    <label class="col-form-label pt-0" for="latitude">Latitude</label>
                                                    <input class="form-control" value="<?php echo e($post->latitude); ?>" id="latitude" name="latitude" type="text" aria-describedby="" placeholder="Enter latitude">
                                                </div>

                                                <div class="mb-3 col-md-3">
                                                    <label class="col-form-label pt-0" for="longitude">Longitude</label>
                                                    <input class="form-control" value="<?php echo e($post->latitude); ?>" id="longitude" name="longitude" type="text" aria-describedby="" placeholder="Enter Longitude">
                                                </div>


                                                <div class="mb-3 col-md-3">
                                                    <label class="col-form-label pt-0"
                                                    for="address">Address</label>
                                                    <input class="form-control"
                                                    value="<?php echo e($post->address); ?>" id="address"
                                                    name="address" type="text" aria-describedby=""
                                                    placeholder="Enter Address">
                                                </div>
                                                
                                                  <div class="mb-3 col-md-3">
                                                      <label class="col-form-label pt-0" for="title">States</label>
                                                      <select id="state_id" name="state_id" onchange="getServiceableAreas()" class="form-control tags">
                                                          <option value="">Select States</option>
                                                          <?php $__currentLoopData = $data['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e(($post->state==$vals->id)?'selected':''); ?> value="<?php echo e($vals->id); ?>"><?php echo e($vals->name); ?></option>
                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </select>
                                                </div>
                                                
                                                <div class="mb-3 col-md-3">
                                                  <label class="col-form-label pt-0" for="title">Cities</label>
                                                  <select id="city_id" name="city_id" onchange="getServiceableLocation()" class="form-control tags">
                                                     <option value="">Select Cities</option>
                                                       <?php $__currentLoopData = $data['cities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e(($post->city==$vals->id)?'selected':''); ?> value="<?php echo e($vals->id); ?>"><?php echo e($vals->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </select>
                                                </div>
                                                
                                                
                                                  
                                                <div class="mb-3 col-md-6">
                                                    <label class="col-form-label pt-0" for="location">Location</label>
                                                      
                                                      <select id="location"  name="location" class="form-control tags">
                                                         <option value="">Select Location</option>
                                                         
                                                          <?php $__currentLoopData = $data['location']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e(($post->location==$vals->id)?'selected':''); ?> value="<?php echo e($vals->id); ?>"><?php echo e($vals->area); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </select>
                                                      
                                                    <!--<input class="form-control" id="location" name="location" type="text" aria-describedby="" placeholder="Enter Location">-->
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label class="col-form-label pt-0" for="image">Service Image</label>
                                                    <input class="form-control" id="image" name="image" type="file" placeholder="image">
                                                </div>
                                                
                                                <div class="mb-3 col-md-6">
                                                    
                                                    
                                                </div>
                                                

                                                <div class="row">
                                                    
                                                    <label class="form-label" for="amanities0">Amenities</label>
                                                    
                                                    <?php $__currentLoopData = $amanities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="mb-12 col-md-3" >
                                                            <label class="form-label" style="font-weight:800;font-size:12px" for="amanities<?php echo e($item->id); ?>">
                                                            <input type="checkbox" <?php if(in_array($item->id,explode(',',$post->amanities))): ?>  checked <?php endif; ?> value="<?php echo e($item->id); ?>" name="amanities[]" id="amanities<?php echo e($item->id); ?>" style="margin-right:8px"><img style="width:18px;height:15px;margin-right:5px" src="<?php echo e(url($item->icon)); ?>"><?php echo e($item->name); ?></label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                </div>

                                                <div class="mb-3 col-md-12">
                                                     
                                                     <label class="col-form-label pt-0" for="description">Description</label>
                                                     
                                                     <textarea class="form-control" name="description" cols="30" rows="10"><?php echo e($post->description); ?></textarea>
                                                     
                                                     <!--<input class="form-control" type="text" id="description" name="description"  value="<?php echo e($post->description); ?>" placeholder="Enter Description">-->

                                                </div>

                                                <input type="file" name="files[]" multiple>


                                                <div class="mb-3">
                                                    <label class="col-form-label pt-0"
                                                        for="title">Free Plan</label>
                                                    <select class="form-select" id="is_free_plan" name="is_free_plan">
                                                        <option value="">Select</option>
                                                        <option value="1" <?php echo e(($post->is_free_plan==1)?'selected':''); ?>>Yes</option>
                                                        <option value="0" <?php echo e(($post->is_free_plan==0)?'selected':''); ?>>No</option>
                                                    </select>
                                                </div>
                                                                
                                                </div>
                                                <div class="card-footer">
                                                    <button id="submitButton" type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>
                                                    
                                                    <center>
                                                          
                                                       
                                                          
                                                        
                                                    </center>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                                    <div class="tab-pane fade" id="info-room" role="tabpanel" aria-labelledby="room-info-tab">
                                    
                                    <form enctype="multipart/form-data" method="POST" class="theme-form d-flex" id="roomForm" action="<?php echo e(route('updateroom', $post->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        
                                        <div class="col-sm-12 col-xl-12">
                                             <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-body row">
                                                                <input id="hostelowner_id" name="hostelowner_id" value="<?php echo e($post->hostelowner_id); ?>" type="hidden" aria-describedby="">
                        
                                                                <?php 
                                                                    
                                                                    $roomtype = "";
                                                                    $roomprice = "";
                                                                    $status = "";
                                                                    
                                                                    $roomimage1 = "";
                                                                    $roomimage2 = "";
                                                                    $roomimage3 = "";
                                                                    $roomimage4 = "";
                                                                    
                                                                  
                                                                   
                                                                    if(isset($room_type_edit) && !empty($room_type_edit)){
                                                                        
                                                                        $status = $room_type_edit->status;
                                                                    }
                                                                    
                                                                    if(isset($room_type_edit) && !empty($room_type_edit)){
                                                                        
                                                                        $roomtype = $room_type_edit->roomtype->id;
                                                                    }
                        
                                                                    if(isset($room_type_edit) && !empty($room_type_edit)){
                                                                        $roomprice = $room_type_edit->price;
                                                                    }
                        
                                                                  
                                                                    
                                                                    if(isset($room_type_edit->service_room_type_images[0])){
                                                                       
                                                                        $roomimage1 = $room_type_edit->service_room_type_images[0]->image;
                                                                    
                                                                    }
                                                                    
                                                                    if(isset($room_type_edit->service_room_type_images[1])){
                                                                        
                                                                        $roomimage2 = $room_type_edit->service_room_type_images[1]->image;
                                                                    
                                                                    }
                                                                    
                                                                    if(isset($room_type_edit->service_room_type_images[2])){
                                                                        
                                                                        $roomimage3 = $room_type_edit->service_room_type_images[2]->image;
                                                                    
                                                                    }
                                                                    
                                                                     if(isset($room_type_edit->service_room_type_images[3])){
                                                                        
                                                                        $roomimage4 = $room_type_edit->service_room_type_images[3]->image;
                                                                    
                                                                    }
                                                                    
                                                                    
                                                                    
                                                                ?>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-12" style="padding: 15px;">
                                                                        <div class="row">
                                                                            <div class="mb-4 col-md-12">
                                                                                <label class="form-label" for="room_type">Room Type</label>
                                                                                    <select class="form-select" id="room_type" name="room_type">
                                                                                        <option value="">Select</option>
                                                                                        <?php $__currentLoopData = $room_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <option <?php if($roomtype==$item->id): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>"> <?php echo e($item->name); ?></option>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </select>
                                                                            </div>
                        
                        
                                                                            <div class="mb-4 col-md-12">
                                                                                <label class="col-form-label pt-0" for="price">Price </label>
                                                                                <input class="form-control" value="<?php echo e($roomprice); ?>"  id="price0"  name="price" type="text" aria-describedby="" placeholder="Enter price">
                                                                            </div>
                                                                    
                                                                            <div class="mb-4 col-md-2">
                                                                                <a class="mt-3" id="room_images" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" style="text-decoration: underline;" href="javascript:void(0)"> 
                                                                                    <i class="fa fa-image"></i> Add Photos
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                        
                                                                <div class="mb-3">
                                                                        <label class="col-form-label pt-0" for="title">Status</label>
                                                                        
                                                                        <select class="form-select" id="status" name="status">
                                                                            <option value="">Select</option>
                                                                            <option <?php if($status=='1'): ?> selected <?php endif; ?> value="1">Active</option>
                                                                            <option <?php if($status=='0'): ?> selected <?php endif; ?> value="0">Inactive</option>
                                                                        </select>
                                                                </div>
                            
                                                            </div>
                                                            
                                                        <div class="card-footer">
                                                            <button type="submit" id="submitButton"
                                                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..."
                                                            data-rest-text="Save"
                                                            class="btn btn-primary">Save</button>
                                                            
                                                            <center>
                                                                    <a class="btn" href="<?php echo e(route('service_property-edit',$id)); ?>"><i class="fa fa-arrow-left"></i> Back</a>
                                                            </center>
                                                             
                                                        </div>
                                                        
                                                         
                                                    </div>
                            
                                                </div>
                                            </div>
                                        </div>
                                    
                                        
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Add Photos</h4>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                      
                                                      
                                                        <div class="wrapper">
                                                          <div class="box">
                                                            <div class="js--image-preview js--image-preview-data01" style="background-image:url(<?php echo e(asset($roomimage1)); ?>)"></div>
                                                            <div class="upload-options">
                                                              <label>
                                                                <input type="file" name="room_images[]" onchange="initImageUpload(this)" data-id="01" class="image-upload" accept="image/*" />
                                                              </label>
                                                              
                        
                                                            </div>
                                                          </div>
                                                        
                                                          <div class="box">
                                                            <div class="js--image-preview js--image-preview-data02"  style="background-image:url(<?php echo e(asset($roomimage2)); ?>)"></div>
                                                            <div class="upload-options">
                                                              <label>
                                                                <input type="file" name="room_images[]" onchange="initImageUpload(this)" data-id="02" class="image-upload" accept="image/*" />
                                                              </label>
                                                            </div>
                                                          </div>
                                                        
                                                          <div class="box">
                                                            <div class="js--image-preview js--image-preview-data03"  style="background-image:url(<?php echo e(asset($roomimage3)); ?>)"></div>
                                                            <div class="upload-options">
                                                              <label>
                                                                <input type="file" name="room_images[]" onchange="initImageUpload(this)" data-id="03" class="image-upload" accept="image/*" />
                                                              </label>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="box">
                                                            <div class="js--image-preview js--image-preview-data04"  style="background-image:url(<?php echo e(asset($roomimage4)); ?>)"></div>
                                                            <div class="upload-options">
                                                              <label>
                                                                <input type="file" name="room_images[]" onchange="initImageUpload(this)"  data-id="04"  class="image-upload" accept="image/*" />
                                                              </label>
                                                            </div>
                                                          </div>
                                                          
                                                        </div>
                                                        
                                                        
                                                  </div>
                                                  
                                                   <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Save</button>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </form>
                                    
                                    <div class="col-sm-12 col-xl-12">
                                             <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td>S.no</td>
                                                                    <td>Room Type</td>
                                                                    <td>Price</td>
                                                                    <td>Action</td>
                                                                </tr>                                        
                                                            </thead>
                                                            
                                                            <tbody>
                                                                <?php $__currentLoopData = $service_room_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e(++$key); ?></td>
                                                                    <td><?php echo e(($vals->roomtype)?$vals->roomtype->name:'N/A'); ?></td>
                                                                    <td><?php echo e($vals->price); ?></td>
                                                                    <td><a class="btn btn-primary" href="<?php echo e(route('service_property-edit',$id).'?room_id='.$vals->id.'#info-room'); ?>">Edit</a></td>
                                                                </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                            </tbody>
                        
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                
    </div>
                        
                                    <div class="tab-pane fade" id="info-mess" role="tabpanel" aria-labelledby="mess-info-tab">
                        
                                    <form enctype="multipart/form-data" class="theme-form d-flex" id="messForm" action="<?php echo e(route('updatemess', $post->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="col-sm-12 col-xl-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                        
                                                    <div class="card">
                                                        <div class="card-body row">
                                                          
                                                            <input class="form-control" id="hostelowner_id"
                                                                name="hostelowner_id"
                                                                value="<?php echo e($post->hostelowner_id); ?>" type="hidden"
                                                                aria-describedby="">
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0"
                                                                    for="break_fast_from">Break-Fast Start</label>
                                                                <input class="form-control" id="break_fast_from"
                                                                    name="break_fast_from" value="<?php echo e(($post->mess)?$post->mess->break_fast_from : ''); ?>" type="time"
                                                                    aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0"
                                                                    for="break_fast_to">Break-Fast End</label>
                                                                <input class="form-control"  value="<?php echo e(($post->mess)?$post->mess->break_fast_to : ''); ?>" id="break_fast_to"
                                                                    name="break_fast_to" type="time"
                                                                    aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0"
                                                                    for="lunch_from">Lunch Start</label>
                                                                <input class="form-control" id="lunch_from"  value="<?php echo e(($post->mess)?$post->mess->lunch_from : ''); ?>"
                                                                    name="lunch_from" type="time" aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0" for="lunch_to">Lunch
                                                                    End</label>
                                                                <input class="form-control" id="lunch_to"  value="<?php echo e(($post->mess)?$post->mess->lunch_to : ''); ?>"
                                                                    name="lunch_to" type="time" aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0" for="tea_from">Tea
                                                                    Start</label>
                                                                <input class="form-control" id="tea_from"  value="<?php echo e(($post->mess)?$post->mess->tea_from : ''); ?>"
                                                                    name="tea_from" type="time" aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0" for="tea_to">Tea
                                                                    End</label>
                                                                <input class="form-control" id="tea_to" name="tea_to"  value="<?php echo e(($post->mess)?$post->mess->tea_to : ''); ?>"
                                                                    type="time" aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0"
                                                                    for="dinner_from">Dinner Start</label>
                                                                <input class="form-control" id="dinner_from"  value="<?php echo e(($post->mess)?$post->mess->dinner_from : ''); ?>"
                                                                    name="dinner_from" type="time" aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0"
                                                                    for="dinner_to">Dinner End</label>
                                                                <input class="form-control" id="dinner_to"  value="<?php echo e(($post->mess)?$post->mess->dinner_to : ''); ?>"
                                                                    name="dinner_to" type="time" aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0" for="milk_from">Milk
                                                                    Start</label>
                                                                <input class="form-control" id="milk_from"  value="<?php echo e(($post->mess)?$post->mess->milk_from : ''); ?>"
                                                                    name="milk_from" type="time" aria-describedby="">
                                                            </div>
                        
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0" for="milk_to">Milk
                                                                    End</label>
                                                                <input class="form-control" id="milk_to"  value="<?php echo e(($post->mess)?$post->mess->milk_to : ''); ?>"
                                                                    name="milk_to" type="time" aria-describedby="">
                                                            </div>
                        
                        
                                                                <?php 
                                                                    
                                                                    $messimage1 = "";
                                                                    $messimage2 = "";
                                                                    $messimage3 = "";
                        
                                                                    
                                                                    if(isset($mess_images[0]->image)){
                                                                        $messimage1 = $mess_images[0]->image;
                                                                    }
                                                                    
                                                                    if(isset($mess_images[1]->image)){
                                                                        $messimage2 = $mess_images[1]->image;
                                                                    }
                                                                    
                                                                    if(isset($mess_images[2]->image)){
                                                                        $messimage3 = $mess_images[2]->image;
                                                                    }
                                                                    
                                                                ?>
                                                                
                        
                                                        <h5>Mess Images </h5>
                                                        
                                                        <div class="wrapper">
                          
                                                          <div class="box">
                                                            <div class="js--image-preview js--image-preview-data010" style="background-image:url(<?php echo e(asset($messimage1)); ?>)"></div>
                                                            <div class="upload-options">
                                                              <label>
                                                                <input type="file" name="mess_files[]" onchange="initImageUpload(this)" data-id="010" class="image-upload" accept="image/*" />
                                                              </label>
                                                              
                        
                                                            </div>
                                                          </div>
                                                        
                                                          <div class="box">
                                                            <div class="js--image-preview js--image-preview-data020"  style="background-image:url(<?php echo e(asset($messimage2)); ?>)"></div>
                                                            <div class="upload-options">
                                                              <label>
                                                                <input type="file" name="mess_files[]" onchange="initImageUpload(this)" data-id="020" class="image-upload" accept="image/*" />
                                                              </label>
                                                            </div>
                                                          </div>
                                                        
                                                          <div class="box">
                                                            <div class="js--image-preview js--image-preview-data030"  style="background-image:url(<?php echo e(asset($messimage3)); ?>)"></div>
                                                            <div class="upload-options">
                                                              <label>
                                                                <input type="file" name="mess_files[]" onchange="initImageUpload(this)" data-id="030" class="image-upload" accept="image/*" />
                                                              </label>
                                                            </div>
                                                          </div>
                                                
                                                          
                                                        </div>
                                                        
                                                            
                        
                                                            <div class="mb-12">
                                                                <label class="col-form-label pt-0"
                                                                    for="title">Status</label>
                                                                <select class="form-select" id="status"
                                                                    name="status">
                                                                    <option value="">Select</option>
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit"
                                                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..."
                                                                data-rest-text="Save"
                                                                class="btn btn-primary">Save</button>
                                                            
                                                        </div>
                                                    </div>
                        
                                                </div>
                                            </div>
                                        </div>
                                    </form>
        </div>


                                    <div class="tab-pane fade" id="buy-subscription" role="tabpanel" aria-labelledby="mess-info-tab">
                        
                                    <form enctype="multipart/form-data" class="theme-form d-flex" id="subscriptionUpdateForm" method="POST" action="<?php echo e(route('subscription-update', $post->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="col-sm-12 col-xl-12">
                                            
                                            <div class="row">
                                                
                                                <div class="col-sm-12">
                        
                                                    <div class="card">
                                                        
                                                        <div class="card-body row">
                                                            
                                                                <div class="form-group">
                                                                    <label>Plan</label>    

                                                                     <select class="form-control plan_id" id="plan_id" name="plan_id">
                                                                         <option value="">Select</option>
                                                                         <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option <?php if(isset($buy_subscriptions->plan_id) && !empty($buy_subscriptions->plan_id)): ?> <?php if($buy_subscriptions->plan_id==$vals->id): ?> selected <?php endif; ?> <?php endif; ?>  value="<?php echo e($vals->id); ?>"><?php echo e($vals->plan_name); ?></option>                                                                         
                                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                     </select>
                                                                     
                                                                </div>
                                                                
                                                        </div>
                                                        
                                                        <div class="card-footer">
                                                            
                                                            <button type="submit" id="submitButton" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>
                                                            
                                                        </div>
                                                        
                                                    </div>
                        
                                                </div>
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
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagejs'); ?>

<script src="<?php echo e(asset('admin/assets/js/editor/summernote/summernote.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/editor/summernote/summernote.custom.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e(asset('admin/assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://www.khiladys.com/public/admin/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://www.khiladys.com/public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/jquery.fileuploader.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/js/custom.js"></script>

<script>

        function getServiceableLocation(){
            
             $.ajax({
                    url: '<?php echo e(route('serviceable-location')); ?>',
                    data: {state_id:$("#state_id option:selected").val(),city_id:$("#city_id option:selected").val()},
                    success: function(data) {
                        var html = "";
                        $.each(data.data,function(key,value){
                                html+=`<option  value='${value.id}'>${value.area}</option>`;
                        });
                        
                        $("#location").html(html);
                        
                    }
                });
            
        }
        

       $(document).ready(() => {
          let url = location.href;

          if (location.hash) {
            const hash = url.split("#");
            $('a[href="#'+hash[1]+'"]').tab("show");
            url = location.href.replace(/\/#/, "#");
            history.replaceState(null, null, url);
            setTimeout(() => {
              $(window).scrollTop(0);
            }, 400);
          }

          $('a[data-bs-toggle="pill"]').on("click", function() {
            let newUrl;
            const hash = $(this).attr("href");
            if(hash == "#home") {
              newUrl = url.split("#")[0];
            } else {
              newUrl = url.split("#")[0] + hash;
            }
            newUrl += "";
            history.replaceState(null, null, newUrl);
          });
    });

    const anchor = window.location.hash;
    $(`a[href="${anchor}"]`).tab('show')

    // enable fileuploader plugin
    $('input[name="files[]"]').fileuploader({
        changeInput: '<div class="fileuploader-input">' +
            '<div class="fileuploader-input-inner">' +
                '<img src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/images/fileuploader-dragdrop-icon.png">' +
                '<h3 class="fileuploader-input-caption"><span>Drag and drop files here</span></h3>' +
                '<p>or</p>' +
                '<div class="fileuploader-input-button"><span>Browse Files</span></div>' +
                '</div>' +
                '</div>',
                theme: 'dragdrop',

                captions: {
                    feedback: 'Drag and drop files here',
                    feedback2: 'Drag and drop files here',
                    drop: 'Drag and drop files here'
                },

                limit: 20,
                maxSize: 50,

                addMore: true,
                thumbnails: {
                    onImageLoaded: function(item) {

                        // if (!item.html.find('.fileuploader-action-edit').length)
                        //     item.html.find('.fileuploader-action-remove').before('<button type="button" class="fileuploader-action fileuploader-action-popup fileuploader-action-edit" title="Edit"><i class="fileuploader-icon-edit"></i></button>');
                    }

                }
            });
        </script>


        <script type="text/javascript">
            
            <?php if(isset($service_room_types) && count($service_room_types)>0): ?>
            var counter =  <?php echo e(count($service_room_types)); ?>;
            <?php else: ?>
            var counter =  1;
            <?php endif; ?>

            function addMoreData() {




                $(".copies-data").append(`

                <div class="row copiesrow${counter}">
                    <div class="col-md-11" style="padding: 15px;">
                        <div class="row">

                            <div class="mb-4 col-md-5">
                                <label class="form-label" for="room_type${counter}">Room Type</label>
                                <select class="form-select" id="room_type${counter}" name="room_type[]" >
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $room_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-4 col-md-5">
                                <label class="col-form-label pt-0" for="price${counter}">Price </label>
                                <input class="form-control" id="price${counter}"  name="price[]" type="text" aria-describedby="" placeholder="Enter price">
                            </div>
                            
                            <div class="mb-4 col-md-2">
                                <br />
                                <a class="mt-3" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg${counter}" style="text-decoration: underline;" href="javascript:void(0)"> 
                                            <i class="fa fa-image"></i> Add Photos
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-1" style="padding: 15px;">
                        <br />
                        <button class="btn mt-2 btn-danger " type="button" onclick="removeData(${counter})"> <i class="fa fa-trash"></i> </button>
                    </div>
                    
                    

                </div>

                `);

                
                setModal(counter);
                
                $(".tagsmulti" + counter).select2();

                counter++;

            }
            
            
                  function setModal(counter){
                
                $("#roomForm").append(`<div class="modal fade bd-example-modal-lg${counter}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Photos</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              
                              <div class="wrapper">
                                  <div class="box">
                                    <div class="js--image-preview js--image-preview-data${counter}1"></div>
                                    <div class="upload-options">
                                      <label>
                                        <input type="file" name="room_images[${counter}][]"  onchange="initImageUpload(this)"  data-id="${counter}1"  class="image-upload" accept="image/*" />
                                      </label>
                                    </div>
                                  </div>
                                
                                  <div class="box">
                                    <div class="js--image-preview js--image-preview-data${counter}2"></div>
                                    <div class="upload-options">
                                      <label>
                                        <input type="file" name="room_images[${counter}][]"  onchange="initImageUpload(this)"  data-id="${counter}2"  class="image-upload" accept="image/*" />
                                      </label>
                                    </div>
                                  </div>
                                
                                  <div class="box">
                                    <div class="js--image-preview js--image-preview-data${counter}3"></div>
                                    <div class="upload-options">
                                      <label>
                                        <input type="file" name="room_images[${counter}][]"  onchange="initImageUpload(this)"  data-id="${counter}3" class="image-upload" accept="image/*" />
                                      </label>
                                    </div>
                                  </div>
                                  
                                  <div class="box">
                                    <div class="js--image-preview js--image-preview-data${counter}4"></div>
                                    <div class="upload-options">
                                      <label>
                                        <input type="file" name="room_images[${counter}][]" onchange="initImageUpload(this)"  data-id="${counter}4" class="image-upload" accept="image/*" />
                                      </label>
                                    </div>
                                  </div>
                                  
                                </div>
                              
                          </div>
                        </div>
                    </div>
                </div>`);   
            }
            
            function initImageUpload(box) {
              let uploadField = $(box).prop("files")[0];
              let currentid = $(box).attr('data-id');
              
                  checkType(uploadField,currentid);           
            }
            
            function checkType(file,currentid){
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                  throw 'Datei ist kein Bild';
                } else if (!file){
                  throw 'Kein Bild gewählt';
                } else {
                  previewImage(file,currentid);
                }
            }
            
              function previewImage(file,currentid){
                let thumb = $('.js--image-preview-data'+currentid);
                    console.log(thumb);
                    reader = new FileReader();
            
                reader.onload = function() {
                     $('.js--image-preview-data'+currentid).css('background-image', 'url(' + reader.result + ')');
                }
                reader.readAsDataURL(file);
                $('.js--image-preview-data'+currentid).addClass('js--no-default');
              }

            function removeData(counter) {

                $(".copies-data .copiesrow" + counter).remove();
            }

        function getServiceableAreas(){
            
            
             $.ajax({
                    url: '<?php echo e(route('serviceable-areas')); ?>',
                    data: {state_id:$("#state_id option:selected").val()},
                    success: function(data) {
                        var html = "";
                        $.each(data.data,function(key,value){
                                html+=`<option  value='${value.city_id}'>${value.name}</option>`;
                        });
                        
                        $("#city_id").html(html);
                        
                    }
                });
            
        }
        

            $(function() {

                $('.tags').select2();


                // $("#description").summernote({
                    //     height: "200"
                    // });
                    // $("#description1").summernote({
                        //     height: "200"
                        // });

                        $('#submitForm').submit(function() {
                            var $this = $('#submitButton');
                            buttonLoading('loading', $this);
                            $('.is-invalid').removeClass('is-invalid state-invalid');
                            $('.invalid-feedback').remove();
                            $.ajax({
                                url: $('#submitForm').attr('action'),
                                type: "POST",
                                processData: false, // Important!
                                contentType: false,
                                cache: false,
                                data: new FormData($('#submitForm')[0]),
                                success: function(data) {
                                    if (data.status) {
                                        var btn =
                                        '<a href="<?php echo e(route('category-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                                        successMsg('Create Category', data.msg, btn);
                                        $('#submitForm')[0].reset();

                                    } else {
                                        
                                        
                                        $.each(data.errors, function(fieldName, field) {
                                            $.each(field, function(index, msg) {
                                                $('#' + fieldName).addClass(
                                                'is-invalid state-invalid');
                                                errorDiv = $('#' + fieldName).parent('div');
                                                errorDiv.append(
                                                '<div class="invalid-feedback">' +
                                                    msg + '</div>');
                                                });
                                            });
                                            
                                            if(data.errors.room_images.length>0){
                                                $(".bd-example-modal-lg").modal("show");
                                            }
                                            
                                            errorMsg('Create Category', 'Input Error');
                                        }
                                        
                                        
                                        buttonLoading('reset', $this);

                                    },
                                    error: function() {
                                        errorMsg('Create Category',
                                        'There has been an error, please alert us immediately');
                                        buttonLoading('reset', $this);
                                    }

                                });

                                return false;
                            });



                            $('#roomForm').submit(function() {
                                var $this = $('#submitButton');
                                buttonLoading('loading', $this);
                                $('.is-invalid').removeClass('is-invalid state-invalid');
                                $('.invalid-feedback').remove();
                                $.ajax({
                                    url: $('#roomForm').attr('action'),
                                    type: "POST",
                                    processData: false, // Important!
                                    contentType: false,
                                    cache: false,
                                    data: new FormData($('#roomForm')[0]),
                                    success: function(data) {
                                        if (data.status) {
                                            var btn = '';
                                            successMsg('Room', data.msg, btn);
                                            $('#roomForm')[0].reset();

                                        } else {
                                            $.each(data.errors, function(fieldName, field) {
                                                $.each(field, function(index, msg) {
                                                    $('#roomForm #' + fieldName).addClass(
                                                    'is-invalid state-invalid');
                                                    errorDiv = $('#roomForm #' + fieldName)
                                                    .parent('div');
                                                    errorDiv.append(
                                                    '<div class="invalid-feedback">' +
                                                        msg + '</div>');
                                                    });
                                                });
                                                errorMsg('Room', 'Input Error');
                                            }
                                            buttonLoading('reset', $this);

                                        },
                                        error: function() {
                                            errorMsg('Room',
                                            'There has been an error, please alert us immediately');
                                            buttonLoading('reset', $this);
                                        }

                                    });

                                    return false;
                                });
                                
                                
                                
                                $('#subscriptionUpdateForm').submit(function() {
                                var $this = $('#submitButton');
                                buttonLoading('loading', $this);
                                $('.is-invalid').removeClass('is-invalid state-invalid');
                                $('.invalid-feedback').remove();
                                $.ajax({
                                    url: $('#subscriptionUpdateForm').attr('action'),
                                    type: "POST",
                                    processData: false, // Important!
                                    contentType: false,
                                    cache: false,
                                    data: new FormData($('#subscriptionUpdateForm')[0]),
                                    success: function(data) {
                                        if (data.status) {
                                            var btn = '';
                                            successMsg('Room', data.msg, btn);
                                            $('#subscriptionUpdateForm')[0].reset();

                                        } else {
                                            $.each(data.errors, function(fieldName, field) {
                                                $.each(field, function(index, msg) {
                                                    $('#subscriptionUpdateForm #' + fieldName).addClass(
                                                    'is-invalid state-invalid');
                                                    errorDiv = $('#subscriptionUpdateForm #' + fieldName)
                                                    .parent('div');
                                                    errorDiv.append(
                                                    '<div class="invalid-feedback">' +
                                                        msg + '</div>');
                                                    });
                                                });
                                                errorMsg('Room', 'Input Error');
                                            }
                                            buttonLoading('reset', $this);

                                        },
                                        error: function() {
                                            errorMsg('Room',
                                            'There has been an error, please alert us immediately');
                                            buttonLoading('reset', $this);
                                        }

                                    });

                                    return false;
                                });





                            $('#messForm').submit(function() {
                                    var $this = $('#submitButton');
                                    buttonLoading('loading', $this);
                                    $('.is-invalid').removeClass('is-invalid state-invalid');
                                    $('.invalid-feedback').remove();
                                    $.ajax({
                                        url: $('#messForm').attr('action'),
                                        type: "POST",
                                        processData: false, // Important!
                                        contentType: false,
                                        cache: false,
                                        data: new FormData($('#messForm')[0]),
                                        success: function(data) {
                                            if (data.status) {
                                                var btn = '';
                                                successMsg('Room', data.msg, btn);

                                            } else {
                                                $.each(data.errors, function(fieldName, field) {
                                                    $.each(field, function(index, msg) {
                                                        $('#messForm #' + fieldName).addClass(
                                                        'is-invalid state-invalid');
                                                        errorDiv = $('#messForm #' + fieldName)
                                                        .parent('div');
                                                        errorDiv.append(
                                                        '<div class="invalid-feedback">' +
                                                            msg + '</div>');
                                                        });
                                                    });
                                                    errorMsg('Mess', 'Input Error');
                                                }
                                                buttonLoading('reset', $this);

                                            },
                                            error: function() {
                                                errorMsg('Mess',
                                                'There has been an error, please alert us immediately');
                                                buttonLoading('reset', $this);
                                            }

                                        });

                                        return false;
                                    });



        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/service/service_property-edit.blade.php ENDPATH**/ ?>