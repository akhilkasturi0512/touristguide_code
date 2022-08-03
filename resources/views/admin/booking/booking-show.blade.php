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

                <div class="card-header pb-0">
                    <h5>{{ $data['title'] }}</h5>
                </div>
                
                <div class="card-body">

                  <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-ui-hostelOwner"></i>Booking Details</a></li>
                  </ul>
                  
                  <div class="tab-content" id="info-tabContent">

                    <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                      <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                                    <tr>
                                      <th scope="col" width="200">Booking ID</th>
                                      <th scope="col"  width="500">{{($booking->unique_id)?$booking->unique_id:''}}</th>
                                    </tr>
                                    
                                    <tr>
                                      <th scope="col" width="200">Booking Date</th>
                                      <th scope="col"  width="500">{{date('d M Y',strtotime($booking->booking_date))}}</th>
                                    </tr>
                                    
                                  
                                    <tr>
                                      <th scope="col" width="200">Booking Status</th>
                                      <th scope="col"  width="500">{{$booking->status}}</th>
                                    </tr>

                            </thead>
                            
                            
                        </table>

                      </div>

                    </div>
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
