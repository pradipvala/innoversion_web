@extends('admin.layouts.app')
@push('url_title') Server Support List @endpush
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
                    <h4 class="m-t-0 header-title"><b>Server Support List</b></h4>
                </div>
                <div class="col-sm-8 text-right">
                    <a class="btn btn-primary" href="{{ route('admin.create.serversupport') }}" role="button"> <span>
                    <i class="fa fa-plus"></i></span> Create Server Support</a>
                </div><br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="server-support-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>Sr No.</th>
                                      <th>Category</th>
                                      <th>Description</th>
                                      <th>Payment Status</th>
                                      <th>Pay Now</th>
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

        if($('#server-support-datatable').length > 0) {

            $('#server-support-datatable').dataTable({
                    
                    processing: true,
                    serverSide: true,

                    "pageLength": 25,
                    "iDisplayLength": 25,
                    "responsive": true,
                    "aaSorting": [],

                    "ajax": {
                          "url": "{{ route('admin.serversupport.listing') }}",
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
                              data: 'category',
                              name: 'category'
                            },
                            {
                              data: 'title',
                              name: 'title'
                            },
                            
                            {
                              data: 'pay_now',
                              name: 'pay_now'
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
              url: "{{ route('admin.change.status.serversupport') }}",
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

    
    function delete_func(object){
        
        var id = $(object).data("id");

        if(confirm("Are you sure you want to delete?") == true) 
        {
            $.ajax({
                "url": "{!! route('admin.serversupport.delete') !!}",
                "dataType": "json",
                "type": "POST",
                "data":{
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data){
                    if(data.status == 200){
                         toastr.success('Server support data deleted successfully', 'Success');
                            $('#server-support-datatable').DataTable().ajax.reload();                  
                    }else{
                        toastr.error('Failed to delete server support data', 'Error');
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
