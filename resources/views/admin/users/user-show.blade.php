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
                    <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-ui-user"></i>Basic Details</a></li>
                 
                  </ul>
                  <div class="tab-content" id="info-tabContent">

                    <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col" width="200">Name</th>
                              <th scope="col"  width="500">{{$user->name}}</th>
                            </tr>
                            
                             <tr>
                              <th scope="col" width="200"style="padding-bottom:50px">Profile Image</th>
                              <th><img style="width:100px;height:100px" src="{{url($user->profile_image)}}"></th>
                            </tr>

                            <tr>
                              <th scope="col" width="200">E-mail</th>
                              <th scope="col"  width="500">{{$user->email}}</th>
                            </tr>

                            <tr>
                              <th scope="col" width="200">Mobile</th>
                              <th scope="col"  width="500">{{$user->mobile}}</th>
                            </tr>
                            
                            <tr>
                              <th scope="col" width="200">Raferal Id</th>
                              <th scope="col"  width="500">{{$user->referal_id}}</th>
                            </tr>

                            <tr>
                              <th scope="col" width="200">Status</th>
                              <th scope="col"  width="500">{!! ($user->status=='1')?'<span class="badge badge-success"> Active </span>':'<span class="badge badge-danger"> INActive </span>' !!}</th>
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
</div>
@stop
@section('pagejs')


<script>

 $(document).on('click','.removeBookmark', function(){

          dataID = $(this).attr("data-id");

          url = $(this).attr('data-url');

          var $this = $(this);

          buttonLoading('loading', $this);

          $.ajax({
              url: url,
              type: 'POST',
              data:{_token:'{{csrf_token()}}'},
              success: function(data){

                $(".bookmarkcol"+dataID).remove();

                successMsg('Bookmark', data.msg, '');

              }
        });

});

</script>
@stop
