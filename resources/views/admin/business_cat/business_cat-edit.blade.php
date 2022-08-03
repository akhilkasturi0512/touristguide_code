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
                      <label class="col-form-label pt-0" for="title">Name</label>
                      <input class="form-control" id="name" name="name" type="text" aria-describedby="" value="{{$post->name}}" placeholder="Enter Name">
                    </div>


                   <div class="mb-3">
                      <label class="col-form-label pt-0" for="image">Image</label>
                      <input class="form-control" id="image" name="image"  type="file" placeholder="Image">
                    </div>

                    <div class="mb-3">
                     
                        @if($post->image)
                            <img width="200" src="{{asset($post->image)}}" alt="" srcset="">
                        @endif
                    </div>

                </div>
                <div class="card-footer">
                  <button  id="submitButton" type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>
                  <a href="{{route('business_cat-list')}}" class="btn btn-secondary">Cancel</a>
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
                        var btn = '<a href="{{route('business_cat-list')}}" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Edit Business category list', data.msg, btn);
                        setTimeout(function() {
                            window.location.href = "{{route('business_cat-list')}}";
                            }, 3000);

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Edit Business category list', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Edit Business category list', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
@stop
