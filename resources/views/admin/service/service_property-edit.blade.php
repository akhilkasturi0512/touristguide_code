@extends('admin.layout.main')
@section('title')
<title>{{ $data['title'] }}</title>
@stop

@section('pagecss')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/summernote.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css"
integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link
href="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/jquery.fileuploader.css"
rel="stylesheet" />
<link
href="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/css/jquery.fileuploader-theme-dragdrop.css"
rel="stylesheet" />

<style>
@import url(https://fonts.googleapis.com/icon?family=Material+Icons);
@import url("https://fonts.googleapis.com/css?family=Raleway");
    .wrapper {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-items: center;
}

h1 {
  font-family: inherit;
  margin: 0 0 0.75em 0;
  color: #728c8d;
  text-align: center;
}

.box {
  display: block;
  min-width: 300px;
  height: 300px;
  margin: 10px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  overflow: hidden;
}

.upload-options {
  position: relative;
  height: 75px;
  background-color: cadetblue;
  cursor: pointer;
  overflow: hidden;
  text-align: center;
  transition: background-color ease-in-out 150ms;
}
.upload-options:hover {
  background-color: #7fb1b3;
}
.upload-options input {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.upload-options label {
  display: flex;
  align-items: center;
  width: 100%;
  height: 100%;
  font-weight: 400;
  text-overflow: ellipsis;
  white-space: nowrap;
  cursor: pointer;
  overflow: hidden;
}
.upload-options label::after {
  content: "add";
  font-family: "Material Icons";
  position: absolute;
  font-size: 2.5rem;
  color: #e6e6e6;
  top: calc(50% - 2.5rem);
  left: calc(50% - 1.25rem);
  z-index: 0;
}
.upload-options label span {
  display: inline-block;
  width: 50%;
  height: 100%;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  vertical-align: middle;
  text-align: center;
}
.upload-options label span:hover i.material-icons {
  color: lightgray;
}

.js--image-preview {
  height: 225px;
  width: 100%;
  position: relative;
  overflow: hidden;
  background-image: url("");
  background-color: white;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}
.js--image-preview::after {

  font-family: "Material Icons";
  position: relative;
  font-size: 4.5em;
  color: #e6e6e6;
  top: calc(50% - 3rem);
  left: calc(50% - 2.25rem);
  z-index: 0;
}
.js--image-preview.js--no-default::after {
  display: none;
}
.js--image-preview:nth-child(2) {
  background-image: url("http://bastianandre.at/giphy.gif");
}

i.material-icons {
  transition: color 100ms ease-in-out;
  font-size: 2.25em;
  line-height: 55px;
  color: white;
  display: block;
}

.drop {
  display: block;
  position: absolute;
  background: rgba(95, 158, 160, 0.2);
  border-radius: 100%;
  transform: scale(0);
}

.animate {
  -webkit-animation: ripple 0.4s linear;
          animation: ripple 0.4s linear;
}

@-webkit-keyframes ripple {
  100% {
    opacity: 0;
    transform: scale(2.5);
  }
}

@keyframes ripple {
  100% {
    opacity: 0;
    transform: scale(2.5);
  }
}
</style>
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">{{ $data['title'] }} </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="info-home-tab"
                                        data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home"
                                        aria-selected="true"><i class="icofont icofont-home"></i>Property Details</a></li>
                    
                                </ul>
                                
                                <div class="tab-content" id="info-tabContent">

                                    <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">

                                        <form enctype="multipart/form-data" class="theme-form d-flex" id="submitForm" action="{{ $data['url'] }}">
                                                @csrf
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12">
            
                                                            <div class="card">
                                                                <div class="card-body row">
                                                        
            
                                                                    <div class="mb-3 col-md-3">
                                                                        <label class="col-form-label pt-0" for="title">Business Name</label>
                                                                        <input class="form-control" id="business_name" name="business_name" value="{{ $post->business_name }}" type="text" aria-describedby="" placeholder="Enter Business Name">
                                                                    </div>
            
                                                                    <div class="mb-3 col-md-3">
            
                                                                        <label class="form-label"
                                                                        for="businesscat_id">Business Category</label>
                                                                        <select class="form-select" id="businesscat_id"
                                                                        name="businesscat_id">
                                                                        @foreach ($business_cat as $item)
                                                                            <option
                                                                                {{ $post->businesscat_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                                                                                {{ $item->name }}
                                                                            </option>
                                                                        @endforeach
                                                                        </select>
                                                                    </div>
            
            
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0"
                                                                for="title">Minimum Price</label>
                                                                <input class="form-control"
                                                                value="{{$post->min_price}}" id="min_price" name="min_price"
                                                                type="text" aria-describedby=""
                                                                placeholder="Enter minimum price">
                                                            </div>
            
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0"
                                                                for="title">Maximum Price</label>
                                                                <input class="form-control"
                                                                value="{{ $post->max_price }}" id="max_price" name="max_price"
                                                                type="text" aria-describedby=""
                                                                placeholder="Enter maximum price">
                                                            </div>
            
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0" for="latitude">Latitude</label>
                                                                <input class="form-control" value="{{ $post->latitude }}" id="latitude" name="latitude" type="text" aria-describedby="" placeholder="Enter latitude">
                                                            </div>
            
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0" for="longitude">Longitude</label>
                                                                <input class="form-control" value="{{ $post->latitude }}" id="longitude" name="longitude" type="text" aria-describedby="" placeholder="Enter Longitude">
                                                            </div>
            
            
                                                            <div class="mb-3 col-md-3">
                                                                <label class="col-form-label pt-0"
                                                                for="address">Address</label>
                                                                <input class="form-control"
                                                                value="{{ $post->address }}" id="address"
                                                                name="address" type="text" aria-describedby=""
                                                                placeholder="Enter Address">
                                                            </div>
                                                            
                                                              <div class="mb-3 col-md-3">
                                                                  <label class="col-form-label pt-0" for="title">States</label>
                                                                  <select id="state_id" name="state_id" class="form-control tags" onchange="getCities()">
                                                                      <option value="">Select States</option>
                                                                      @foreach($data['states'] as $key=>$vals)
                                                                        <option {{ ($post->state==$vals->id)?'selected':'' }} value="{{$vals->id}}">{{$vals->name}}</option>
                                                                      @endforeach
                                                                  </select>
                                                            </div>
                                                            
                                                            <div class="mb-3 col-md-3">
                                                              <label class="col-form-label pt-0" for="title">Cities</label>
                                                              <select id="city_id" name="city_id" class="form-control tags">
                                                                 <option value="">Select Cities</option>
                                                                   @foreach($data['cities'] as $key=>$vals)
                                                                        <option {{ ($post->city==$vals->id)?'selected':'' }} value="{{$vals->id}}">{{$vals->name}}</option>
                                                                    @endforeach
                                                              </select>
                                                            </div>
                                                            
                                                            
                                                             
            
                                                            <div class="mb-3 col-md-6">
                                                                <label class="col-form-label pt-0" for="image">Service Image</label>
                                                                <input class="form-control" id="image" name="image" type="file" placeholder="image">
                                                            </div>
                                                            
                                                            <div class="mb-3 col-md-6">
                                                                
                                                                
                                                            </div>
                                                            
            
                    
            
                                                            <div class="mb-3 col-md-12">
                                                                 
                                                                 <label class="col-form-label pt-0" for="description">Description</label>
                                                                 
                                                                 <textarea class="form-control" name="description" cols="30" rows="10">{{$post->description}}</textarea>
                                                                 
                                                                 <!--<input class="form-control" type="text" id="description" name="description"  value="{{$post->description}}" placeholder="Enter Description">-->
            
                                                            </div>
            
                                                            <input type="file" name="files[]" multiple>
            
            
                                                
                                                                            
                                                            </div>
                                                            <div class="card-footer">
                                                                <button id="submitButton" type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Update</button>
                                                                
                                                                  <a  href= "{{route('service_property-list')}}" class="btn btn-secondary">Cancel</a>
                                                                <center>
                                                                      
                                                                   
                                                                      
                                                                    
                                                                </center>
                                                                {{-- <button class="btn btn-secondary">Cancel</button> --}}
                                                            </div>
                                                        </div>
            
                                                    </div>
                                                </div>
                                </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection

@section('pagejs')

<script src="{{ asset('admin/assets/js/editor/summernote/summernote.js') }}"></script>
<script src="{{ asset('admin/assets/js/editor/summernote/summernote.custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('admin/assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://www.khiladys.com/public/admin/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://www.khiladys.com/public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/jquery.fileuploader.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/js/custom.js"></script>

<script>

        

       $(document).ready(() => {
          let url = location.href;

          if (location.hash) {
            const hash = url.split("#");
            $('a[href="#'+hash[1]+'"]').tab("show");
            url = location.href.replace(/\/#/, "#");
            history.replaceState(null, null, url);
            setTimeout(() => {
              $(window).scrollTop(0);
            }, 400);
          }

          $('a[data-bs-toggle="pill"]').on("click", function() {
            let newUrl;
            const hash = $(this).attr("href");
            if(hash == "#home") {
              newUrl = url.split("#")[0];
            } else {
              newUrl = url.split("#")[0] + hash;
            }
            newUrl += "";
            history.replaceState(null, null, newUrl);
          });
    });

    const anchor = window.location.hash;
    $(`a[href="${anchor}"]`).tab('show')

    $('input[name="files[]"]').fileuploader({
        changeInput: '<div class="fileuploader-input">' +
            '<div class="fileuploader-input-inner">' +
                '<img src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/images/fileuploader-dragdrop-icon.png">' +
                '<h3 class="fileuploader-input-caption"><span>Drag and drop files here</span></h3>' +
                '<p>or</p>' +
                '<div class="fileuploader-input-button"><span>Browse Files</span></div>' +
                '</div>' +
                '</div>',
                theme: 'dragdrop',

                captions: {
                    feedback: 'Drag and drop files here',
                    feedback2: 'Drag and drop files here',
                    drop: 'Drag and drop files here'
                },

                limit: 20,
                maxSize: 50,

                addMore: true,
                thumbnails: {
                    onImageLoaded: function(item) {

                      
                    }

                }
            });
        </script>


       <script>
            function initImageUpload(box) {
              let uploadField = $(box).prop("files")[0];
              let currentid = $(box).attr('data-id');
              
                  checkType(uploadField,currentid);           
            }
            
            function checkType(file,currentid){
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                  throw 'Datei ist kein Bild';
                } else if (!file){
                  throw 'Kein Bild gewählt';
                } else {
                  previewImage(file,currentid);
                }
            }
            
              function previewImage(file,currentid){
                let thumb = $('.js--image-preview-data'+currentid);
                    console.log(thumb);
                    reader = new FileReader();
            
                reader.onload = function() {
                     $('.js--image-preview-data'+currentid).css('background-image', 'url(' + reader.result + ')');
                }
                reader.readAsDataURL(file);
                $('.js--image-preview-data'+currentid).addClass('js--no-default');
              }

            function removeData(counter) {

                $(".copies-data .copiesrow" + counter).remove();
            }

        

            $(function() {

                $('.tags').select2();

                        $('#submitForm').submit(function() {
                            var $this = $('#submitButton');
                            buttonLoading('loading', $this);
                            $('.is-invalid').removeClass('is-invalid state-invalid');
                            $('.invalid-feedback').remove();
                            $.ajax({
                                url: $('#submitForm').attr('action'),
                                type: "POST",
                                processData: false, // Important!
                                contentType: false,
                                cache: false,
                                data: new FormData($('#submitForm')[0]),
                                success: function(data) {
                                    if (data.status) {
                                        var btn =
                                        '<a href="{{ route('service_property-list') }}" class="btn btn-info btn-sm">GoTo List</a>';
                                        successMsg('Create Category', data.msg, btn);
                                        $('#submitForm')[0].reset();
                                        setTimeout(function() {
                            window.location.href = "{{route('service_property-list')}}";
                            }, 3000);

                                    } else {
                                        
                                        
                                        $.each(data.errors, function(fieldName, field) {
                                            $.each(field, function(index, msg) {
                                                $('#' + fieldName).addClass(
                                                'is-invalid state-invalid');
                                                errorDiv = $('#' + fieldName).parent('div');
                                                errorDiv.append(
                                                '<div class="invalid-feedback">' +
                                                    msg + '</div>');
                                                });
                                            });
                                            
                                            if(data.errors.room_images.length>0){
                                                $(".bd-example-modal-lg").modal("show");
                                            }
                                            
                                            errorMsg('Create Category', 'Input Error');
                                        }
                                        
                                        
                                        buttonLoading('reset', $this);

                                    },
                                    error: function() {
                                        errorMsg('Create Category',
                                        'There has been an error, please alert us immediately');
                                        buttonLoading('reset', $this);
                                    }

                                });

                                return false;
                            });

        });
        
        
        
    function getCities(){
        
        var state_id = $("#state_id option:selected").val();
        
         $.ajax({
                url: '{{route('get-Cities')}}',
                type: "GET",
                data: {state_id:state_id},
                success: function(data) {
                    var html = '';
                    
                    $.each(data.data, function(key, value){
                        
                        $("#city_id").append(` <option value="${value.id}">${value.name}</option> `);

                    });
                     
                     //$("#city_id").append(html);
                     
                     
                },
                error: function() {

                }

            });
        
    }
</script>
@stop