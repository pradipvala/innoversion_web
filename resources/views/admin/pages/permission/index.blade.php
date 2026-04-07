

@extends('admin.layouts.app')

@push('url_title') Permission Details @endpush
@section('title')

@push('content')
<div class="row">
  <div class="col-sm-12">
      <div class="card-box table-responsive">
          <div class="m-t-0 m-b-10 row">
            <div class="col-sm-4">
              <h4 class="m-t-0 header-title"><b>Permission Management</b></h4>
            </div>
              <div class="col-sm-8 text-right">
                {{-- @can('role-create') --}}
                  <a class="btn btn-primary" href="{{ route('admin.permission.create') }}" role="button"> <span><i class="fa fa-plus"></i></span> Create New Permission</a>
                  {{-- @endcan --}}
              </div><br><br>
          </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success my-2">
                    <p>{{ $message }}</p>
                </div>
            @endif
           <table id="table_DT" class="table table-striped table-bordered">
               <div class="row">
                   <div class="col-sm-12">
                       <div class="table-responsive">
                           <table id="data-table" class="table table-striped table-bordered data-table">
                              <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Guard Name</th>
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


@endpush

@push('js')
<script type="text/javascript">
    var datatable;

        $(document).ready(function() {
      
            if($('#data-table').length > 0) {
                datatable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,

                "pageLength": 25,
                "iDisplayLength": 25,
                "responsive": true,
                "aaSorting": [],
                    // "order": [], //Initial no order.
                    //     "aLengthMenu": [
                    //     [5, 10, 25, 50, 100, -1],
                    //     [5, 10, 25, 50, 100, "All"]
                    // ],

                    // "scrollX": true,
                    // "scrollY": '',
                    // "scrollCollapse": false,
                    // scrollCollapse: true,

                    // lengthChange: false,

                    "ajax": {
                        "url": "{{ route('admin.permission') }}",
                        "type": "POST",
                        "dataType": "json",
                        "data": {
                            _token: "{{csrf_token()}}"
                        }
                    },
                    "columnDefs": [{
                        //"targets": [0, 5], //first column / numbering column
                        "orderable": true, //set not orderable
                    }, ],
                    columns: [
                                {
                                    data: 'DT_RowIndex',
                                    name: 'DT_RowIndex'
                                },
                                {
                                    data: 'name',
                                    name: 'name'
                                },
                                {
                                    data: 'guard_name',
                                    name: 'guard_name'
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


    function delete_func(object){
        
        var id = $(object).data("id");

        if(confirm('Are you sure you want to delete?')) 
        {
            $.ajax({
                "url": "{!! route('admin.permission.delete') !!}",
                "dataType": "json",
                "type": "POST",
                "data":{
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data){
                    if (data.status == 200){

                        toastr.success('Permission deleted successfully', 'Success');
                        datatable.ajax.reload();
                        // toastr["success"](data.msg,"Success");
                    }else{
                        toastr.error('Failed to delete permission', 'Error');
                        // toastr["error"](data.msg,"Error");
                    }
                }
            });
        }
    }


  </script>
@endpush
@endsection