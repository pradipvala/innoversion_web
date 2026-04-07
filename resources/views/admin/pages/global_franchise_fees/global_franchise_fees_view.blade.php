

@extends('admin.layouts.app')

@push('url_title') Global Franchise Fees @endpush

@section('title',  'Global Franchise Fees')



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
        <div class="row">
          <div class="col-lg-12 margin-tb mb-4">
              <div class="pull-right">
                  <a class="btn btn-primary" href="{{ route('admin.global_franchise') }}"> Back</a>
              </div>
          </div>
        </div>
        <div class="row form-horizontal">
          <div class="form-group">
            <div class="col-sm-6">
              <label><b>Global Franchise Fees</b> :- </label>
                {{ isset($global_franchise_fees->global_franchise_fees) &&!empty($global_franchise_fees->global_franchise_fees)?$global_franchise_fees->global_franchise_fees:NULL;}}
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

  // $(document).ready(function () {


  // });
</script>

@endpush
