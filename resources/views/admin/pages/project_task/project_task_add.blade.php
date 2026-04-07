@extends('admin.layouts.app')

@push('url_title') Create Project   @endpush

@section('title',  'Create  Project')



@push('content')


@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif

<?php //dd($user); ?>

<div class="content">
    <div class="row ">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="project-task-form" role="form" method="POST" 
                    action="{{ route('admin.save.project.task') }}" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">

                  <div class="col-sm-4">
                    <label><b>Title</b> :- </label>
                      <input type="text" name="title" id="title"  class="form-control" required/>
                  </div>

                  

                  <div class="col-sm-4">
                    <label><b> Select Project Category</b> :- </label>
                    <select name="category" id="category" class="form-control" required>
                      <option value="" selected="true" disabled="disabled">Select project category</option>
                      <option value="web-application">Web Application</option>
                      <option value="mobile-application">Mobile Application</option>
                      <option value="digital-marketing">Digital Marketing</option>
                      <option value="server">Server</option>
                    </select>
                  </div>

                  <div class="col-sm-4">
                    <label><b>Description</b> :- </label>
                    <textarea name="description" id="description" class="form-control" row="2" column="10" required></textarea>
                  </div>

                  <div class="col-sm-4">
                    <label><b> Assign to</b> :- </label>
                    <select name="assign_to_user" id="assign_to_user" class="form-control" required>
                      <option value="" selected="true" disabled="disabled">Select assign to</option>
                      @if(isset($user) && !empty($user))
                        @foreach($user as $val)
                          <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                      @endif
                      </select>
                  </div>

                </div>

                

                <div class="form-group clearfix">
                  <div class="col-lg-10">
                    <button type="submit"  class="btn btn-success waves-effect waves-light">Save</button>
                    <a class="btn btn-primary" href="{{ route('admin.project.task') }}"> Back</a>
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
  $("#project-task-form").validate({
    rules: {
        title  : 'required',
        description          : 'required',
        category     : 'required',
      
      },
      messages: {
        title   : 'This field is required.',
        description          : 'This field is required.',
        category       : 'This field is required.',
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
