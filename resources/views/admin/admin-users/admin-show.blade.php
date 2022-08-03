@extends('admin.layout.main')
@section('title')
<title>{{ $data['title'] }}</title>
@stop
@section('inlinecss')

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
              
                  {{-- <table class="display  data-table" >
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th> <img src="{{asset( $banner->image )}}" alt=""> </th>
                        </tr>

                        <tr>
                          <th>Title</th>
                          <th></th>
                        </tr>

                        <tr>
                          <th>Created At</th>
                          <th></th>
                        </tr>


                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table> --}}

              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
</div>
@stop
@section('pagejs')
<script>
 
</script>
@stop
