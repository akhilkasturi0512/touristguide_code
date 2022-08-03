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
              
                  <table class="display table data-table" >
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th>{{$srm->company_select}}</th>
                        </tr>

                        <tr>
                          <th>Brand</th>
                          <th>{{$srm->company_name}}</th>
                        </tr>
                        
                        <tr>
                          <th>Contact No</th>
                          <th>{{$srm->contact_no}}</th>
                        </tr>
                        
                        
                        <tr>
                          <th>Firm Name</th>
                          <th>{{$srm->firm_name}}</th>
                        </tr>
                        
                        <tr>
                          <th>Reason for return</th>
                          <th>{{$srm->reason_for_return}}</th>
                        </tr>
                        
                        @if($srm->reason_for_return == 'Goods to be shipped to another dealer')
                        
                        <tr>
                          <th>Dealer Name</th>
                          <th>{{$srm->another_dealer_name}}</th>
                        </tr>
                        
                        @endif
                        
                        <tr>
                          <th>Any other problem</th>
                          <th>{{$srm->other_problem}}</th>
                        </tr>
                        
                        @if($srm->other_problem == 'Yes')
                        <tr>
                          <th>Problem</th>
                          <th>{{$srm->problem}}</th>
                        </tr>

                       @endif
                       
                       <tr>
                          <th>Bill Copy</th>
                        
                          <th><img style="height:100px;width:100px" src="{{asset($srm->bill_copy)}}">
                          @if($srm->bill_copy)
                          <form method="GET">
                                <button type='submit' name="type" value="downloadbillcopy"> <i class="fa fa-download" aria-hidden="true"></i> </button>
                           </form>
                           @endif
                           </th>
                        </tr>
                        
                        <tr>
                          <th>अगर माल लोकल डीलर से आ रहा है तो डीलर के लेटर हेड की कॉपी अपलोड करें  अन्यथा डीलर से बिल लेकर उसकी कॉपी अपलोड करे |</th>
                          <th><img style="height:100px;width:100px" src="{{asset($srm->dealer_copy)}}">
                          @if($srm->dealer_copy)
                          <form method="GET">
                                <button type='submit' name="type" value="downloaddealercopy"> <i class="fa fa-download" aria-hidden="true"></i> </button>
                           </form>
                           @endif
                           </th>
                        </tr>
                        
                        <tr>
                          <th>अगर माल 50,000 से ऊपर का है तो इ वे बिल की कॉपी अपलोड करें |</th>
                          <th><img style="height:100px;width:100px" src="{{asset($srm->above_limit)}}">
                          @if($srm->above_limit)
                           <form method="GET">
                                <button type='submit' name="type" value="downloadabovelimt"> <i class="fa fa-download" aria-hidden="true"></i> </button>
                           </form>
                           @endif
                         </th>
                        </tr>
                        
                        <tr>
                          <th>ट्रांसपोर्ट से मिली हुई GR की फोटो अपलोड करें |</th>
                          
                          <th><img style="height:100px;width:100px" src="{{asset($srm->transport_copy)}}">
                         @if($srm->transport_copy)
                          <form method="GET">
                                <button type='submit' name="type" value="downloadtransportcpy"> <i class="fa fa-download" aria-hidden="true"></i> </button>
                           </form>
                           @endif
                           </th>
                        </tr>
                        
                        
                        <tr>
                          <th>किसके कहने पर सेल्स रिटर्न की जा रही है |</th>
                          <th>{{$srm->sales_return}}</th>
                        </tr>
                        
                        <tr>
                          <th>आप टोटल कितने यूनिट रिटर्न कर रहें है |</th>
                          <th>{{$srm->unit_return}}</th>
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
@stop
@section('pagejs')
<script>
 
</script>
@stop
