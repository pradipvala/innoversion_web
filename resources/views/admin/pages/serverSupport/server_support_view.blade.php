

@extends('admin.layouts.app')

@push('url_title') Server Support @endpush

@section('title',  'Server Support')



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
                    <a class="btn btn-primary" href="{{ route('admin.serversupport') }}"> Back</a>
                </div>
            </div>
          </div>

        <div class="row form-horizontal">

        <input type="hidden" name="id" value="{{ isset($server_support->id) ? $server_support->id : '' }} ">
          <div class="form-group">
            <div class="col-sm-4">
              <label><b>Title</b> :- </label>
                {{ isset($server_support->title) &&!empty($server_support->title)?$server_support->title:NULL;}}
            </div>
            <div class="col-sm-4">
                  <label><b>Technologies</b> :- </label>
                {{ isset($server_support->technologies) &&!empty($server_support->technologies)?$server_support->technologies:NULL;}}
            </div>
             <div class="col-sm-4">
                <label>Website:</label>
                  {{ isset($server_support->website) &&!empty($server_support->website)?$server_support->website:NULL;}}
            </div>
          </div>

          
          <div class="form-group">
            <div class="col-sm-4">
                <label>Phone No:</label>
                  {{ isset($server_support->phone_no) &&!empty($server_support->phone_no)?$server_support->phone_no:NULL;}}
            </div>

            <div class="col-sm-4">
                <label>Email:</label>
                  {{ isset($server_support->email) &&!empty($server_support->email)?$server_support->email:NULL;}}
            </div>
            <div class="col-sm-4">
              <label><b>Time To Connect</b> :- </label>
                  {{ isset($server_support->time_to_connect) &&!empty($server_support->time_to_connect)?$server_support->time_to_connect:NULL;}}
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-4">
              <label><b>Description</b> :- </label>
              {{ isset($server_support->description) &&!empty($server_support->description)?$server_support->description:NULL;}}
            </div>
            <div class="col-sm-4">
              <label><b>Remark</b> :- </label>
              {{ isset($server_support->remark) &&!empty($server_support->remark)?$server_support->remark:NULL;}}
            </div>
            <div class="col-sm-4">
              <label><b>Connection Medium(Whatsapp No.)</b> :- </label>
                  {{ isset($server_support->connection_medium) &&!empty($server_support->connection_medium)?$server_support->connection_medium:NULL;}}
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
