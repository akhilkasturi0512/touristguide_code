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

.modal .box {
  display: block;
  min-width: 300px;
  height: auto;
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














.box-container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 2rem;
  align-items: center;
  min-height: 100vh;
}

.box {
  position: relative;
  width: 300px;
  height: 400px;
  background: #fff;
  border-radius: 1rem;
  box-shadow: 5px 2px 11px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  transition: 0.2s ease-in;
}
.box:hover {
  transform: scale(1.1);
  box-shadow: 8px 5px 6px 2px rgba(0, 0, 0, 0.1);
}
.box img {
  height: 100%;
  width: 100%;
  object-fit: cover;
}
.box {
    position: relative;
    width: 100%;
    max-width: 300px;
    height: 300px;
    background: #fff;
    border-radius: 1rem;
    box-shadow: 5px 2px 11px 2px rgb(0 0 0 / 30%);
    overflow: hidden;
    transition: 0.2s ease-in;
}
.box .caption > * {
  padding: 0.9rem 1rem;
}
.box .caption .content {
  display: flex;
  flex-direction: column;
  gap: 0.2rem;
}
.box .caption .content span {
  font-size: 1.3rem;
  text-transform: capitalize;
  font-weight: bold;
}
.box .caption .content small {
  font-size: 12px;
}
.box .caption .fab-btn {
  width: 30px;
  height: 30px;
  background: #fff;
  border-radius: 50%;
  margin-right: 1.3rem;
}

.box1 .caption {
  background: #e4e4e4;
}

.box2 .caption {
  color: #fff;
}
.box2 .caption ::before {
  content: "";
  background: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, white 80%);
}

@keyframes  borderAnim {
  0% {
    border-color: #a85632 !important;
  }
  10% {
    border-color: #a85632 !important;
  }
  20% {
    border-color: #fc5105 !important;
  }
  30% {
    border-color: #82f75c !important;
  }
  40% {
    border-color: #5ac6cc !important;
  }
  50% {
    border-color: #366eb3 !important;
  }
  70% {
    border-color: #4b2566 !important;
  }
}
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="page-body">



  <div class="container-fluid">
      <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
          <div class="card">



                <div class="card-header pb-0">

                    <h5><?php echo e($data['title']); ?></h5>

                </div>
                <div class="card-body">
                  <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">

                    <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-ui-home"></i>Property Details</a></li>
                   
                    
                  </ul>
                  
                  <div class="tab-content" id="info-tabContent">

                    <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>

                            <tr>

                              <th scope="col" width="500">Business Name : </th>
                              <td scope="col"  width="500"><?php echo e($service_property->business_name); ?></td>

                              <th scope="col" width="200">Hostel Owner : </th>
                              <td scope="col"  width="500"><?php echo e($service_property->hostelowner ? $service_property->hostelowner->name : 'N/A'); ?></td>

                            </tr>

                            <tr>
                                <th scope="col" width="200">Business Category : </th>
                                <td scope="col"  width="500"><?php echo e($service_property->businesscat ? $service_property->businesscat->name : 'N/A'); ?></td>

                                <th scope="col" width="200">Price :</th>
                                <td scope="col"  width="500"><i class="fa fa-inr"></i> <?php echo e($service_property->price); ?></td>
                            </tr>

                            <tr>
                              <th scope="col" width="200">State :</th>
                              <td scope="col"  width="500"> <?php echo e($service_property->state_name); ?></td>

                              <th scope="col" width="500">City :</th>
                              <td scope="col"  width="500"> <?php echo e($service_property->city_name); ?></td>
                            </tr>
                            
                             <tr>
                              <th scope="col" width="200">Address :</th>
                              <td scope="col"  width="500"> <?php echo e($service_property->address); ?></td>

                              <th scope="col" width="500">Description :</th>
                              <td scope="col"  width="500"> <?php echo $service_property->description; ?></td>
                            </tr>

                          
                          </thead>

                        </table>
                        
                        <br /><br />
                        <h6 class="ml-3" style="margin-left: 13px;">Property Images</h6>
                     
                        <div class="row">
                             <?php $__currentLoopData = $service_property->property_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class=" col-md-3">
                                  <div class="box box1">
                                    <div class="border"></div>
                                    <img src="<?php echo e(url($item->image)); ?>" alt="">
                                  </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<script>


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
$(`a[href="${anchor}"]`).tab('show');

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/tourist_guide/resources/views/admin/service/service_property-show.blade.php ENDPATH**/ ?>