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
                           <a href="<?php echo e(route('service_property-create')); ?>" class="btn btn-primary">Add Service Property</a>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
                      <ul class="d-flex" >
                        <li ><a class="<?php if($type==''): ?> text-primary <?php else: ?> text-dark <?php endif; ?> " style="text-decoration: underline;" href="<?php echo e(route('service_property-list')); ?>">Active (<?php echo e($data['active']); ?>)</a> </li>&nbsp; | &nbsp;
                        <li ><a class="<?php if($type=='Inactive'): ?> text-primary <?php else: ?> text-dark <?php endif; ?>"  style="text-decoration: underline;" href="<?php echo e(route('service_property-list','Inactive')); ?>">Inactive ( <?php echo e($data['inactive']); ?>)</a></li>&nbsp; | &nbsp;
                        <li ><a class="<?php if($type=='Trashed'): ?> text-primary <?php else: ?> text-dark <?php endif; ?>"  style="text-decoration: underline;" href="<?php echo e(route('service_property-list','Trashed')); ?>">Trashed ( <?php echo e($data['trashed']); ?>)</a></li>
                      </ul>
                    </div>
                  </div>

              </div>
              <div class="card-body">

                <table>
                  <tr>
                    <td style="width:230px;">
                      <label>Owners &nbsp;&nbsp;&nbsp;</label>
                        <select  id="owner_id" class="form-control">
                            <option value="">Select</option>
                            <?php $__currentLoopData = $data['owners_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($vals->id); ?>"><?php echo e($vals->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>

                    <td>&nbsp;&nbsp;&nbsp;</td>

                    <td  style="width:230px;">
                      <label>Category </label>
                        <select id="category_id" class="form-control">
                            <option value="">Select</option>
                              <?php $__currentLoopData = $data['owners_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vals->id); ?>"><?php echo e($vals->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>

                    
                    <td>&nbsp;&nbsp;&nbsp;</td>

                    
                    <td>

                      <button type='button' class="mt-4 btn btn-primary"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Search" id="btn_search"> Search </button>

                    </td>

                  </tr>
                </table>

                <br /><br />
                
                <div class="table-responsive">

                    <table class="table display data-table" >
                        <thead>
                          <tr>
                            <th width="50">ID</th>
                            <th width="100">Owner Name</th>
                            <th width="100">Business Name</th>
                            <th width="100">Business Category Name</th>
                            
                            <th width="100">State</th>
                            <th width="100">City</th>

                            <th width="100">Address</th>
                            
                            <th width="100">Min Price</th>
                            <th width="100">Max Price</th>
                            <th style="width:200px">Action</th>
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


            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e($data['url']); ?>",
                ajax : {
                    'url':"<?php echo e($data['url']); ?>",
                    'data': function(data){
                        // Read values
                        var owner_id = $('#owner_id').val();
                        var category_id = $('#category_id').val();
                        // Append to data
                        data.owner_id = owner_id;
                        data.category_id = category_id;
                    }
                },

                columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'hostelowner.name', name: 'hostelowner.name'},
                      {data: 'business_name', name: 'business_name'},
                      {data: 'businesscat.name', name: 'businesscat.name'},

                     {data: 'state_name', name: 'state_name'},
                      {data: 'city_name', name: 'city_name'},

                      {data: 'address', name: 'address'},

                      {data: 'min_price', name: 'min_price'},
                      {data: 'max_price', name: 'max_price'},
                      {data: 'action', name: 'action', orderable: false, searchable: false,},
                    ]
            });

       

			$(document).on('click','.deleteButton', function(){

                var con = confirm("Are You Sure Want to Delete This Service Property");

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

                var con = confirm("Are You Sure Want to Restore This Service Property");

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

      



          $('#btn_search').click(function(){

              var $this = $('#btn_search');
              buttonLoading('loading', $this);

              table.draw();

              buttonLoading('reset', $this);

          });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/merarum/public_html/app/resources/views/admin/service/service_property.blade.php ENDPATH**/ ?>