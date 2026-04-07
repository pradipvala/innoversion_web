

@extends('admin.layouts.app')

@push('url_title') Edit App Support @endpush

@section('title',  'Edit App Support')



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
              <form class="form-horizontal" id="app-server-form" role="form" method="POST" action="{{ route('admin.appsupport.update',['id'=>$app_support->id]) }}" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="id" value="{{ isset($app_support->id) ? $app_support->id : '' }} ">
                <div class="form-group">
                  <div class="col-sm-6">
                    <labe><b>Title</b> :- </label>
                      <input type="text" name="title" id="title"  class="form-control" value="{{ isset($app_support->title) &&!empty($app_support->title)?$app_support->title:NULL;}}" required/>
                  </div>

                <div class="col-sm-6">
                  <labe><b>Technologies</b> :- </label>
                  <select name="technologies" id="technologies" class="form-control" required>
                 
                    <option value="">Select Technologies</option>
                    <option value="Laravel"  <?php if($app_support->technologies=='Laravel') {echo $sel='selected';} else {echo $sel=''; }?> >Laravel</option>

                    <option value="CodeIgniter"  <?php if($app_support->technologies=='CodeIgniter') {echo $sel='selected';} else {echo $sel=''; }?>>CodeIgniter</option>

                    <option value="Wordpress" <?php if($app_support->technologies=='Wordpress') {echo $sel='selected';} else {echo $sel=''; }?>>Wordpress</option>
                  <select>
                </div>
              </div>


                <div class="form-group">
                  <div class="col-sm-6">
                      <label>Website:</label>
                        <input type="url" name="website" id="website" class="form-control" value="{{ isset($app_support->website) &&!empty($app_support->website)?$app_support->website:NULL;}}"required> 
                  </div>
                
                  <div class="col-sm-6">
                      <label>Phone No:</label>
                        <input type="number" class="form-control"  name="phone_no" id="phone_no" value="{{ isset($app_support->phone_no) &&!empty($app_support->phone_no)?$app_support->phone_no:NULL;}}" required><br>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                      <label>Email:</label>
                        <input type="email" class="form-control"  name="email" id="email" placeholder="Email" value="{{ isset($app_support->email) &&!empty($app_support->email)?$app_support->email:NULL;}}"required><br> 
                  </div>
                
                  <div class="col-sm-6">
                    <labe><b>Time To Connect</b> :- </label>
                        <input type="datetime-local" id="time_to_connect" name="time_to_connect" class="form-control"  value="{{ isset($app_support->time_to_connect) &&!empty($app_support->time_to_connect)?$app_support->time_to_connect:NULL;}}" required/>
                  </div>
                </div>

                
                
                <div class="form-group">
                  <div class="col-sm-6">
                    <labe><b>Description</b> :- </label>
                    <textarea name="description" id="description" class="form-control" row="2" column="10" required>{{ isset($app_support->description) &&!empty($app_support->description)?$app_support->description:NULL;}}</textarea>
                  </div>
                
                  <div class="col-sm-6">
                    <labe><b>Remark</b> :- </label>
                    <textarea name="remark" id="remark" class="form-control" row="2" column="10" required>{{ isset($app_support->remark) &&!empty($app_support->remark)?$app_support->remark:NULL;}}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                    <labe><b>Connection Medium(Whatsapp No.)</b> :- </label>
                        <input type="text" name="connection_medium" id="connection_medium" class="form-control"  value="{{ isset($app_support->connection_medium) &&!empty($app_support->connection_medium)?$app_support->connection_medium:NULL;}}" required/>
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
  $("#app-server-form").validate({
    rules: {
        title   : 'required',
        description         : 'required',
        technologies     : 'required',
        website          : 'required',
        phone_no        : 'required',
        email          : 'required',
        time_to_connect           : 'required',
        connection_medium : 'required',
        remark          : 'required'
        
                 
      },
      messages: {
        title   : 'This field is required.',
        description          : 'This field is required.',
        technologies     : 'This field is required.',
        website           : 'This field is required.',
        phone_no         : 'This field is required.',
        email           : 'This field is required.',
        time_to_connect           : 'This field is required.',
        connection_medium  : 'This field is required.',
        remark         : 'This field is required.'
        
        
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
