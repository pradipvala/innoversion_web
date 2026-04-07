@extends('admin.layouts.app')

@push('url_title') Sub Franchise  @endpush

@section('title',  'Add Sub Franchise')



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
              <form class="form-horizontal" id="franchise-form" role="form" method="POST" action="{{ route('admin.save.sub_franchise') }}" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">
                  <div class="col-sm-3">
                    <label><b>Business name</b> :- </label>
                    <input type="text" name="business_name" id="business_name"  class="form-control" />
                  </div>

                  <div class="col-sm-3">
                    <label><b>Franchise name</b> :- </label>
                    <input type="text" name="franchise_name" id="franchise_name"  class="form-control" />
                  </div>

                 <div class="col-sm-3">
                    <label><b>Gst no.</b> :- </label>
                    <input type="text" name="gst_no" id="gst_no" class="form-control"  />
                  </div>

                  <div class="col-sm-3">
                    <label><b>Contact No.</b> :- </label>
                    <input type="tel" name="contact_no" id="contact_no" class="form-control"  />
                  </div>
                </div>

                

                <div class="form-group">
                  <div class="col-sm-3">
                    <label><b>Email Address</b> :- </label>
                    <input type="email" name="email" id="email" class="form-control"  />
                  </div>

                  <div class="col-sm-3">
                    <label for="country_id">Country</label>
                    <span class="kt-form__help error country_id"></span>
                    <select class="form-select form-control select2" aria-label="Default select example" 
                      name=" country_id" id="country_id" value="">
                        <option>Select Country</option>

                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" required>{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="col-sm-3">
                    <label for="state_id">State</label>
                    <span class="kt-form__help error state_id"></span>
                    <select class="form-select form-control select2" aria-label="Default select example" name="state_id" id="state_id" value="">
                        <option>Select State</option>

                        @foreach($states as $state)
                        <option value="{{ $state->id }}" required>{{ $state->state }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="col-sm-3">
                    <label for="c_name">City</label>
                    <span class="kt-form__help error c_name"></span>
                    <select class="form-select form-control select2" aria-label="Default select example" name="c_name" id="city_id" value="">
                        <option>Select City</option>

                        @foreach($city as $city1)
                        <option value="{{ $city1->id }}" required>{{ $city1->c_name }}</option>
                        @endforeach
                    </select>
                  </div>

                

                <div class="form-group">
                    <div class="col-sm-3">
                      <label><b>Contact Person Name</b> :- </label>
                      <input type="text" name="contact_person" id="contact_person" class="form-control"  />
                    </div>

                    <div class="col-sm-3">
                      <label><b>Pan Card no.</b> :- </label>
                      <input type="text" name="pan_no" id="pan_no" class="form-control"  />
                    </div>

                    <div class="col-sm-3">
                      <label><b>Aadhaar Card No.</b> :- </label>
                      <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control"  />
                    </div>

                    <div class="col-sm-3">
                      <label><b>Rerence Franchise Name</b> :- </label>
                      <select class="form-control" id="rerence_franchise_name" name="rerence_franchise_name" >
                        <option value=""></option>
                        @foreach ($franchise_name as $key => $name)
                            <option value="{{ $name->id }}">{{ $name->franchise_name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>

                

                <div class="form-group">
                  <div class="col-sm-3">
                    <label><b>Upload Pan Card</b> :- </label>

                      <input type="file" class="filestyle" name="pan_img" id="pan_img" class="form-control" 
                        accept="image/jpg, image/png, image/gif, image/jpeg"  />
                  </div>

                  <div class="col-sm-3">
                    <label><b>Upload Aadhaar Card</b> :- </label>
                        <input type="file"class="filestyle"   name="aadhaar_img" id="aadhaar_img" class="form-control" 
                        accept="image/jpg, image/png, image/gif, image/jpeg"  />
                  </div>

                  <div class="col-sm-3">
                    <label><b>Upload GST Certificate</b> :- </label>
                        <input type="file" class="filestyle"  name="gst_certificate" id="gst_certificate" class="form-control" 
                        accept="image/jpg, image/png, image/gif, image/jpeg"  />
                  </div>
                </div>

                <div class="form-group clearfix">
                  <div class="col-lg-10">
                    <button type="submit"  class="btn btn-success waves-effect waves-light">Save</button>
                  </div>
                </div>
              </form>
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
        franchise_name   : 'required',
        gst_no          : 'required',
        contact_no      : 'required',
        email           : 'required',
        country         : 'required',
        state           : 'required',
        city            : 'required',
        contact_person  : 'required',
        pan_no          : 'required',
        aadhaar_no      : 'required',
        reference_name  : 'required',
        pan_img         : 'required|mimes:jpg,jpeg,png|max:1024',
        aadhaar_img     : 'required|mimes:jpg,jpeg,png|max:1024',
        gst_certificate : 'required|mimes:jpg,jpeg,png|max:1024'
      },
      messages: {
        business_name   : 'This field is required.',
        franchise_name  : 'This field is required.',
        gst_no          : 'This field is required.',
        contact_no      : 'This field is required.',
        email           : 'This field is required.',
        country         : 'This field is required.',
        state           : 'This field is required.',
        city            : 'This field is required.',
        contact_person  : 'This field is required.',
        pan_no          : 'This field is required.',
        aadhaar_no      : 'This field is required.',
        reference_name  : 'This field is required.',
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


<script>

    $(document).ready(function() {
        // Check if the screen width is less than 768px (typical mobile devices)
        if ($(window).width() <= 768) {
            // Initialize Select2 on the select elements
            $('#country_id, #state_id, #city_id').select2();
        }
    });

            
    $('#country_id').change(function () {
        var selectedCountry = $(this).val();
        if (selectedCountry) {
            // Fetch states based on the selected country
            fetchStates(selectedCountry, 'state_id');
        } 
        else {
            // Clear the state and city dropdowns if no country is selected
            $('#state_id').empty().append($('<option>', {
                value: '',
                text: 'Select State'
            }));
            $('#city_id').empty().append($('<option>', {
                value: '',
                text: 'Select City'
            }));
        }
    });


    function fetchStates(country_id, state_id) {

        $.ajax({
            url: `{{ config('api.url') }}` + 'state', // Update with your actual endpoint for fetching states
            method: 'POST', // Change the method to POST
            data: {
                country_id: country_id
            }, // Send country_id as form data
            dataType: 'json',
            success: function (response) {
                // Populate the state dropdown
                var stateSelect = $('#' + state_id);
                stateSelect.empty();
                stateSelect.append($('<option>', {
                    value: '',
                    text: 'Select State'
                }));
                $.each(response.Data, function (key, value) {
                    stateSelect.append($('<option>', {
                        value: value.id,
                        text: value.state
                    }));
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    }




    $('#state_id').change(function () {
        var selectedState = $(this).val();
        if (selectedState) {
            // Fetch cities based on the selected state
            fetchCities(selectedState, 'city_id');
        } else {
            // Clear the city dropdown if no state is selected
            $('#city_id').empty().append($('<option>', {
                value: '',
                text: 'Select City'
            }));
        }
    });



    
    function fetchCities(stateId, city_id) {
    $.ajax({
        url: `{{ config('api.url') }}` + 'City', // Replace with your actual endpoint
        method: 'POST',
        data: {
            state_id: stateId
        },
        dataType: 'json',
        success: function (response) {
            // Populate the city dropdown

            var citySelect = $('#' + city_id);
            citySelect.empty();
            citySelect.append($('<option>', {
                value: '',
                text: 'Select City'
            }));
            $.each(response.Data, function (key, value) {
                citySelect.append($('<option>', {
                    value: value.id,
                    text: value.c_name
                }));
            });



        },
        error: function (error) {
            console.error(error);
        }
    });
    }

</script>

@endpush
