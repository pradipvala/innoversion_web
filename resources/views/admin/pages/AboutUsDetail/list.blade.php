@extends('admin.layouts.app')
@push('url_title') About Us Details @endpush
@section('title')
@push('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="m-t-0 m-b-10 row">
              <div class="col-sm-4">
                <h4 class="m-t-0 header-title"><b>About Us Details</b></h4>
              </div>
                <div class="col-sm-8 text-right">
                <a class="btn btn-primary" href="{{ route('admin.create.about_us_detail') }}" role="button"> <span><i class="fa fa-plus"></i></span> Add About Us Details</a>
            </div><br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="about_us_detail_datatable" class="table table-striped table-bordered">
                                
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

     $('#about_us_detail_datatable').dataTable({
        "processing": true,
        "serverSide": true,
        "searching" : true,
        "columns": [
            { "title": "Id", "data": "id", "name": "id"},
            
            { "title": "Title", "data": "title", "name": "title"},
            { "title": "Short description", "data": "short_description", "name": "short_description"},
            { "title": "Description", "data": "description", "name": "description"},
            
            
            { "title": "About us ceo image", "data": "about_us_ceo_image", "name": "about_us_ceo_image"},
            { "title": "About us ceo info", "data": "about_us_ceo_info", "name": "about_us_ceo_info"},
            
            { "title": "CEO name", "data": "ceo_name", "name": "ceo_name"},
            { "title": "CEO designation", "data": "ceo_name", "name": "ceo_name"},
            
            { "title": "Mission title", "data": "mission_title", "name": "mission_title"},
            { "title": "Mission description", "data": "mission_description", "name": "mission_description"},
            { "title": "Mission image", "data": "mission_image", "name": "mission_image"},
            
            { "title": "Vision title", "data": "vision_title", "name": "vision_title"},
            { "title": "Vision description", "data": "vision_description", "name": "vision_description"},
            { "title": "Vision image", "data": "vision_image", "name": "vision_image"},
            
            
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
            "url": "{{ route('admin.about_us_detail.listing') }}", // ajax source    
        },
     });

     $(document).on('click','#status',function(){
          var status = $(this).prop('checked') == true ? 1 : 0;
          var about_us_id = $(this).val();

          $.ajax({
              type: "post",
              url: "{{ route('admin.change.status.about_us_detail') }}",
              data: { "_token": "{{ csrf_token() }}" , id: about_us_id, status:status },
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
