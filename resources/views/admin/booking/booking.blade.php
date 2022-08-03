@extends('admin.layout.main')
@section('title')
<title>{{ $data['title'] }}</title>
@stop
@section('pagecss')
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/datatables.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop
@section('breadcrum')

@stop
@section('content')


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
                          <h3>{{ $data['title'] }}</h3>
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">{{ $data['title'] }} </li>
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

                              <!--<td>-->

                              <!--  <select class="form-control" name="status" id="status">-->
                                    
                              <!--      <option value="">Select</option>-->
                              <!--      <option value="BookOnline">Book Online</option>-->
                              <!--      <option value="BookOffline">Book Offline</option>-->
                              <!--  </select>-->
                              <!--</td>-->
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
    
                            <th>Unique Id</th>
                       
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



<div class="modal fade bd-example-modal-lg" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        
        <form method="POST" id="updateModal">
            @csrf
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Update Booking</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  
                  <div class="modal-body">
                     
                     <div class="form-group">
                         <label>Transaction ID</label>
                         <input type="text" class="form-control" name="transaction_id" id="transaction_id" />
                     </div>  
                     
                  </div>
                  
                   <div class="modal-footer">
                    
                    <button class="btn btn-secondary" id="submitButton"  type="submit">Save</button>
                    
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                  </div>
                </div>
        
        </form>
                
    </div>
</div>

@stop
@section('pagejs')
<script src="{{asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
    
    $( ".datepicker" ).datepicker({format: "yyyy-mm-dd"});
    $( ".datepicker2" ).datepicker({format: "yyyy-mm-dd"});


    
    

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax : {
                    'url':"{{ $data['url'] }}",
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
                   
                    {data: 'unique_id', name: 'unique_id'},
                  
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
            



        	$(document).on('click','.updateButton', function(){
               
               $("#updateModal").attr("action",$(this).attr('data-url'));
               
               $("#modalUpdate").modal("show");
               
            });
            
            
            
            
            $('#updateModal').submit(function(){
                    var $this = $('#submitButton');
                    buttonLoading('loading', $this);
                    $('.is-invalid').removeClass('is-invalid state-invalid');
                    $('.invalid-feedback').remove();
                    $.ajax({
                        url: $('#updateModal').attr('action'),
                        type: "POST",
                        processData: false,  // Important!
                        contentType: false,
                        cache: false,
                        data: new FormData($('#updateModal')[0]),
                        success: function(data) {
                            if(data.status){
                                var btn = '';
                                successMsg('Create Category', data.msg, btn);
                                $('#updateModal')[0].reset();
        
                            }else{
                                $.each(data.errors, function(fieldName, field){
                                    $.each(field, function(index, msg){
                                        $('#'+fieldName).addClass('is-invalid state-invalid');
                                       errorDiv = $('#'+fieldName).parent('div');
                                       errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                                    });
                                });
        						errorMsg('Create Category', 'Input Error');
                            }
                            buttonLoading('reset', $this);
        
                        },
                        error: function() {
                            errorMsg('Create Category', 'There has been an error, please alert us immediately');
                            buttonLoading('reset', $this);
                        }
        
                    });
        
                    return false;
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
                        data:{_token:'{{csrf_token()}}'},
                        success: function(data){
                          row.remove();
                        }
                    });

                }

            });

    
    </script>
@stop
