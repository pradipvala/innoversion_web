
@extends('home_layouts.home_layout_app')

@push('url_title') User Details @endpush
@section('title')



@push('content')
{{-- <div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
          <h2>Users Management</h2>
        </div>
          <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
          </div>
    </div>
</div> --}}


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
              <h4 class="m-t-0 header-title"><b>Users Management</b></h4>
            </div>
              <div class="col-sm-8 text-right">
                {{-- @can('role-create') --}}
                  <a class="btn btn-primary" href="{{ route('admin.users.create') }}" role="button"> <span><i class="fa fa-plus"></i></span> Create New Users</a>
                  {{-- @endcan --}}
              </div><br><br>
          </div>
           <table id="table_DT" class="table table-striped table-bordered">
               <div class="row">
                   <div class="col-sm-12">
                       <div class="table-responsive">
                           <table id="data-table" class="table table-striped table-bordered data-table">
                              <thead>
                                <tr>
                                  <th>Sr No.</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Department</th>
                                  <th>Roles</th>
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
                      "url": "{{ route('admin.user') }}",
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
                          data: 'email',
                          name: 'email'
                      },
                      {
                          data: 'department',
                          name: 'department'
                      },
                      {
                          data: 'role',
                          name: 'role'
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
            // Highlight row on mouseover
            // $('#data-table tbody').on('mouseover', 'tr', function() {
            // $(this).addClass('highlight');
            // });

            // // Remove highlight on mouseout
            // $('#data-table tbody').on('mouseout', 'tr', function() {
            // $(this).removeClass('highlight');
            // });
      });


    function change_status(object) {
      
      var id = $(object).data("id");
      var status = $(object).data("status");

      if (confirm('Are you sure?')) {
          $.ajax({
              "url": "{!! route('admin.users.change.status') !!}",
              "dataType": "json",
              "type": "POST",
              "data": {
                  id: id,
                  status: status,
                  _token: "{{ csrf_token() }}"
              },
              success: function(response) {
                  if (response.code == 200) {
                      datatable.ajax.reload();
                      toastr.success('Status changed successfully', 'Success');
                  } else {
                      toastr.error('Failed to change status', 'Error');
                  }
              }
          });
      }
    }
  </script>
@endpush
@endsection