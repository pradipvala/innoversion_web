@extends('admin.layouts.app')
@push('url_title') Digital Visit Card @endpush
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
                <h4 class="m-t-0 header-title"><b>Digital Visit Card</b></h4>
              </div>
                <div class="col-sm-8 text-right">
                <a class="btn btn-primary" href="{{ route('admin.create.card') }}" role="button"> <span><i class="fa fa-plus"></i></span> Add Digital visit Card</a>
            </div><br><br>
            </div>
             <table id="table_DT" class="table table-striped table-bordered">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="table-responsive">
                             <table id="card-datatable" class="table table-striped table-bordered">
                                
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

     $('#card-datatable').dataTable({
        "processing": true,
        "serverSide": true,
         "columns": [
            { "title": "Id", "data": "id", "name":"id"},
            { "title": "Company_logo", "data": "company_logo", "name": "company_logo", searchable: false, sortable: true,},


            { "title": "Name", "data": "name", "name": "name", sortable: true,},
            { "title": "Designation", "data": "designation", "name": "designation", sortable: true,},

            { "title": "Company_name", "data": "company_name", "name": "company_name", sortable: true,},
            { "title": "Company_description", "data": "company_description", "name": "company_description", sortable: true,},
            { "title": "Phone_no", "data": "phone_no", "name": "phone_no", sortable: true,},

            { "title": "Email", "data": "email", "name": "email", sortable: true,},
            { "title": "Website", "data": "website", "name": "website", sortable: true,},
            { "title": "Address", "data": "address", "name": "address", sortable: true,},
            { "title": "Location", "data": "location", "name": "location", sortable: true,},


            // { "title": "Bank_name", "data": "bank_name", "name": "bank_name", sortable: true,},
            // { "title": "Account_holder_name", "data": "account_holder_name", "name": "account_holder_name", sortable: true,},
            // { "title": "Bank_account_name", "data": "bank_account_name", "name": "bank_account_name", sortable: true,},
            // { "title": "Bank_ifsc_code", "data": "bank_ifsc_code", "name": "bank_ifsc_code", sortable: true,},
            // { "title": "Gst_no", "data": "gst_no", "name": "gst_no", sortable: true,},
            // { "title": "Card_details", "data": "card_details", "name": "card_details", sortable: true,},

            
            { "title": "Whatsapp_no", "data": "whatsapp_no", "name": "whatsapp_no", sortable: true,},
            { "title": "Facebook", "data": "facebook", "name": "facebook", sortable: true,},
            { "title": "X_Link", "data": "x_link", "name": "x_link", sortable: true,},
            { "title": "Linkedin", "data": "linkedin", "name": "linkedin", sortable: true,},
            { "title": "Instagram", "data": "instagram", "name": "instagram", sortable: true,},

            { "title": "Generated_vcard_link", "data": "generated_vcard_link", "name": "generated_vcard_link", sortable: true,},
            

            { "title": "Wallet_payment_qr_code", "data": "wallet_pay_qr_code", "name": "wallet_pay_qr_code", searchable: false, sortable: true,},

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
            "url": "{{ route('admin.card.listing') }}", // ajax source    
        },        
     });


        $(document).on('click','#status',function(){
          var status = $(this).prop('checked') == true ? 1 : 0;
          var card_id = $(this).val();

            $.ajax({
              type: "POST",
              url: "{{ route('admin.change.status.card') }}",
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
@endsection
