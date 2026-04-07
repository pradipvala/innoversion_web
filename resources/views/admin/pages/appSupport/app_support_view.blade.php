

@extends('admin.layouts.app')

@push('url_title') Web Support @endpush

@section('title',  'Web Support')



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

          <div class="row">
            <div class="col-lg-12 margin-tb mb-4">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.appsupport') }}"> Back</a>
                </div>
            </div>
          </div>

        <div class="row form-horizontal">

        <input type="hidden" name="id" value="{{ isset($app_support->id) ? $app_support->id : '' }} ">
          <div class="form-group">
            <div class="col-sm-6">
              <labe><b>Title</b> :- </label>
                {{ isset($app_support->title) &&!empty($app_support->title)?$app_support->title:NULL;}}
            </div>
            <div class="col-sm-6">
                  <labe><b>Technologies</b> :- </label>
                {{ isset($app_support->technologies) &&!empty($app_support->technologies)?$app_support->technologies:NULL;}}
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6">
                <label>Website:</label>
                  {{ isset($app_support->website) &&!empty($app_support->website)?$app_support->website:NULL;}}
            </div>
            <div class="col-sm-6">
                <label>Phone No:</label>
                  {{ isset($app_support->phone_no) &&!empty($app_support->phone_no)?$app_support->phone_no:NULL;}}
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6">
                <label>Email:</label>
                  {{ isset($app_support->email) &&!empty($app_support->email)?$app_support->email:NULL;}}
            </div>
            <div class="col-sm-6">
              <labe><b>Time To Connect</b> :- </label>
                  {{ isset($app_support->time_to_connect) &&!empty($app_support->time_to_connect)?$app_support->time_to_connect:NULL;}}
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-6">
              <labe><b>Description</b> :- </label>
              {{ isset($app_support->description) &&!empty($app_support->description)?$app_support->description:NULL;}}
            </div>
            <div class="col-sm-6">
              <labe><b>Remark</b> :- </label>
              {{ isset($app_support->remark) &&!empty($app_support->remark)?$app_support->remark:NULL;}}
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6">
              <labe><b>Connection Medium(Whatsapp No.)</b> :- </label>
                  {{ isset($app_support->connection_medium) &&!empty($app_support->connection_medium)?$app_support->connection_medium:NULL;}}
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

  // $(document).ready(function () {


  // });
</script>

@endpush
