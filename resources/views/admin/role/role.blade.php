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
                           <a href="{{route('role-create')}}" class="btn btn-primary">Add Role</a>
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
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,},
                ]
            });



			$(document).on('click','.deleteButton', function(){
			    var con = confirm('Are you sure want to delete this record');
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

        });
    </script>
@stop
