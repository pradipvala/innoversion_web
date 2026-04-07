

@extends('admin.layouts.app')

@push('url_title') Payment Details  @endpush

@section('title',  'Payment Details')



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
          <div class="form-group">
            <div class="col-sm-3">
              <label><b>Hello</b> :- </label>
              
            </div>
          </div>
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
  $("#franchise-form").validate({
    rules: {
        // business_name   : 'required'

      },
      messages: {
        // business_name   : 'This field is required.',
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
