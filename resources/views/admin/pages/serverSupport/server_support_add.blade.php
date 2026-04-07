@extends('admin.layouts.app')

@push('url_title') Add Server Support  @endpush

@section('title',  'Add Server Support')



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
              <form class="form-horizontal" id="server-support-form" role="form" method="POST" action="{{ route('admin.save.serversupport') }}" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">
                  <div class="col-sm-4">
                    <label><b>Title</b> :- </label>
                      <input type="text" name="title" id="title"  class="form-control" required/>
                  </div>
                  
                  <div class="col-sm-4">
                    <label><b> Technologies</b> :- </label>
                    <select name="technologies" id="technologies" class="form-control" required>
                      <option value="">Select Technologies</option>
                      <option value="Laravel">Laravel</option>
                      <option value="CodeIgniter">CodeIgniter</option>
                      <option value="Wordpress">Wordpress</option>
                    <select>
                  </div>

                  <div class="col-sm-4">
                      <label>Website:</label>
                        <input type="url" name="website" id="website" class="form-control" required> 
                  </div>
                </div>

                


                <div class="form-group">

                  <div class="col-sm-4">
                      <label>Phone No:</label>
                        <input type="number" class="form-control"  name="phone_no" id="phone_no" required><br>
                  </div>

                  <div class="col-sm-4">
                      <label>Email:</label>
                        <input type="email" class="form-control"  name="email" id="email" placeholder="Email" required><br> 
                  </div>
                
                  <div class="col-sm-4">
                    <label><b>Time To Connect</b> :- </label>
                        <input type="datetime-local" id="time_to_connect" name="time_to_connect" class="form-control"  required/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                    <label><b>Description</b> :- </label>
                    <textarea name="description" id="description" class="form-control" row="2" column="10" required></textarea>
                  </div>
                
                  <div class="col-sm-4">
                    <label><b>Remark</b> :- </label>
                    <textarea name="remark" id="remark" class="form-control" row="2" column="10" required></textarea>
                  </div>

                  <div class="col-sm-4">
                    <label><b>Connection Medium(Whatsapp No.)</b> :- </label>
                        <input type="text" name="connection_medium" id="connection_medium" class="form-control"  required/>
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
  $("#server-support-form").validate({
    rules: {
        title  : 'required',
        description          : 'required',
        technologies     : 'required',
        website           : 'required',
        phone_no        : 'required',
        email       : 'required',
        time_to_connect         : 'required',
        connection_medium           : 'required',
        remark  : 'required'
      },
      messages: {
        title   : 'This field is required.',
        description          : 'This field is required.',
        technologies       : 'This field is required.',
        website          : 'This field is required.',
        phone_no        : 'This field is required.',
        email        : 'This field is required.',
        time_to_connect          : 'This field is required.',
        connection_medium            : 'This field is required.',
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
