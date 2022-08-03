@extends('admin.layout.main')
@section('title')
<title>{{ $data['title'] }}</title>
@stop

@section('pagecss')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <div class="card-body">
                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="title">Cities : {{$post->name}}</label>
                    </div>
                    
                    <div class="mb-3">
                      <label class="col-form-label pt-0" for="title">Image</label>
                      <input type="file" name="image" id="image" class="form-control" /> <br />
                     
                        @if($post->image)
                            
                            <img src="{{asset($post->image)}}" style="    width: 64px;" />
                            
                        @endif
                                         
                    </div>
                    

                    
                    
                    
                    @if(count($data['areas']) > 0)
                   
                        
                        @foreach($data['areas'] as $key=>$vals)
                            <div class="row" >
                                <div class="mb-3 col-md-10">
                                    <div class="form-group">
                                        <label>Areas</label>
                                        <input type="text"  class="form-control" name="areas[]" value="{{$vals->area}}"/>
                                    </div>
                                </div>
                                    </div>
                        @endforeach
                    @endif
                    
                      <div class="areass">
                        <div class="row">
                            <div class="mb-3 col-md-10">
                                <div class="form-group">
                                    <label>Areas</label>
                                    <input type="text" id="areas-{{count($data['areas'])}}" class="form-control" name="areas[]"/>
                                </div>
                            </div>
    
                            <div class="mb-3 col-md-2">
                                <div class="form-group">
                                    <button type="button" onclick="addMore()" class=" mt-4 btn btn-primary"> 
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
                

                <div class="card-footer">
                  
                  <button  id="submitButton" type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Update</button>
                  <a  href= "{{route('cities-list')}}" class="btn btn-secondary">Cancel</a>
                </div>

              </div>
              
                <input type="hidden" name="city_id" id="city_id" value="{{$post->city_id}}"/>
                <input type="hidden" name="state_id" id="state_id" value="{{$post->state_id}}"/>
               
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
        
         @if(count($data['areas']) > 0)
         var counter = 0;
         @else
         var counter = count($data['areas']);
         @endif
        function addMore(){
                counter++;
            $(".areass").append(`
                    <div class="row" id="row${counter}">
                         <div class="mb-3 col-md-10">
                            <div class="form-group">
                                <label>Areas</label>
                                <input type="text" class="form-control " id="areas.${counter}" name="areas[]"/>
                            </div>
                        </div>
            
                        <div class="mb-3 col-md-1">
                            <div class="form-group">
                                <button type="button" onclick="removeThis(${counter})" class="mt-4 btn btn-danger btn-circle btn-sm"> 
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
            `);
        
        }
        
        
            
        function removeThis(counter){
            $("#row"+counter).remove();
        }
        
    
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
                            window.location.href = "{{route('cities-list')}}";
                            }, 3000);

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                console.log(fieldName.replace(".","-"));
                                $('#'+fieldName.replace(".","-")).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName.replace(".","-")).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg.replace(index," ")+'</div>');
                            });
                        });
						errorMsg('Create Business_category', 'Input Error');
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
      
      
      
        $(".states").select2();
      
      
    $(".js-data-example-ajax").on('change',function(){
     
         var data = $(this).select2('data')
    
            $("#city_id1").val(data[0].id);
            $("#city_name").val(data[0].text);

    });
     
     
    $('.js-data-example-ajax').select2({
          ajax: {
            url: '{{route('get-serviceable')}}',
            data: function (params) {
              var query = {
                search: params.term,
                state_id: $("#state_id option:selected").val()
              }
        
              // Query parameters will be ?search=[term]&type=public
              return query;
            }
          }
    });
    
 
    
    </script>
@stop
