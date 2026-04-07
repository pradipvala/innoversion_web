

@extends('admin.layouts.app')

@push('url_title') Sub Franchise Details  @endpush





@push('content')


@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif


<div class="content">
    <div class="row ">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              
                <div class="form-group">
                    <div class="col-sm-3">
                      <label><b>Business name</b> :- </label>
                        {{ isset($sub_franchise->business_name) &&!empty($sub_franchise->business_name)?$sub_franchise->business_name:NULL;}}
                    </div>

                    <div class="col-sm-3">
                      <label><b>Franchise name</b> :- </label>
                        {{ isset($sub_franchise->franchise_name) &&!empty($sub_franchise->franchise_name)?$sub_franchise->franchise_name:NULL;}}
                    </div>

                    <div class="col-sm-3">
                      <label><b>Gst no.</b> :- </label>
                        {{ isset($sub_franchise->gst_no) &&!empty($sub_franchise->gst_no)?$sub_franchise->gst_no:NULL;}}
                    </div>

                    <div class="col-sm-3">
                      <label><b>Contact No.</b> :- </label>
                        {{ isset($sub_franchise->contact_no) &&!empty($sub_franchise->contact_no)?$sub_franchise->contact_no:NULL;}}
                    </div>
                </div>

                
                <div class="form-group">
                  <div class="col-sm-3">
                    <label><b>Email Address</b> :- </label>
                      {{ isset($sub_franchise->email) &&!empty($sub_franchise->email)?$sub_franchise->email:NULL;}}
                  </div>

                  <div class="col-sm-3">
                    <label><b>Country</b> :- </label>
                      {{ isset($country->country_name) &&!empty($country->country_name)?$country->country_name:NULL;}}
                  </div>

                  <div class="col-sm-3">
                    <label><b>State</b> :- </label>
                      {{ isset($state->state) &&!empty($state->state)?$state->state:NULL;}}
                  </div>

                  <div class="col-sm-3">
                    <label><b>City</b> :- </label>
                      {{ isset($city->c_name) &&!empty($city->c_name)?$city->c_name:NULL;}}
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-3">
                    <label><b>Contact Person Name</b> :- </label>
                      {{ isset($sub_franchise->contact_person) &&!empty($sub_franchise->contact_person)?$sub_franchise->contact_person:NULL;}}
                  </div>

                  <div class="col-sm-3">
                    <label><b>Pan Card no.</b> :- </label>
                      {{ isset($sub_franchise->pan_no) &&!empty($sub_franchise->pan_no)?$sub_franchise->pan_no:NULL;}}
                  </div>

                  <div class="col-sm-3">
                    <label><b>Aadhaar Card No.</b> :- </label>
                      {{ isset($sub_franchise->aadhaar_no) &&!empty($sub_franchise->aadhaar_no)?$sub_franchise->aadhaar_no:NULL;}}
                  </div>

                  <div class="col-sm-3">
                    <label><b>Rerence Franchise Name </b> :- </label>
                      {{ isset($franchise_name->franchise_name) &&!empty($franchise_name->franchise_name)?$franchise_name->franchise_name:NULL;}}
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-3">
                    <label><b>Pan Card</b> :- </label>
                      @if (isset($sub_franchise->pan_img))
                        <img src="{{ \Storage::url($sub_franchise->pan_img) }}" height="80px"
                              width="80px"><br /><br />
                      @endif
                  </div>

                  <div class="col-sm-3">
                    <label><b>Aadhaar Card</b> :- </label>
                      @if (isset($sub_franchise->aadhaar_img))
                        <img src="{{ \Storage::url($sub_franchise->aadhaar_img) }}" height="80px"
                            width="80px"><br /><br />
                      @endif
                  </div>

                  <div class="col-sm-3">
                    <label><b>GST Certificate</b> :- </label>
                      @if (isset($sub_franchise->gst_certificate))
                        <img src="{{ \Storage::url($sub_franchise->gst_certificate) }}" height="80px"
                                width="80px"><br /><br />
                      @endif
                  </div>

                  <div class="col-sm-3">
                    <div id="approval_status_div" class="approval_status_div">
                      <?php 
                        
                        $check1 = $check2 = '';
                        
                        if(isset($sub_franchise->approval_status)&&!empty($sub_franchise->approval_status)){

                          if($sub_franchise->approval_status =='Approved'){
                            $check1 ='checked'; 
                          }
                              
                          else if($sub_franchise->approval_status =='Rejected'){
                            $check2 ='checked'; 
                          }
                        }
                      ?>

                        @if($sub_franchise->approval_status =='Approved')
                            
                          <input type="checkbox" id="approval_status" name="approval_status" value="Approved" {{$check1}}>
                          <button type="button" id="approved_btn" class="btn btn-success" ><i class="fa fa-check-circle"> Approved</i></button>   

                        @endif
                                    
                        @if($sub_franchise->approval_status =='Rejected')
                          <input type="checkbox" id="approval_status" name="approval_status" value="Rejected" {{$check2}}>
                          <button type="button" id="reject_btn" class="btn btn-danger"><i class="fa fa-times-circle"> Rejected</i></button>
                        @endif
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endpush

@push('js')

<script type="text/javascript">

  $(document).ready(function () {


//Form submit
  $("#franchise-form").validate({
    rules: {
        business_name   : 'required',
        gst_no          : 'required',
        contact_no      : 'required',
        email           : 'required',
        country         : 'required',
        state           : 'required',
        city            : 'required',
        contact_person  : 'required',
        pan_no          : 'required',
        aadhaar_no      : 'required',
        pan_img         : 'required|mimes:jpg,jpeg,png|max:1024',
        aadhaar_img     : 'required|mimes:jpg,jpeg,png|max:1024',
        gst_certificate : 'required|mimes:jpg,jpeg,png|max:1024'
      },
      messages: {
        business_name   : 'This field is required.',
        gst_no          : 'This field is required.',
        contact_no      : 'This field is required.',
        email           : 'This field is required.',
        country         : 'This field is required.',
        state           : 'This field is required.',
        city            : 'This field is required.',
        contact_person  : 'This field is required.',
        pan_no          : 'This field is required.',
        aadhaar_no      : 'This field is required.',
        pan_img         :'Only PNG , JPEG , JPG, GIF File Allowed"',
        aadhaar_img     :'Only PNG , JPEG , JPG, GIF File Allowed"',
        gst_certificate :'Only PNG , JPEG , JPG, GIF File Allowed"'
      },
    submitHandler: function(form){
      if($(form).valid()){
        form.submit();
      }
    }
  });
  });




</script>

@endpush
