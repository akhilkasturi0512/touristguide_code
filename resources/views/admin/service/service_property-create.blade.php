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
    .pac-container{
        
        z-index:9999;
        
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

                                    <div class="tab-pane fade show active" id="info-home" role="tabpanel"
                                        aria-labelledby="info-home-tab">

                                        <form enctype="multipart/form-data" method="POST" class="theme-form d-flex" id="submitForm" action="{{ $data['url'] }}">
                                            @csrf
                                            <div class="col-sm-12 col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">

                                                        <div class="card">
                                                            <div class="card-body row">
                                                                

                                                                <div class="mb-3 col-md-3">
                                                                    <label class="col-form-label pt-0" for="title">Business Name</label>
                                                                    <input class="form-control" id="business_name" name="business_name" type="text" aria-describedby="" placeholder="Enter Business Name">
                                                                </div>


                                                                <div class="mb-3 col-md-3">
                                                                    <label class="form-label" for="businesscat_id">Business Category</label>
                                                                    <select class="form-select tags" id="businesscat_id" name="businesscat_id">
                                                                        <option value="">Select</option>
                                                                        @foreach ($business_cat as $item)
                                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>


                                                                <div class="mb-3 col-md-3">
                                                                    <label class="col-form-label pt-0" for="price">Price</label>
                                                                    <input class="form-control" id="price" name="price" type="text" aria-describedby="" placeholder="Enter price">
                                                                </div>
                                                                
                                                            
                                                                
                                                                <div class="mb-3 col-md-3">
                                                                  <label class="col-form-label pt-0" for="latitude">Latitude</label>
                                                                  <input class="form-control" id="latitude" name="latitude" type="text" aria-describedby="" placeholder="Enter latitude">
                                                                  
                                                                </div>
                                                                
                                                                <div class="mb-3 col-md-3">
                                                                  <label class="col-form-label pt-0" for="longitude">Longitude</label>
                                                                  <input class="form-control" id="longitude" name="longitude" type="text" aria-describedby="" placeholder="Enter Longitude">
                                                                </div>


                                                                

                                                                <div class="mb-3 col-md-3">
                                                                    <label class="col-form-label pt-0" for="address">Address</label>
                                                                    <textarea class="form-control" id="address" name="address" type="text" aria-describedby=""  placeholder="Enter Address"></textarea>
                                                                </div>
                                                                
                                                                
                                                                <div class="mb-3 col-md-3">
                                                                      <label class="col-form-label pt-0" for="title">States</label>
                                                                      <select id="state_id" name="state_id" onchange="getCities()" class="form-control tags">
                                                                          <option value="">Select States</option>
                                                                          @foreach($data['states'] as $key=>$vals)
                                                                            <option value="{{$vals->id}}">{{$vals->name}}</option>
                                                                          @endforeach
                                                                      </select>
                                                                </div>
                                                                
                                                                
                                                                <div class="mb-3 col-md-3">
                                                                      <label class="col-form-label pt-0" for="title">Cities</label>
    
                                                                      <select id="city_id" name="city_id" class="form-control tags">
                                                                         <option value="">Select Cities</option>
                                                                          @foreach($data['cities'] as $key=>$vals)
                                                                             <option value="{{$vals->id}}">{{$vals->name}}</option>
                                                                          @endforeach
                                                                          
                                                                      </select>
                                                                </div>
                                                                
                                                              
                                                                
                                                                 <div class="mb-3 col-md-3">
                                                                    <label class="col-form-label pt-0" for="image">Service Image</label>
                                                                    <input class="form-control" id="image" name="image" type="file" placeholder="image">
                                                                 </div>
                                                                 
                                                        


                                                                <div class="mb-3 col-md-12">
                                                                    <label class="col-form-label pt-0" for="description">Description</label>
                                                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                                                </div>

                                                                <input type="file" name="files[]" multiple>

                                                                <div class="mb-3">
                                                                    <label class="col-form-label pt-0"
                                                                        for="title">Status</label>
                                                                    <select class="form-select" id="status"
                                                                        name="status">
                                                                        <option value="">Select</option>
                                                                        <option value="1">Active</option>
                                                                        <option value="0">Inactive</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                
                                                                 
                                                                
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit"
                                                                        id="submitButton"
                                                                    data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..."
                                                                    data-rest-text="Save"
                                                                    class="btn btn-primary">Save</button>
            
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


     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Set Location</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
                   <div class="col-lg-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label"> Enter Location * </label>
                                    <input id="searchInput" class="form-control" name="location_address" id="location_address"  type="text" placeholder="Enter a location">
                                </div>
                    </div>
                                
                 <div id="map" style="height:400px;width:100%;"></div>                 
              </div>
              
               <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Save</button>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')


    <script src="{{ asset('admin/assets/js/editor/summernote/summernote.js') }}"></script>
    <script src="{{ asset('admin/assets/js/editor/summernote/summernote.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/jquery.fileuploader.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Elegant-Customizable-jQuery-PHP-File-Uploader-Fileuploader/js/custom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyARSV8negP1xdpSm1Sb-xBKgwVAzJ0dN3c&callback=initMap" async defer></script>
    <script type="text/javascript">

  var counter = 1;

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
 <script>
 
 
 
    
    function initMap() {
    
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 26.9124, lng: 75.7873},
      zoom: 14,
      mapTypeId: 'roadmap',
      streetViewControl: false,
      mapTypeControl: false,
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

     
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);

    
        console.log("Location :",place.formatted_address);
        console.log("latitude :",place.geometry.location.lat());
        console.log("longitude :",place.geometry.location.lng());
        
        document.getElementById('address').value = place.formatted_address;
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
    });
}

    
     
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






    <script type="text/javascript">
        var counter = 1;
        
        function getServiceableAreas(){
          
             $.ajax({
                    url: '{{ route('serviceable-areas') }}',
                    type: 'GET',
                    data: {
                        city_id: $("#city_id option:selected").val()
                    },
                   
                    success: function(data) {
                        console.log(data);
                        var html = "";
                        $.each(data.data,function(key,value){
                                html+=`<option  value='${value.city_id}'>${value.area}</option>`;
                        });
                        
                        $("#area_id").html(html);
                        
                    }
                });
            
        }
        
        
         
        function getServiceableLocation(){
            
             $.ajax({
                    url: '{{route('serviceable-location')}}',
                    data: {state_id:$("#state_id option:selected").val(),city_id:$("#city_id option:selected").val()},
                    success: function(data) {
                        var html = "";
                        $.each(data.data,function(key,value){
                                html+=`<option  value='${value.id}'>${value.area}</option>`;
                        });
                        
                        $("#location").html(html);
                        
                    }
                });
            
        }
    
        function addMoreData() {




            $(".copies-data").append(`

                  <div class="row copiesrow${counter}">
                      <div class="col-md-11" style="border: 1px solid #24695c; padding: 33px;">
                        <div class="row">
                            <div class="mb-6 col-md-6">
                                <label class="col-form-label pt-0" for="service_image${counter}">Service Image</label>
                                <input class="form-control" id="service_image${counter}" name="service_image[]" type="file" placeholder="Service Image">
                            </div>
                        </div>
                      </div>
            
                      <div class="col-md-1" style="border: 1px solid #24695c; padding: 33px;">
                        <br />
                        <button class="btn mt-2 btn-danger " type="button" onclick="removeData(${counter})"> <i class="fa fa-trash"></i> </button>
                      </div>
            
                    </div>

        `);

            $(".tagsmulti" + counter).select2();

            counter++;

        }

        function removeData(counter) {

            $(".copies-data .copiesrow" + counter).remove();
        }

        $(".tagsmulti0").select2();

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

                            
                            location.href=data.route;

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
    </script>
@stop
