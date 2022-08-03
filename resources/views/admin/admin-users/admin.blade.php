@extends('admin.layout.main')
@section('title')
<title>{{ $data['title'] }}</title>
@stop
@section('pagecss')
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/datatables.css')}}">
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
                        <div class="col-sm-6" style="justify-content: end; display: flex;">
                           <a href="{{route('admin-create')}}" class="btn btn-primary">Add Admin</a>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
                      <ul class="d-flex" >
                        <li ><a class="@if($type=='') text-primary @else text-dark @endif " style="text-decoration: underline;" href="{{route('admin-list')}}">Active ({{ $data['active'] }})</a> </li>&nbsp; | &nbsp;
                        <li ><a class="@if($type=='Inactive') text-primary @else text-dark @endif"  style="text-decoration: underline;" href="{{route('admin-list','Inactive')}}">Inactive ( {{ $data['inactive'] }})</a></li>&nbsp; | &nbsp;
                        <li ><a class="@if($type=='Trashed') text-primary @else text-dark @endif"  style="text-decoration: underline;" href="{{route('admin-list','Trashed')}}">Trashed ( {{ $data['trashed'] }})</a></li>
                      </ul>
                    </div>
                  </div>
                  
              </div>
              <div class="card-body">
                <div class="table-responsive">
                
                    <table class="display data-table" >
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>

                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
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


@stop
@section('pagejs')
<script src="{{asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/datatable/datatables/datatable.custom.js')}}"></script>


    <script type="text/javascript">
        $(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ $data['url'] }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'profile_image', name: 'profile_image'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,},
                ]
            });



			$(document).on('click','.deleteButton', function(){
			    var con = confirm('Are you sure want to Delete this record');
			    if(con)
			    {
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
			    else{
			         event.preventDefault();
                        return false;
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
                        data:{_token:'{{csrf_token()}}'},
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
@stop
