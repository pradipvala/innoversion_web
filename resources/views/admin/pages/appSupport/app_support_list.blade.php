@extends('admin.layouts.app')
@push('url_title') App Support List @endpush
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
                <h4 class="m-t-0 header-title"><b>App Support List</b></h4>
              </div>
                <div class="col-sm-8 text-right">
                <a class="btn btn-primary" href="{{ route('admin.create.appsupport') }}" role="button"> <span>
                    <i class="fa fa-plus"></i></span> Create App Support</a>
            </div><br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="app-support-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>Sr No.</th>
                                      <th>Category</th>
                                      <th>Description</th>
                                      <!-- <th>Generate Invoice</th> -->
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

        if($('#app-support-datatable').length > 0) {

            $('#app-support-datatable').dataTable({
                    
                    processing: true,
                    serverSide: true,

                    "pageLength": 25,
                    "iDisplayLength": 25,
                    "responsive": true,
                    "aaSorting": [],

                    "ajax": {
                          "url": "{{ route('admin.appsupport.listing') }}",
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
                            // {
                            //   data: 'generate_invoice',
                            //   name: 'generate_invoice'
                            // },
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


                //     "columns": [
                // { "title": "Id", "data": "id", "name":"id"},

                // { "title": "Category", "data": "category", "name": "category", searchable: true, sortable: true,},

                // // { "title": "Title", "data": "title", "name": "title", searchable: true, sortable: true,},
                // { "title": "Description", "data": "description", "name": "description", searchable: true, sortable: true,},

                //DO BOT REMOVE CODE WILL USE IN FUTURE

                // { "title": "technologies", "data": "technologies", "name": "technologies", sortable: true,},
                // { "title": "Website", "data": "website", "name": "website", sortable: true,},


                // { "title": "phone_no", "data": "phone_no", "name": "phone_no", sortable: true,},
                // { "title": "email", "data": "email", "name": "email", sortable: true,},


                // { "title": "time_to_connect", "data": "time_to_connect", "name": "time_to_connect", sortable: true,},
                // { "title": "connection_medium", "data": "connection_medium", "name": "connection_medium", sortable: true,},

                // { "title": "remark", "data": "remark", "name": "remark", sortable: true,},
                
                  //   { "title": "Generate Invoice", "data": "generate_invoice", searchable: false},
                  //   { "title": "Pay Now", "data": "pay_now", searchable: false},

                  //   { "title": "Create Date", "data": "created_at", searchable: false},
                    
                  //   { "title": "isActive", "data": "status", searchable: false},
                  //   { "title": "Action", "data": "action", searchable: false, sortable:false,width:'10%' }
                  // ],

                    // lengthMenu: [
                    //     [10, 20, 50, 100],
                    //     [10, 20, 50, 100]
                    // ],
                    // pageLength: 10,

                    // "responsive": false,
                    // "ajax": {
                    //     "url": "{{ route('admin.websupport.listing') }}", // ajax source    
                    // },        
                 // });
            });
        }
            
    });



        $(document).on('click','#status',function(){
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).val();

            $.ajax({
              type: "POST",
              url: "{{ route('admin.change.status.appsupport') }}",
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
                "url": "{!! route('admin.appsupport.delete') !!}",
                "dataType": "json",
                "type": "POST",
                "data":{
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data){
                    if(data.status == 200){
                         toastr.success('App support data deleted successfully', 'Success');
                            $('#app-support-datatable').DataTable().ajax.reload();                  
                    }else{
                        toastr.error('Failed to delete app support data', 'Error');
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
