
<?php $__env->startSection('title'); ?>
<title>Coupon</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/datatables.css')); ?>">
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
              <div class="card-header">

                <div class="container-fluid">
                    <div class="page-header">
                      <div class="row">
                        <div class="col-sm-6">
                          <h3>Coupon List</h3>
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                            <li class="breadcrumb-item">Coupon List</li>
                          </ol>
                        </div>
                        
                        <div class="col-sm-6" style="justify-content: end; display: flex;">
                           <a href="<?php echo e(route('coupon-create')); ?>" class="btn btn-primary">Add Coupon</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
                      <ul class="d-flex" >
                        <li ><a class="<?php if($type==''): ?> text-primary <?php else: ?> text-dark <?php endif; ?> " style="text-decoration: underline;" href="<?php echo e(route('coupon-list')); ?>">Active (<?php echo e($data['active']); ?>)</a> </li>&nbsp; | &nbsp;
                        <li ><a class="<?php if($type=='Inactive'): ?> text-primary <?php else: ?> text-dark <?php endif; ?>"  style="text-decoration: underline;" href="<?php echo e(route('coupon-list','Inactive')); ?>">Inactive ( <?php echo e($data['inactive']); ?>)</a></li>&nbsp; | &nbsp;
                        <li ><a class="<?php if($type=='Trashed'): ?> text-primary <?php else: ?> text-dark <?php endif; ?>"  style="text-decoration: underline;" href="<?php echo e(route('coupon-list','Trashed')); ?>">Trashed ( <?php echo e($data['trashed']); ?>)</a></li>
                      </ul>
                    </div>
                  </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">

                    <table class="display data-table" >
                         <thead>
                          <tr>
                              <th>No</th>
                              
                              <th>Coupon Name</th>
                              <th>Begin Date</th>
                              <th>End Date</th>
                              <th>Coupon Code</th>
                              <th>Created_at</th>
                              <th width="250px">Action</th>
                          </tr>
                      </thead>
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
<script src="<?php echo e(asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>


    <script type="text/javascript">
        $(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('coupon-list',$type)); ?>",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   
                    {data: 'coupon_name', name: 'coupon_name'},
                    {data: 'begin_date', name: 'begin_date'},
                    {data: 'end_date', name: 'end_date'},
                    {data: 'coupon_code', name: 'coupon_code'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });



			
			$(document).on('click','.deleteButton', function(){

                var con = confirm("Are You Sure Want to Delete This Coupon");

                if(con){

                    row = $(this).closest('tr');
                    url = $(this).attr('data-url');
                    var $this = $(this);
                    buttonLoading('loading', $this);

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data:{_token:'<?php echo e(csrf_token()); ?>'},
                        success: function(data){
                          row.remove();
                        }
                    });

                }

            });
            
             $(document).on('click','.restoreButton', function(){
                var con = confirm('Are you sure want to Restore this record');
                if(con){
    				row = $(this).closest('tr');
                    url = $(this).attr('data-url');
    				var $this = $(this);
    				buttonLoading('loading', $this);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data:{_token:'<?php echo e(csrf_token()); ?>'},
                        success: function(data){
    						row.remove();
                        }
                    });
                }   
                else{
                     event.preventDefault();
                        return false;
                }
            });


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/travelguide/resources/views/admin/coupon/coupon.blade.php ENDPATH**/ ?>