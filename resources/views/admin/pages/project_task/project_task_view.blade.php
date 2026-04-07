

@extends('admin.layouts.app')

@push('url_title') Project task @endpush

<style>
.dt-buttons {
    position: relative;
    padding-left:10px;
    float: right !important;

}

button.dt-button{
    background-color: #0f0 !important;
}

</style>

@section('title',  'Project task')



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
                  <a class="btn btn-primary" href="{{ route('admin.project.task') }}"> Back</a>
              </div>
          </div>
        </div>

        <div class="row form-horizontal">
       
          <div class="form-group">
              <div class="col-sm-4">
                <label><b>Title</b> :- </label>
                  <input type="text" name="title" id="title"  class="form-control" value="{{ isset($data->title) &&!empty($data->title)?$data->title:NULL;}}" disabled />
              </div>

              

              <div class="col-sm-4">
                <label><b>Select Project Category</b> :- </label>
                <select name="category" id="category" class="form-control" disabled >
               
                  <option value="web-application"  <?php if($data->category=='web-application') {echo $sel='selected';} else {echo $sel=''; }?> >Web Application</option>

                  <option value="mobile-application"  <?php if($data->category=='mobile-application') {echo $sel='selected';} else {echo $sel=''; }?>>Mobile Application</option>

                  <option value="digital-marketing" <?php if($data->category=='digital-marketing') {echo $sel='selected';} else {echo $sel=''; }?>>Digital Marketing</option>

                  <option value="server" <?php if($data->category=='server') {echo $sel='selected';} else {echo $sel=''; }?>>Server</option>
                </select>
              </div>

              <div class="col-sm-4">
                <label><b>Description</b> :- </label>
                <textarea name="description" id="description" class="form-control" row="2" column="10" disabled >{{ isset($data->description) &&!empty($data->description)?$data->description:NULL;}}</textarea>
              </div>

              <div class="col-sm-4">
                <label><b> Assign to</b> :- </label>
                <select name="assign_to_user" id="assign_to_user" class="form-control" disabled>
                  @if(isset($assign_to_user->name) && !empty($assign_to_user->name))
                    <option value="{{$assign_to_user->id}}">{{$assign_to_user->name}}</option>
                  @endif
                  </select>
              </div>
            </div>

          <div class="col-md-12"></div><br><br>
          <div class="col-md-12">
            <table class="table table-bordered dt-responsive"  id="Task_datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>Sr no.</th>
                    <th>Description</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @php  $i=1; @endphp
                  @foreach($milestone_data as $val)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ isset($val->milestone_description) &&!empty($val->milestone_description)?$val->milestone_description:NULL;}}</td>
                      <td>
                        @if(isset($val->task_status) && !empty($val->task_status))

                          @if($val->task_status == 'open') 
                               <span class="badge badge-pill badge-primary">Open</span>
                            @elseif ($val->task_status == 'work_in_progress') 
                                   <span class="badge rounded-pill badge-warning">Work in progress</span>
                            @elseif ($val->task_status == 'approved') 
                                   <span class="badge badge-pill badge-success">Approved</span>
                            @elseif ($val->task_status == 'reopen') 
                                   <span class="badge badge-pill badge-info">Reopen</span>
                            @elseif ($val->task_status == 'completed') 
                                   <span class="badge badge-pill badge-success">Completed</span>
                            @else
                              <span class="badge badge-pill badge-danger">No status selected</span>
                          @endif
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>






@endpush

@push('js')

<script type="text/javascript">

    $(document).ready(function() {

      if (!$.fn.DataTable.isDataTable('#Task_datatable')) {
            $('#Task_datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Download Task Sheet Excel',
                    title: 'Task Sheet Excel'
                },
            ]
        });
      }
    });
</script>

@endpush
