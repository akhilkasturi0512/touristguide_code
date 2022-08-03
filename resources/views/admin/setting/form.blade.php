
  <div class="card">
    <div class="card-body row">

        <!--<div class="mb-3">-->
        <!--    <label class="col-form-label pt-0" for="site_logo">Site Logo</label>-->
        <!--    <input class="form-control" value="{{ (isset($setting)?$setting->site_logo:'')}}" id="site_logo" name="site_logo" type="file" aria-describedby="">-->
        <!--</div>-->

        <!--<div class="mb-3">-->
        <!--    <label class="col-form-label pt-0" for="site_name">Site Name</label>-->
        <!--    <input class="form-control" value="{{ (isset($setting)?$setting->site_name:'')}}" id="site_name" name="site_name" type="text" aria-describedby="">-->
        <!--</div>-->
        
        <!--<div class="mb-3">-->
        <!--    <label class="col-form-label pt-0" for="crm_time">CRM Time</label>-->
        <!--    <input class="form-control" value="{{ (isset($setting)?$setting->crm_time:'')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="crm_time" name="crm_time" type="text" aria-describedby="">-->
        <!--</div>-->
        
        <!--<div class="mb-3">-->
        <!--    <label class="col-form-label pt-0" for="billing_time">Billing Time</label>-->
        <!--    <input class="form-control" value="{{ (isset($setting)?$setting->billing_time:'')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="billing_time" name="billing_time" type="text" aria-describedby="">-->
        <!--</div>-->
        
        <!--<div class="mb-3">-->
        <!--    <label class="col-form-label pt-0" for="dispatch_time">Dispatch Time</label>-->
        <!--    <input class="form-control" value="{{ (isset($setting)?$setting->dispatch_time:'')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="dispatch_time" name="dispatch_time" type="text" aria-describedby="">-->
        <!--</div>-->
        
        <div class="mb-3">
            <label class="col-form-label pt-0" for="commision">Commision</label>
            <input class="form-control" value="{{ (isset($setting)?$setting->commision:'')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="commision" name="commision" type="text" aria-describedby="">
        </div>
        
    </div>
    <div class="card-footer">
      <button  id="submitButton"  type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save" class="btn btn-primary">Save</button>

    </div>
  </div>
