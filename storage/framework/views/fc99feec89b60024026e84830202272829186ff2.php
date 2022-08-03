
<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/datatables.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                      </div>
                    </div>
                  </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">


                        <table class="mb-5">
                            
                            <tbody><tr>
                                <td>
                                 <input type="text" readonly="" id="search_fromdate" class="datepicker form-control hasDatepicker" placeholder="From date">
                                </td>

                                <td>
                                 <input type="text" readonly="" id="search_todate" class="datepicker form-control hasDatepicker" placeholder="To date">
                                </td>

                              <td>

                                <select class="form-control" name="status" id="status">
                                    
                                    <option value="">Select</option>
                                    <option value="BookOnline">Book Online</option>
                                    <option value="BookOffline">Book Offline</option>
                                </select>
                              </td>
                              <td>
                                 <button type="button" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Search" id="btn_search"> Search </button>
                              </td>
                            </tr>
                        </tbody>
                        
                    </table>
                        
                        

                    <table class="display data-table" >
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Owner Name</th>
                            <th>Unique Id</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Booking Date</th>
                            <th style="width:135px !important">Action</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
    
    $( ".datepicker" ).datepicker({format: "yyyy-mm-dd"});
    $( ".datepicker2" ).datepicker({format: "yyyy-mm-dd"});


    
    

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax : {
                    'url':"<?php echo e($data['url']); ?>",
                    'data': function(data){
                        // Read values
                        var from_date = $('#search_fromdate').val();
                        var to_date = $('#search_todate').val();
                        var status = $("#status option:selected").val();

                        // Append to data
                        data.status = status;
                        data.searchByFromdate = from_date;
                        data.searchByTodate = to_date;

                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'users.name', name: 'users.name'},
                    {data: 'hostelowner.name', name: 'hostelowner.name'},
                    {data: 'unique_id', name: 'unique_id'},
                    {data: 'payment_type', name: 'payment_type'},
                    {data: 'status', name: 'status'},
                    {data: 'booking_date', name: 'booking_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,},
                ]
            });


          // Search button
              $('#btn_search').click(function(){
        
                var $this = $('#btn_search');
                buttonLoading('loading', $this);
        
                table.draw();
        
                $(".payout-modalsss-bulk").removeClass('d-none');
        
                buttonLoading('reset', $this);
        
            });
            


			
			$(document).on('click','.deleteButton', function(){

                var con = confirm("Are You Sure Want to Delete This Booking");

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

    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1kpir9wdpln/public_html/meraroom/resources/views/admin/booking/booking.blade.php ENDPATH**/ ?>