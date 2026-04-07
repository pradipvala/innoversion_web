

@extends('admin.layouts.app')

@push('url_title') Edit Web Support @endpush

@section('title',  'Edit Web Support')



@push('content')

<?php //dd($web_support); ?>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
              <form class="form-horizontal" id="web-server-form" role="form" method="POST" action="{{ route('admin.websupport.update',['id'=>$web_support->id]) }}" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="id" value="{{ isset($web_support->id) ? $web_support->id : '' }} ">
                <div class="form-group">
                  <div class="col-sm-6">
                    <label><b>Title</b> :- </label>
                      <input type="text" name="title" id="title"  class="form-control" value="{{ isset($web_support->title) &&!empty($web_support->title)?$web_support->title:NULL;}}" required/>
                  </div>

                  <div class="col-sm-6">
                        <label><b>Technologies</b> :- </label>
                      <select name="technologies" id="technologies" class="form-control" required>
                        <option value="">Select Technologies</option>
                        <option value="Laravel"  <?php if($web_support->technologies=='Laravel') {echo $sel='selected';} else {echo $sel=''; }?> >Laravel</option>

                        <option value="CodeIgniter"  <?php if($web_support->technologies=='CodeIgniter') {echo $sel='selected';} else {echo $sel=''; }?>>CodeIgniter</option>

                        <option value="Wordpress" <?php if($web_support->technologies=='Wordpress') {echo $sel='selected';} else {echo $sel=''; }?>>Wordpress</option>
                      <select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                      <label>Website:</label>
                        <input type="url" name="website" id="website" class="form-control" value="{{ isset($web_support->website) &&!empty($web_support->website)?$web_support->website:NULL;}}"required> 
                  </div>

                  <div class="col-sm-6">
                      <label>Phone No:</label>
                        <input type="number" class="form-control"  name="phone_no" id="phone_no" value="{{ isset($web_support->phone_no) &&!empty($web_support->phone_no)?$web_support->phone_no:NULL;}}" required><br>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                      <label>Email:</label>
                        <input type="email" class="form-control"  name="email" id="email" placeholder="Email" value="{{ isset($web_support->email) &&!empty($web_support->email)?$web_support->email:NULL;}}"required><br> 
                  </div>

                  <div class="col-sm-6">
                    <label><b>Time To Connect</b> :- </label>
                        <input type="datetime-local" id="time_to_connect" name="time_to_connect" class="form-control"  value="{{ isset($web_support->time_to_connect) &&!empty($web_support->time_to_connect)?$web_support->time_to_connect:NULL;}}" required/>
                  </div>

                </div>


                  <div class="form-group">

                   <div class="col-sm-6">
                    <label><b>Description</b> :- </label>
                    <textarea name="description" id="description" class="form-control" row="2" column="10" required>{{ isset($web_support->description) &&!empty($web_support->description)?$web_support->description:NULL;}}</textarea>
                  </div>

                  <div class="col-sm-6">
                    <label><b>Remark</b> :- </label>
                    <textarea name="remark" id="remark" class="form-control" row="2" column="10" required>{{ isset($web_support->remark) &&!empty($web_support->remark)?$web_support->remark:NULL;}}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                    <label><b>Connection Medium(Whatsapp No.)</b> :- </label>
                        <input type="text" name="connection_medium" id="connection_medium" class="form-control"  value="{{ isset($web_support->connection_medium) &&!empty($web_support->connection_medium)?$web_support->connection_medium:NULL;}}" required/>
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
  $("#web-server-form").validate({
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
