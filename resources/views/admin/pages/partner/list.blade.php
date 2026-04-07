@extends('admin.layouts.app')
@push('url_title') Partner @endpush
@section('title')
@push('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="m-t-0 m-b-10 row">
              <div class="col-sm-4">
                <h4 class="m-t-0 header-title"><b>Partner</b></h4>
              </div>
                <div class="col-sm-8 text-right">
                <a class="btn btn-primary" href="{{ route('admin.create.partner') }}" role="button"> <span><i class="fa fa-plus"></i></span> Add Partner</a>
            </div><br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="partner-datatable" class="table table-striped table-bordered">
                                
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

     $('#partner-datatable').dataTable({
        "processing": true,
        "serverSide": true,
         "columns": [
            { "title": "Id", "data": "id", "name":"id"},
            { "title": "Image", "data": "image", "name": "image", searchable: false, sortable: true,},
            { "title": "isActive", "data": "status", searchable: false},
            { "title": "Create Date", "data": "created_at", searchable: false},
            { "title": "Action", "data": "action", searchable: false, sortable:false,width:'10%' }
        ],

        lengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100]
        ],
        pageLength: 10,

        "responsive": false,
        "ajax": {
            "url": "{{ route('admin.partners.listing') }}", // ajax source    
        },        
     });

     $(document).on('click','#status',function(){
          var status = $(this).prop('checked') == true ? 1 : 0;
          var partner_id = $(this).val();

          $.ajax({
              type: "POST",
              url: "{{ route('admin.change.status.partner') }}",
              data: { "_token": "{{ csrf_token() }}" , id: partner_id, status:status },
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
@endsection
