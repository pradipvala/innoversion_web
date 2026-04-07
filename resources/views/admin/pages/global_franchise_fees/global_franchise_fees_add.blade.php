@extends('admin.layouts.app')

@push('url_title') Global Franchise Fees  @endpush

@section('title',  'Add Global Franchise Fees')



@push('content')


@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif

<div class="content">
    <div class="row ">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="global-franchise-fees-form" role="form" method="POST" action="{{ route('admin.save.global_franchise') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <div class="col-sm-6">
                    <label><b>Global Franchise Fess</b> :- </label>
                      <input type="text" name="global_franchise_fees" id="global_franchise_fees"  class="form-control" required/>
                  </div>
                </div>
                <div class="form-group clearfix">
                  <div class="col-lg-10">
                    <button type="submit"  class="btn btn-success waves-effect waves-light">Save</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endpush

@push('js')

<script type="text/javascript">

  $(document).ready(function () {

    //Form submit
      $("#global-franchise-fees-form").validate({
        rules: {
              global_franchise_fees : 'required'
          },
          messages: {
            global_franchise_fees : 'This field is required.'
            
          },
        submitHandler: function(form){
          if($(form).valid()){
            form.submit();
          }
        }
      });
  });
</script>

@endpush
