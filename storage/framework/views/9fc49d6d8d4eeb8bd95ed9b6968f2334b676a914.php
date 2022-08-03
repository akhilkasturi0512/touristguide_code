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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/fontawesome.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/icofont.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/themify.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/flag-icon.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/feather-icon.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/responsive.css')); ?>">



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
      <div class="page-body-wrapper sidebar-icon">
          <?php echo $__env->yieldContent('content'); ?>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="<?php echo e(asset('admin/assets/js/jquery-3.5.1.min.js')); ?>"></script>
    <!-- feather icon js-->
    <script src="<?php echo e(asset('admin/assets/js/icons/feather-icon/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo e(asset('admin/assets/js/bootstrap/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/script.js')); ?>"></script>

    <?php echo $__env->yieldContent('pagejs'); ?>

    <style>
      .select2-selection__choice__display{
        padding-left: 20px!important;
      }
    </style>
<script>
  $('#resetpassword').submit(function(){
         var $this = $('#resetpassword #submitButton');
         buttonLoading('loading', $this);
         $('.is-invalid').removeClass('is-invalid state-invalid');
         $('.invalid-feedback').remove();
         $.ajax({
             url: $('#resetpassword').attr('action'),
             type: "POST",
             processData: false,  // Important!
             contentType: false,
             cache: false,
             data: new FormData($('#resetpassword')[0]),
             success: function(data) {
                 if(data.status)
                 {
                     var btn = '';
                     successMsg('Forgot Password', data.msg, btn);


                 }
                 else
                 {
                     $.each(data.errors, function(fieldName, field){
                         $.each(field, function(index, msg){
                             $('#'+fieldName).addClass('is-invalid state-invalid');
                            errorDiv = $('#'+fieldName).parent('div');
                            errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                         });
                     });
             errorMsg('Forgot Password', 'Input Error');
                 }
                 buttonLoading('reset', $this);

             },
             error: function() {
                 errorMsg('Forgot Password', 'There has been an error, please alert us immediately');
                 buttonLoading('reset', $this);
             }

         });

         return false;
        });



        function buttonLoading(processType, ele)
 {
     if(processType == 'loading')
     {
         ele.html(ele.attr('data-loading-text'));
         ele.attr('disabled', true);
     }
     else
     {
         ele.html(ele.attr('data-rest-text'));
         ele.attr('disabled', false);
     }
 }

function successMsg(heading,message, html = "")
{
            toastr.success(message, heading, {
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
}


function errorMsg(heading,message)
{
            toastr.error(message, heading, {
                positionClass: "toast-top-right",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "800",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
}

</script>
  </body>
</html><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/layouts/app.blade.php ENDPATH**/ ?>