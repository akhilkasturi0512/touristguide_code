<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo e(asset('admin/assets/images/favicon.png')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('admin/assets/images/favicon.png')); ?>" type="image/x-icon">
   
    <?php echo $__env->yieldContent('title'); ?>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/fontawesome.css')); ?>">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/icofont.css')); ?>">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/themify.css')); ?>">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/flag-icon.css')); ?>">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/feather-icon.css')); ?>">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/chartist.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/prism.css')); ?>">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/bootstrap.css')); ?>">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/style.css')); ?>">
    <link id="color" rel="stylesheet" href="<?php echo e(asset('admin/assets/css/color-1.css')); ?>" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/responsive.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php echo $__env->yieldContent('pagecss'); ?>

</head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->

      <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Sidebar Ends-->
          <?php echo $__env->yieldContent('content'); ?>
        <!-- footer start-->

        <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      </div>
    </div>
    <!-- latest jquery-->
    <script src="<?php echo e(asset('admin/assets/js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('admin/assets/js/notify/bootstrap-notify.min.js')); ?>"></script>

    <!-- feather icon js-->
    <script src="<?php echo e(asset('admin/assets/js/icons/feather-icon/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
    <!-- Sidebar jquery-->
    
        <?php echo $__env->yieldContent('pagejs'); ?>
       
        
    <script src="<?php echo e(asset('admin/assets/js/sidebar-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/config.js')); ?>"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo e(asset('admin/assets/js/bootstrap/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/bootstrap/bootstrap.min.js')); ?>"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo e(asset('admin/assets/js/chart/chartjs/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/chart/chartist/chartist.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/chart/knob/knob.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/prism/prism.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/clipboard/clipboard.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/counter/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/counter/counter-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/custom-card/custom-card.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/owlcarousel/owl-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/dashboard/dashboard_2.js')); ?>"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo e(asset('admin/assets/js/script.js')); ?>"></script>
    
    <!-- login js-->
    <!-- Plugin used-->



    <script>
        'use strict';

       function buttonLoading(processType, ele){
        if(processType == 'loading'){
            ele.html(ele.attr('data-loading-text'));
            ele.attr('disabled', true);
        }else{
            ele.html(ele.attr('data-rest-text'));
            ele.attr('disabled', false);
        }
    }

      function successMsg(heading,message, html = ""){
        var notify = $.notify('<i class="fa fa-bell-o"></i><strong>'+message+'</strong> ', {
              type: 'theme',
              allow_dismiss: true,
              delay: 2000,
              showProgressbar: true,
              timer: 300
          });
      }

      function errorMsg(heading,message){
        var notify = $.notify('<i class="fa fa-bell-o"></i><strong>'+message+'</strong> ', {
              type: 'theme',
              allow_dismiss: true,
              delay: 2000,
              showProgressbar: true,
              timer: 300
          });
      }


      function readURL(input,appendID)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+appendID).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function getName(selfID,appendID){ $("#"+appendID).val($("#"+selfID+' option:selected').text());}


    </script>
  </body>
</html>
<?php /**PATH /home/androidhiker/public_html/travelguide/resources/views/admin/layout/main.blade.php ENDPATH**/ ?>