
<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/datatables.css')); ?>">
<style>
    .card .card-header{
        padding:0px !important;
        padding-top:20px !important;
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
              <div class="card-header">

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
                        <div class="col-sm-6" style="justify-content: end; display: flex;">
                           <a href="<?php echo e(route('hostelOwner-create')); ?>" class="btn btn-primary">Add Hostel Owner</a>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">

                    <table class="display data-table" >
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Total Booking</th>
                            <th>City</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th style="width:250px !important">Action</th>
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
                ajax: "<?php echo e($data['url']); ?>",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'total_bookings', name: 'total_bookings'},
                    {data: 'city_name', name: 'city_name'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'address', name: 'address'},
                    {data: 'status', name: 'status'},
                    // {data: 'doc_status', name: 'doc_status'},
                    // {data: 'bank_status', name: 'bank_status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,},
                ]
            });



			
			$(document).on('click','.deleteButton', function(){

                var con = confirm("Are You Sure Want to Delete This Hostel Owner");

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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/tourist_guide/resources/views/admin/hostelowner/hostelowner.blade.php ENDPATH**/ ?>