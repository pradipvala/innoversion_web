

@extends('admin.layouts.app')


@push('url_title') Services @endpush 
@section('title', 'Innoversion Services') 
@push('content')

@if(session('success'))
    <div class="alert alert-success" role="alert">
        <h4>{{ session('success') }}</h4>
    </div>
@endif


@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<?php //dd($services); ?>
<div class="content">
    <div class="container">
        <div class="row">
            @if(isset($services) && !empty($services))
                @foreach($services as $service)
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box fadeInDown animated">
                            <center>
                                <img src="{{ \Storage::url($service->image) }}" height="180px" width="180px"><br /><br />
                                <div class="clearfix">
                                    <div class="pull-center"><h4>{{ $service->title }}</h4></div>
                                </div><br>
                                <div class="">
                                    <a href="{{ url('admin/view_service', $service->id) }} " class="btn btn-primary waves-effect waves-light">View More</a>
                                </div>
                            </center>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-6 col-lg-3">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <center>
                            <img width="20%" src="{{ asset('frontend_theme/assets/images/innoversion_logo.png') }}">
                            <div class="clearfix">
                                <div class="pull-center"><h4>No Details Found</h4></div>
                            </div><br>
                        </center>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endpush 

@push('js')

@endpush
