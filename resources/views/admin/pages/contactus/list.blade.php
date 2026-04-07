@extends('admin.layouts.app')
@push('url_title')  Contact Us @endpush
@section('title')

@push('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="m-t-0 m-b-10 row">
              <div class="col-sm-4">
                <h4 class="m-t-0 header-title"><b>Contact Us</b></h4>
              </div>
                <div class="col-sm-8 text-right">
                {{-- <a class="btn btn-primary" href="{{ route('admin.create.slider') }}" role="button"> <span><i class="fa fa-plus"></i></span> Add slider</a> --}}
            </div><br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="contactus-datatable" class="table table-striped table-bordered">
                                
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

    
    
    
    $('#contactus-datatable').dataTable({
        
        "processing": true,
        "serverSide": true,
        "searching" : true,
        
        "lengthMenu" : [[ 10, 25, 50, 100, -1 ],[ '10', '25', '50', '100', 'All' ]],
        
      "columns": [
            { "title": "Id", "data": "id", "name": "id"},
            { "title": "First Name", "data": "first_name", "name": "first_name"},
            { "title": "Last Name", "data": "last_name", "name": "last_name"},
            { "title": "Email", "data": "contact_email", "name": "contact_email"},
            { "title": "Phone Number", "data": "phone_number", "name": "phone_number"},
            { "title": "Company Name", "data": "company_name", "name": "company_name"},
            { "title": "Message", "data": "message", "name": "message"},
            { "title": "Created Time", "data": "created_at", searchable: false, sortable:false },
            { "title": "Action", "data": "action", searchable: false, sortable:false }
            
        ],

        // lengthMenu: [
        //     [10, 25, 50, 100, "All"],
        //     [10, 25, 50, 100, "All"]
        // ],
        // pageLength: 10,
        
        
         
         
        'dom': 'Bfrtip',
                'buttons': [
                    'pageLength',
                    'pdf',
                    'csv',
                    'excel',
                    'print'
                ],
        "responsive": false,
        "ajax": {
            "url": "{{ route('admin.contactus.listing') }}", // ajax source    
        },
     });

 </script>



@endpush
@endsection
