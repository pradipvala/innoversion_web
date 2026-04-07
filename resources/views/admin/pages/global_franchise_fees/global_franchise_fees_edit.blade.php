

@extends('admin.layouts.app')

@push('url_title') Edit Global Franchise Fees @endpush

@section('title',  'Edit Global Franchise Fees')



@push('content')

<?php //dd($global_franchise_fees); ?>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
              <form class="form-horizontal" id="global-franchise-fees-form" role="form" method="POST" action="{{ route('admin.global_franchise.update',['id'=>$global_franchise_fees->id]) }}" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="id" value="{{ isset($global_franchise_fees->id) ? $global_franchise_fees->id : '' }} ">
                <div class="form-group">
                  <div class="col-sm-6">
                    <label>Global Franchise Fess:</label>
                      <input type="text" name="global_franchise_fees" id="global_franchise_fees" class="form-control" value="{{ isset($global_franchise_fees->global_franchise_fees) &&!empty($global_franchise_fees->global_franchise_fees)?$global_franchise_fees->global_franchise_fees:NULL;}}"required> 
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
  $("#global-franchise-fees").validate({
    rules: {
        global_franchise_fees   : 'required'
      },
      messages: {
        global_franchise_fees   : 'This field is required.',
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
