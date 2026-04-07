

@extends('admin.layouts.app')

@push('url_title') Edit Project task @endpush

@section('title',  'Edit Project task')



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
            <form class="form-horizontal" id="project-task-form" role="form" method="POST" action="{{ route('admin.project.task.update',['id'=>$data->id]) }}" enctype="multipart/form-data">
              @csrf
             <input type="hidden" name="id" value="{{ isset($data->id) ? $data->id : '' }} ">
              <div class="form-group">
                  <div class="col-sm-4">
                    <label><b>Title</b> :- </label>
                      <input type="text" name="title" id="title"  class="form-control" value="{{ isset($data->title) &&!empty($data->title)?$data->title:NULL;}}" required/>
                  </div>

                  

                  <div class="col-sm-4">
                    <label><b>Select Project Category</b> :- </label>
                    <select name="category" id="category" class="form-control" required>
                    
                      <option value="" selected="true" disabled="disabled">Select project category</option>

                      <option value="web-application"  <?php if($data->category=='web-application') {echo $sel='selected';} else {echo $sel=''; }?> >Web Application</option>

                      <option value="mobile-application"  <?php if($data->category=='mobile-application') {echo $sel='selected';} else {echo $sel=''; }?>>Mobile Application</option>

                      <option value="digital-marketing" <?php if($data->category=='digital-marketing') {echo $sel='selected';} else {echo $sel=''; }?>>Digital Marketing</option>

                       <option value="server" <?php if($data->category=='server') {echo $sel='selected';} else {echo $sel=''; }?>>Server</option>
                    </select>
                  </div>

                  <div class="col-sm-4">
                    <label><b>Description</b> :- </label>
                    <textarea name="description" id="description" class="form-control" row="2" column="10" required>{{ isset($data->description) &&!empty($data->description)?$data->description:NULL;}}</textarea>
                  </div>

                  
                  <div class="col-sm-4">
                    <label><b> Assign to</b> :- </label>
                    <select name="assign_to_user" id="assign_to_user" class="form-control" required>
                      <option value="" selected="true" disabled="disabled">Select assign to</option>
                      @if(isset($assign_user) && !empty($assign_user))
                        @foreach($assign_user as $val)
                          <option value="{{$val->id}}" <?php if($val->id==$assign_to->user_id) {echo $sel='selected';} else {echo $sel=''; }?>>{{$val->name}}</option>
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

<p><b>Task Details</b> :- </p>
<div class="content">
  <div class="row ">
    <div class="col-md-12">
      <div class="card-box">
        @if (isset($milestone_data) && !empty($milestone_data))
          @foreach($milestone_data as $val)
            <div class="row form-horizontal">
                
                  <form id="milestone-form" role="form" method="POST" action="{{ route('admin.project_task_update',['id'=>$val->id]) }}" >
                    @csrf
                      <input type="hidden" name="milestone_id" value="{{ $val->id ?? '' }}">
                      <div class="row col-sm-3">
                        <label><b>Task Description</b> :- </label>
                        <textarea name="milestone_description" id="milestone_description" class="form-control" row="2" column="10" required>{{ isset($val->milestone_description) &&!empty($val->milestone_description)?$val->milestone_description:NULL;}}</textarea>
                      </div>

                      <div class="col-sm-3">
                        <label><b>Task Status</b> :- </label>
                        <select name="task_status" id="task_status" class="form-control" required>
                        
                          <option value="" selected="true" disabled="disabled">Select task status</option>

                          <option value="open" <?php if($val->task_status=='open') {echo $task_sel='selected';} else {echo $task_sel=''; }?>>Open</option>
                          
                          <option value="work_in_progress"  <?php if($val->task_status=='work_in_progress') {echo $task_sel='selected';} else {echo $task_sel=''; }?> >Work in progress</option>

                          <option value="approved"  <?php if($val->task_status=='approved') {echo $task_sel='selected';} else {echo $task_sel=''; }?>>Approved</option>

                          <option value="reopen" <?php if($val->task_status=='reopen') {echo $task_sel='selected';} else {echo $task_sel=''; }?>>Reopen</option>

                          <option value="completed" <?php if($val->task_status=='completed') {echo $task_sel='selected';} else {echo $task_sel=''; }?>>Completed</option>
                        </select>
                      </div>

                      <div class="col-sm-1" style="margin-top:25px;">
                        <button type="submit" class="btn btn-info waves-effect waves-light" >Update</button>
                      </div>
                  </form>
            </div> 
            @endforeach
          @endif
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
        // milestone     : 'required',
      
      },
      messages: {
        title   : 'This field is required.',
        description          : 'This field is required.',
        category       : 'This field is required.',
        // milestone       : 'This field is required.',
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
  
