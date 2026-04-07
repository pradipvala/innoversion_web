
@extends('admin.layouts.app')

@push('url_title') City  Master @endpush
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
              <h4 class="m-t-0 header-title"><b>City  Management</b></h4>
            </div>
              <div class="col-sm-8 text-right">
                {{-- @can('create-city') --}}
                  <a class="btn btn-primary" href="{{ route('admin.city.create') }}" role="button"> <span><i class="fa fa-plus"></i></span> Create New City </a>
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
                                  <th>City Name</th>
                                  <th>Country</th>
                                  <th>State</th>
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
                  
                  "ajax": {
                      "url": "{{ route('admin.city') }}",
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
                      { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                      { data: 'c_name', name: 'c_name' },
                      { data: 'state.country.country_name', name: 'country_name' },
                      { data: 'state.state', name: 'state' },
                      { data: 'status', name: 'status' },
                      { data: 'action', name: 'action', orderable: false }
                        ]
                    });
            }
            
      });


    function change_status(object) {
      
      var id = $(object).data("id");
      var status = $(object).data("status");

      if (confirm('Are you sure?')) {
          $.ajax({
              "url": "{!! route('admin.city.change.status') !!}",
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