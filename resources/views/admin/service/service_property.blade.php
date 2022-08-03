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
                           <a href="{{route('service_property-create')}}" class="btn btn-primary">Add Property</a>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
                      <ul class="d-flex" >
                        <li ><a class="@if($type=='') text-primary @else text-dark @endif " style="text-decoration: underline;" href="{{route('service_property-list')}}">Active ({{ $data['active'] }})</a> </li>&nbsp; | &nbsp;
                        <li ><a class="@if($type=='Inactive') text-primary @else text-dark @endif"  style="text-decoration: underline;" href="{{route('service_property-list','Inactive')}}">Inactive ( {{ $data['inactive'] }})</a></li>&nbsp; | &nbsp;
                        <li ><a class="@if($type=='Trashed') text-primary @else text-dark @endif"  style="text-decoration: underline;" href="{{route('service_property-list','Trashed')}}">Trashed ( {{ $data['trashed'] }})</a></li>
                      </ul>
                    </div>
                  </div>

              </div>
              <div class="card-body">

                <table>
                  <tr>

                    <td>&nbsp;&nbsp;&nbsp;</td>

                    <td  style="width:230px;">
                      <label>Category </label>
                        <select id="category_id" class="form-control">
                            <option value="">Select</option>
                              @foreach($data['owners_category'] as $key=>$vals)
                                <option value="{{$vals->id}}">{{$vals->name}}</option>
                              @endforeach
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
                            <th width="100">Business Name</th>
                            <th width="100">Category Name</th>
                            
                            <th width="100">State</th>
                            <th width="100">City</th>

                            <th width="100">Address</th>
                            
                          
                            <th width="100">Price</th>
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


@stop
@section('pagejs')
<script src="{{asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/datatable/datatables/datatable.custom.js')}}"></script>


    <script type="text/javascript">


            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ $data['url'] }}",
                ajax : {
                    'url':"{{ $data['url'] }}",
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
                      {data: 'business_name', name: 'business_name'},
                      {data: 'category.name', name: 'category.name'},

                     {data: 'state_name', name: 'state_name'},
                      {data: 'city_name', name: 'city_name'},

                      {data: 'address', name: 'address'},

                      {data: 'price', name: 'price'},
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
                        data:{_token:'{{csrf_token()}}'},
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
                        data:{_token:'{{csrf_token()}}'},
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
@stop
