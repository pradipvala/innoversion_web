

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
                  <a class="btn btn-primary" href="{{ route('admin.websupport') }}"> Back</a>
              </div>
          </div>
        </div>

        <div class="row form-horizontal">
       
         <input type="hidden" name="id" value="{{ isset($web_support->id) ? $web_support->id : '' }} ">
          <div class="form-group">
            <div class="col-sm-4">
              <label><b>Title</b> :- </label>
                {{ isset($web_support->title) &&!empty($web_support->title)?$web_support->title:NULL;}}
            </div>
            <div class="col-sm-4">
                  <label><b>Technologies</b> :- </label>
                {{ isset($web_support->technologies) &&!empty($web_support->technologies)?$web_support->technologies:NULL;}}
            </div>
            <div class="col-sm-4">
                <label>Website:</label>
                  {{ isset($web_support->website) &&!empty($web_support->website)?$web_support->website:NULL;}}
            </div>
          </div>

          

          <div class="form-group">
            <div class="col-sm-4">
                <label>Phone No:</label>
                  {{ isset($web_support->phone_no) &&!empty($web_support->phone_no)?$web_support->phone_no:NULL;}}
            </div>
            <div class="col-sm-4">
                <label>Email:</label>
                  {{ isset($web_support->email) &&!empty($web_support->email)?$web_support->email:NULL;}}
            </div>
            <div class="col-sm-4">
              <label><b>Time To Connect</b> :- </label>
                  {{ isset($web_support->time_to_connect) &&!empty($web_support->time_to_connect)?$web_support->time_to_connect:NULL;}}
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-4">
              <label><b>Description</b> :- </label>
              {{ isset($web_support->description) &&!empty($web_support->description)?$web_support->description:NULL;}}
            </div>
            <div class="col-sm-4">
              <label><b>Remark</b> :- </label>
              {{ isset($web_support->remark) &&!empty($web_support->remark)?$web_support->remark:NULL;}}
            </div>
            <div class="col-sm-4">
              <label><b>Connection Medium(Whatsapp No.)</b> :- </label>
                  {{ isset($web_support->connection_medium) &&!empty($web_support->connection_medium)?$web_support->connection_medium:NULL;}}
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
