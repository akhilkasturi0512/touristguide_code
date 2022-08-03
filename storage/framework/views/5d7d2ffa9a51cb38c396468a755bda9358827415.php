<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
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
                          <h3><?php echo e($data['title']); ?></h3>
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                            <li class="breadcrumb-item"><?php echo e($data['title']); ?> </li>
                          </ol>
                        </div>
                        
                        <div class="col-sm-6" style="justify-content: end; display: flex;">
                           <a href="<?php echo e(route('banner-create')); ?>" class="btn btn-primary">Add Banner</a>
                        </div>
                        
                      </div>
                    </div>
                     <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
                      <ul class="d-flex" >
                        <li ><a class="<?php if($type==''): ?> text-primary <?php else: ?> text-dark <?php endif; ?> " style="text-decoration: underline;" href="<?php echo e(route('banner-list')); ?>">Active (<?php echo e($data['active']); ?>)</a> </li>&nbsp; | &nbsp;
                        <li ><a class="<?php if($type=='Inactive'): ?> text-primary <?php else: ?> text-dark <?php endif; ?>"  style="text-decoration: underline;" href="<?php echo e(route('banner-list','Inactive')); ?>">Inactive ( <?php echo e($data['inactive']); ?>)</a></li>&nbsp; | &nbsp;
                        <li ><a class="<?php if($type=='Trashed'): ?> text-primary <?php else: ?> text-dark <?php endif; ?>"  style="text-decoration: underline;" href="<?php echo e(route('banner-list','Trashed')); ?>">Trashed ( <?php echo e($data['trashed']); ?>)</a></li>
                      </ul>
                    </div>
                  </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">

                    <table class="display data-table" >
                        <thead>
                          <tr>
                          <th style="width:43px">ID</th>
                            <th>Title</th>
                            
                            <th>Image</th>
                            <th>Type</th>
                            <th style="width:315px">Action</th>
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
                    {data: 'title', name: 'title'},
                    // {data: 'status', name: 'status'},
                    {data: 'image', name: 'image', orderable: false, searchable: false,},
                    {data: 'type', name: 'type'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,},
                ]
            });



		var table = $('.data-table').DataTable();




			$(document).on('click','.deleteButton', function(){

                var con = confirm("Are You Sure Want to Delete This Banner");

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

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/merarum/public_html/app/resources/views/admin/banner/banner.blade.php ENDPATH**/ ?>