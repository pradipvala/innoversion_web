
@extends('admin.layouts.app')


@push('url_title')
Show Permission Details
@endpush


@section('title', 'Show Permission Details')


@push('content')

<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row form-horizontal">
                    {{-- <div class="col-md-12 margin-tb mb-4">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.permission') }}"> Back</a>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <div class="col-sm-6">
                            <strong>Name:</strong>
                            {{ isset($data->name)&&!empty($data->name)?$data->name:NULL; }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <strong>Guard Name:</strong>
                            {{ isset($data->guard_name)&&!empty($data->guard_name)?$data->guard_name:NULL; }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endpush