

@extends('admin.layouts.app')
@push('url_title') Project List @endpush
@section('title')
@push('content')


@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif




<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="m-t-0 m-b-10 row">
              <div class="col-sm-4">
                <h4 class="m-t-0 header-title"><b>Project List</b></h4>
              </div>
               @can('project-task-create')
                <div class="col-sm-8 text-right">
                    <a class="btn btn-primary" href="{{ route('admin.create.project.task') }}" role="button"> <span>
                    <i class="fa fa-plus"></i></span> Create Project</a>
                </div><br><br>
                 @endcan 
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="project-task-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>Sr No.</th>
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Category</th>
                                      <th>Task Assigned</th>
                                      <th>Create Date</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </table>
        </div>
      </div>
  </div>

  </div>
@endpush

@push('js')
<script type="text/javascript">

    var datatable;

    $(document).ready(function() {

        if($('#project-task-datatable').length > 0) {

            $('#project-task-datatable').dataTable({
                    
                    processing: true,
                    serverSide: true,

                    "pageLength": 25,
                    "iDisplayLength": 25,
                    "responsive": true,
                    "aaSorting": [],

                    "ajax": {
                          "url": "{{ route('admin.project.task.listing') }}",
                          "type": "GET",
                          "dataType": "json",
                          "data": {
                              _token: "{{csrf_token()}}"
                          }
                      },
                      "columnDefs": [{
                          "orderable": true, //set not orderable
                      }, ],

                    columns: [
                            {
                              data: 'DT_RowIndex',
                              name: 'DT_RowIndex'
                            },
                            {
                              data: 'title',
                              name: 'title'
                            },
                            {
                              data: 'description',
                              name: 'description'
                            },
                            {
                              data: 'category',
                              name: 'category'
                            },
                            {
                              data: 'task_assign_name',
                              name: 'task_assign_name'
                            },
                            {
                              data: 'created_at',
                              name: 'created_at'
                            },
                            {
                              data: 'status',
                              name: 'status'
                            },
                            
                            {
                              data: 'action',
                              name: 'action',
                              orderable: false,
                            },
                        ]

            });
        }
            
    });


        $(document).on('click','#status',function(){
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).val();

            $.ajax({
              type: "POST",
              url: "{{ route('admin.change.status.project.task') }}",
              data: { "_token": "{{ csrf_token() }}" , id: id, status:status },
              success:function(result){
                      if(result['status'] == 'true'){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: result['message'],
                            showConfirmButton: false,
                            timer: 2000
                        });
                      }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: result['message'],
                            showConfirmButton: false,
                            timer: 2000
                        });
                  }
              }
            });
        });



    function change_task_status(object) {
      
      var id = $(object).data("id");
      var task_status = $(object).data("status");

      if (confirm('Are you sure?')) {
          $.ajax({
              "url": "{!! route('admin.change_project_task_status') !!}",
              "dataType": "json",
              "type": "POST",
              "data": {
                  id: id,
                  task_status: task_status,
                  _token: "{{ csrf_token() }}"
              },
              success: function(response) {
                  if (response.code == 200) {
                      datatable.ajax.reload();
                      toastr.success('Project task status changed successfully', 'Success');
                  } else {
                      toastr.error('Failed to change status', 'Error');
                  }
              }
          });
      }
    }


    function delete_project_task(id){
        
        
        
        if(confirm("Are you sure you want to delete?") == true) 
        {

            $.ajax({
                "url": "{!! route('admin.delete_project_task') !!}",
                "dataType": "json",
                "type": "POST",
                "data":{
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data){
                    if(data.status == 200){
                         toastr.success('Project task  deleted successfully', 'Success');
                            $('#project-task-datatable').DataTable().ajax.reload();                  
                    }else{
                        toastr.error('Failed to delete project task', 'Error');
                    }
                }
            });
        }else{
          toastr.error('You pressed Cancel!', 'Error');
        }
    }
</script>






@endpush
@endsection
