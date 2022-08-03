<?php $__env->startSection('title'); ?>
<title>View</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>

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


            <div class="app-content">
                <div class="side-app">
                    
                       
                    <br />
                    <div class="card p-3 pt-3" style="overflow: scroll">
                        
                        <h4 class="font-weight-bold">Coupon Information</h4>
                        <table class="table table-bordered data-table" id="data">
                            <tbody>
            
                               
            
                                 <tr>
                                   <th>Coupon Name</th>
                                   <td colspan="12"><?php echo e((isset($loan->coupon_name))?$loan->coupon_name:'N/A'); ?></td>
                                 </tr>
            
                                  <tr>
                                   <th>Coupon Discount </th>
                                   <td colspan="12"><?php echo e((isset($loan->coupon_discount))?$loan->coupon_discount:'N/A'); ?> </td>
                                 </tr>
            
                                 <tr>
                                   <th>Coupon Code</th>
                                   <td colspan="12"><?php echo e((isset($loan->coupon_code))?$loan->coupon_code:'N/A'); ?></td>
                                 </tr>
            
                                 <tr>
                                   <th>Image</th>
                                   <td colspan="12"><img id="FileImg" src="<?php if(!empty($loan->coupon_image)): ?><?php echo e(url($loan->coupon_image)); ?><?php else: ?><?php echo e(url('/notfound.png')); ?><?php endif; ?>" style="width: 71px;height: 71px"></td>
                                 </tr>
            
                                 <tr>
                                   <th>Begin Date</th>
                                   <td colspan="12"><?php echo e((isset($loan->begin_date))?$loan->begin_date:'N/A'); ?></td>
                                 </tr>
                                 <tr>
                                   <th>End Date</th>
                                   <td colspan="12"><?php echo e((isset($loan->end_date))?$loan->end_date:'N/A'); ?></td>
                                 </tr>
                                 <tr>
                                   <th>description</th>
                                   <td colspan="12"><?php echo e((isset($loan->description))?$loan->description:'N/A'); ?></td>
                                 </tr>
                        
                                 <tr>
                                   <th>Coupon Type</th>
                                   <td colspan="12"><?php echo e((isset($loan->coupon_type))?$loan->coupon_type:'N/A'); ?></td>
                                 </tr>
                                 <tr>
                                   <th>Coupon Uses</th>
                                   <td colspan="12"><?php echo e((isset($loan->coupon_uses))?$loan->coupon_uses:'N/A'); ?></td>
                                 </tr>
                                 <tr>
                                   <th>Coupon Limit</th>
                                   <td colspan="12"><?php echo e((isset($loan->coupon_limit))?$loan->coupon_limit:'N/A'); ?></td>
                                 </tr>
                                 
                                 <tr>
                                   <th>Coupon Minimum Price</th>
                                   <td colspan="12"><?php echo e((isset($loan->cart_value))?$loan->cart_value:'N/A'); ?></td>
                                 </tr>
                                 <tr>
                                   <th scope="col" width="200" style="padding:20px">Status</th>
                                   <td scope="col" width="200" style="padding:20px"><?php if($loan->status ==1): ?><span class="badge badge-success">Active </span><?php else: ?><span class="badge badge-danger">InActive </span><?php endif; ?>  </td>
                                 </tr>
                                
            
                                 
                                </tbody>
                          </table>
            
                    </div>
            
            
            
            
            
            
            </div><!-- COL END -->
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script>
$('#pdfprint').click(function () {
window.print()
});


 
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/coupon/coupon-show.blade.php ENDPATH**/ ?>