@extends('admin.layouts.app')
@push('url_title') Sub Franchise List @endpush

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
                <h4 class="m-t-0 header-title"><b>Sub Franchise List</b></h4>
              </div>
                <div class="col-sm-8 text-right">
                <a class="btn btn-primary" href="{{ route('admin.create.sub_franchise') }}" role="button"> <span><i class="fa fa-plus"></i></span> Add Sub Franchise</a>
            </div><br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="sub-franchise-datatable" class="table table-striped table-bordered">
                                
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

    @if(auth()->check() && auth()->user()->hasRole('Master Admin'))

        $('#sub-franchise-datatable').dataTable({
        "processing": true,
        "serverSide": true,
         "columns": [
            { "title": "Id", "data": "id", "name":"id"},
            { "title": "Business Name", "data": "business_name", "name": "business_name", searchable: true, sortable: true,},
            { "title": "Franchise Name", "data": "franchise_name", "name": "franchise_name", searchable: true, sortable: true,},

            { "title": "Created By", "data": "created_by", "name": "created_by", searchable: true, sortable: true,},


            { "title": "Contact No", "data": "contact_no", "name": "contact_no", sortable: true,},
            { "title": "Email", "data": "email", "name": "email", sortable: true,},


            { "title": "Country", "data": "country", "name": "country", sortable: true,},
            { "title": "State", "data": "state", "name": "state", sortable: true,},
            { "title": "City", "data": "city", "name": "city", sortable: true,},

            { "title": "Contact_person", "data": "contact_person", "name": "contact_person", sortable: true,},
            
            { "title": "Rerence Franchise Name", "data": "rerence_franchise_name", "name": "rerence_franchise_name", sortable: true,},

            { "title": "Franchise Code", "data": "franchise_code", "name": "franchise_code", sortable: true,},

            { "title": "Create Date", "data": "created_at", searchable: false},

            { "title": "Payment Status", "data": "payment_status", "name": "payment status", sortable: true,},

            { "title": "Status", "data": "status", searchable: false},
            { "title": "Action", "data": "action", searchable: false, sortable:false,width:'10%' }
          ],

        lengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100]
        ],
        pageLength: 10,

        "responsive": false,
        "ajax": {
            "url": "{{ route('admin.sub_franchise.listing') }}", // ajax source    
        },        
     });

    @else

        $('#sub-franchise-datatable').dataTable({
        "processing": true,
        "serverSide": true,
         "columns": [
            { "title": "Id", "data": "id", "name":"id"},
            { "title": "Business Name", "data": "business_name", "name": "business_name", searchable: true, sortable: true,},
            { "title": "Franchise Name", "data": "franchise_name", "name": "franchise_name", searchable: true, sortable: true,},

            
            { "title": "Contact No", "data": "contact_no", "name": "contact_no", sortable: true,},
            { "title": "Email", "data": "email", "name": "email", sortable: true,},


            { "title": "Country", "data": "country", "name": "country", sortable: true,},
            { "title": "State", "data": "state", "name": "state", sortable: true,},
            { "title": "City", "data": "city", "name": "city", sortable: true,},

            { "title": "Contact_person", "data": "contact_person", "name": "contact_person", sortable: true,},
            
            { "title": "Rerence Franchise Name", "data": "rerence_franchise_name", "name": "rerence_franchise_name", sortable: true,},

            { "title": "Franchise Code", "data": "franchise_code", "name": "franchise_code", sortable: true,},

            { "title": "Create Date", "data": "created_at", searchable: false},

            { "title": "Payment Status", "data": "payment_status", "name": "payment status", sortable: true,},

            { "title": "Status", "data": "status", searchable: false},
            { "title": "Action", "data": "action", searchable: false, sortable:false,width:'10%' }
          ],

        lengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100]
        ],
        pageLength: 10,

        "responsive": false,
        "ajax": {
            "url": "{{ route('admin.sub_franchise.listing') }}", // ajax source    
        },        
     });
        
    @endif


        $(document).on('click','#status',function(){
          var status = $(this).prop('checked') == true ? 1 : 0;
          var card_id = $(this).val();

            $.ajax({
              type: "POST",
              url: "{{ route('admin.sub_franchise.status') }}",
              data: { "_token": "{{ csrf_token() }}" , id: card_id, status:status },
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


 </script>


@endpush

