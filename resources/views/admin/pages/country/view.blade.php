

@extends('admin.layouts.app')

@push('url_title')
Show Country
@endpush


@section('title', 'Show Country')


@push('content')





<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="name">Country Name</label>
                            <input type="text" name="country_name" id="country_name" class="form-control" placeholder="" value="{{ $data->country_name ??'' }}" disabled>
                        </div>
                    
                        <div class="col-sm-3">
                            <label for="code">Country code</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="Enter country code"value="{{ $data->code ??'' }}"disabled>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-lg-10">
                            <a class="btn btn-primary" href="{{ route('admin.country') }}"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endpush