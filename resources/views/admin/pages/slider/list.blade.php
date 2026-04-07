@extends('admin.layouts.app')
@push('url_title') Sliders @endpush
@section('title')
@push('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="m-t-0 m-b-10 row">
              <div class="col-sm-4">
                <h4 class="m-t-0 header-title"><b>Sliders</b></h4>
              </div>
                <div class="col-sm-8 text-right">
                <a class="btn btn-primary" href="{{ route('admin.create.slider') }}" role="button"> <span><i class="fa fa-plus"></i></span> Add slider</a>
            </div><br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="slider-datatable" class="table table-striped table-bordered">
                                
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

     $('#slider-datatable').dataTable({
        "processing": true,
        "serverSide": true,
        "searching" : true,
        "columns": [
            { "title": "Id", "data": "id", "name": "id"},
            { "title": "Title", "data": "title", "name": "title"},
            { "title": "Description", "data": "description", "name": "description"},
            { "title": "Image", "data": "slider_image", "name": "slider_image"},
            { "title": "isActive", "data": "status", searchable: false},
            { "title": "Create Date", "data": "created_at", searchable: false},
            { "title": "Action", "data": "action", searchable: false, sortable:false }
        ],

        lengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100]
        ],
        pageLength: 10,

        "responsive": false,
        "ajax": {
            "url": "{{ route('admin.sliders.listing') }}", // ajax source    
        },
     });

     $(document).on('click','#status',function(){
          var status = $(this).prop('checked') == true ? 1 : 0;
          var slider_id = $(this).val();

          $.ajax({
              type: "post",
              url: "{{ route('admin.change.status.slider') }}",
              data: { "_token": "{{ csrf_token() }}" , id: slider_id, status:status },
              success:function(result){
                  if(result['status'] == 'true'){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: result['message'],
                        showConfirmButton: false,
                        timer: 1000
                    });
                  }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: result['message'],
                        showConfirmButton: false,
                        timer: 1000
                    });
                  }
              }
          });
      });
 </script>


@endpush
@endsection
