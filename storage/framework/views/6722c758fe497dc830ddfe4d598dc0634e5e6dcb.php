<?php $__env->startSection('title'); ?>
<title> Offers </title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/ui.multiselect.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">View Offers </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Offers </a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="page-body">
    


  <div class="container-fluid">
      <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">

              <div class="container-fluid">
                  <div class="page-header">
                    <div class="row">
                      <div class="col-sm-6">
                        <h3>Offers Information</h3>
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Offers</a></li>
                          <li class="breadcrumb-item">View</li>
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>
                
            </div>
            <div class="card-body">
              <div class="table-responsive">
              
                  <table class="display  data-table" >
                       <tbody>

                     
        
                             <tr>
                               <th scope="col" width="200" style="padding:20px">Title</th>
                               <td scope="col" width="200" style="padding:20px"><?php echo e((isset($banner->title))?$banner->title:'N/A'); ?></td>
                             </tr>
                
                             
        
                             <tr>
                               <th scope="col" width="200" style="padding:20px">Offer Banner</th>
                               <td scope="col" width="200" style="padding:20px"><img id="FileImg" src="<?php if(!empty($banner->banner)): ?><?php echo e(url($banner->banner)); ?><?php else: ?><?php echo e(url('/public/notfound.png')); ?><?php endif; ?>" style="width: 71px;height: 71px"></td>
                             </tr>
        
                             <tr>
                               <th scope="col" width="200" style="padding:20px">Status</th>
                               <td scope="col" width="200" style="padding:20px"><?php if($banner->status ==1): ?><span class="badge badge-success">Active </span><?php else: ?><span class="badge badge-danger">InActive </span><?php endif; ?>  </td>
                             </tr>
                             
                             
                   
                    </tbody>
                      <tbody>
                      </tbody>
                    </table>

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
$('#pdfprint').click(function () {
window.print()
});


 
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/offers/offers-show.blade.php ENDPATH**/ ?>