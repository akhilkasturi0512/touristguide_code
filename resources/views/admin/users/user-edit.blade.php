@extends('admin.layout.main')
@section('title')
<title>{{ $data['title'] }}</title>
@stop

@section('pagecss')


@stop

@section('breadcrum')

@stop

@section('content')


<div class="page-body">
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
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-xl-6">
          <div class="row">
            <div class="col-sm-12">
                <form  enctype="multipart/form-data" class="theme-form" id="submitForm" action="{{$data['url']}}">
                @csrf
              <div class="card">
                {{-- <div class="card-header pb-0">
                  <h5>Default Form Layout</h5><span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                </div> --}}
                <div class="card-body">

                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="name">Name</label>
                      <input class="form-control" id="name" name="name" type="text" aria-describedby="" value="{{$post->name}}" placeholder="Enter Name">
                    </div>


                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="email">Email</label>
                      <input class="form-control" id="email" name="email" type="text" aria-describedby="" value="{{$post->email}}" placeholder="Enter Email">
                    </div>


                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="name">Mobile</label>
                      <input class="form-control" id="mobile" name="mobile" type="text" aria-describedby="" value="{{$post->mobile}}" placeholder="Enter Mobile">
                    </div>

                         <div class="form-group ">
                            <label class="form-label">State *</label>
                            <select name="state_id"  id="state_id"    onchange="getCities('state_id','city_id')"  class=" form-control state_id">
                               <option value="">Select State</option>
                                @foreach($state as $state)
                                    <option {{ $post->state == $state->id ? 'selected' : '' }}  value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                         
                        </div>
                        
                        
    
                        <div class="form-group">
                           
                            <label class="form-label">City *</label>
                            <select name="city_id" id="city_id" class=" form-control city_id">
                            <option value="">Select City</option>
                            @foreach($cities as $city)
                                    <option {{ ($city->id==$post->city)?'selected':'' }}  value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach

                            </select>
                           
                        </div>

                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="title">Status</label>
                      <select class="form-select" id="status" name="status" >
                          <option value="">Select</option>
                          <option value="1" {{ ($post->status==1)?'selected':'' }}>Active</option>
                          <option value="0" {{ ($post->status==0)?'selected':'' }}>Inactive</option>
                        </select>
                    </div>


                    <div class="mb-3">

                      <label  class="col-form-label pt-0"> Image </label>

                      <div class="row">
                          <div class="col-md-10 ">
                              <input id="profile_image" type="file" class="form-control align-middle custom-file-input" name="profile_image" onchange="readURL(this, 'FileImg');">
                          </div>


                          <div class="col-md-2 ">
                            <img id="FileImg" src="{{url($post->profile_image)}}"  style="width: 71px;height: 71px">
                          </div>
                      </div>

                  </div>


                </div>
                <div class="card-footer">
                  <button   type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Update</button>
                   <a  href= "{{route('user-list')}}" class="btn btn-secondary">Cancel</a>
         
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>

@endsection

@section('pagejs')

<script src="{{asset('admin/assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('admin/assets/js/dropzone/dropzone-script.js')}}"></script>

<script type="text/javascript">
        $(function () {

           $('#submitForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
                        var btn = '<a href="{{route('user-list')}}" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create User', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create User', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create User', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
    
    <script type="text/javascript">

    
   
   
    </script>
@stop
