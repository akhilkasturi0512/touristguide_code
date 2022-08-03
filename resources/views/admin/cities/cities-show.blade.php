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

                   <table class="display  data-table" >
                      <thead>
                        <tr>
                            <th scope="col" width="200" style="padding-bottom:90px">Name</th>
                            <th scope="col"  width="500" style="padding-bottom:90px">{{$business_cat->name}}</th>
                        </tr>
                        
                        <tr>
                            <th scope="col" width="200">Image</th>
                            <th><img width="200" src="{{asset($business_cat->image)}}" alt="" srcset=""></th>
                            
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
<script>

</script>
@stop
