

@extends('admin.layouts.app')

@push('url_title') Lead Details  @endpush

@section('title',  'Lead Details')



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
                {{ isset($data->business_name) &&!empty($data->business_name)?$data->business_name:NULL;}}
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
            
               
              @if(isset($data->file))
                <div class="col-sm-12">
                      <iframe src="{{ $data->file ?? '' }}"  height="350px" width="100%" ></iframe>
                        <br><br>
                </div>
              @endif

            </div>
        </div>
      </div>
    </div>
</div>
@endpush

@push('js')

<script type="text/javascript">

  $(document).ready(function () { });

</script>

@endpush
