
@extends('admin.layouts.app')
@push('url_title') Lead List @endpush





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
                    <h4 class="m-t-0 header-title"><b>Lead List</b></h4>
                </div>
                <div class="col-sm-8 text-right">
                    <a class="btn btn-primary" href="{{ route('admin.create.lead') }}" role="button"> <span><i class="fa fa-plus"></i></span> Add Lead</a>
                </div><br><br>
            </div>

            

            <table id="table_DT" class="table table-striped table-bordered">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="lead-datatable" class="table table-striped table-bordered">
                                
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

    

        $('#lead-datatable').dataTable({
            "processing": true,
            "serverSide": true,
            "columns": [


            { "title": "Id", "data": "id", "name":"id"},
            { "title": "Business Name", "data": "business_name", "name": "business_name", searchable: true, sortable: true,},
            
            { "title": "Country", "data": "country", "name": "country", sortable: true,},
            { "title": "State", "data": "state", "name": "state", sortable: true,},
            { "title": "City", "data": "city", "name": "city", sortable: true,},

            
            { "title": "Create Date", "data": "created_at", searchable: false},

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
            "url": "{{ route('admin.lead.listing') }}", // ajax source    
        },        
     
    });
    
    




    function change_status(object) {
      
      var id = $(object).data("id");
      var status = $(object).data("status");

        if(confirm('Are you sure?')) {
            $.ajax({
                "url": "{!! route('admin.lead.change.status') !!}",
                "dataType": "json",
                "type": "POST",
                "data": {
                  id: id,
                  status: status,
                  _token: "{{ csrf_token() }}"
              },
                success: function(response) {
                    if(response.code == 200) {
                        $('#lead-datatable').DataTable().ajax.reload();   
                        toastr.success('Status changed successfully', 'Success');
                    } else {
                      toastr.error('Failed to change status', 'Error');
                    }
                }
            });
        }else{
            toastr.error('You pressed Cancel!', 'Error');
        }
    }


</script>


@endpush

