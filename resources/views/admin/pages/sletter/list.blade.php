@extends('admin.layouts.app')
@push('url_title') Sletter @endpush
@section('title')
@push('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="m-t-0 m-b-10 row">
              <div class="col-sm-4">
                <h4 class="m-t-0 header-title"><b> Sletter</b></h4>
              </div>
            <br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="sletter-datatable" class="table table-striped table-bordered">
                                
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

     $('#sletter-datatable').dataTable({
        "processing": true,
        "serverSide": true,
        "searching" : true,
        "columns": [
            { "title": "Id", "data": "id", "name": "id"},
            { "title": "Email", "data": "email", "name": "email"},
            { "title": "isActive", "data": "status", searchable: false},
            { "title": "Action", "data": "action", searchable: false, sortable:false }
        ],

        lengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100]
        ],
        pageLength: 10,

        "responsive": false,
        "ajax": {
            "url": "{{ route('admin.sletters.listing') }}", // ajax source    
        },
     });

     $(document).on('click','#status',function(){
          var status = $(this).prop('checked') == true ? 1 : 0;
          var sletter_id = $(this).val();

          $.ajax({
              type: "POST",
              url: "{{ route('admin.change.status.sletter') }}",
              data: { "_token": "{{ csrf_token() }}" , id: sletter_id, status:status },
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
