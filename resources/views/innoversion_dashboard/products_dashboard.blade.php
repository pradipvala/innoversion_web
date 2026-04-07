

@extends('home_layouts.home_layout_app')


@push('url_title') Products @endpush 
@section('title', 'Innoversion Products') 
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


<?php //dd($products); ?>
<div class="content">
    <div class="container">
        <div class="row">
            @if(isset($products) && !empty($products))
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box fadeInDown animated">
                            <center>
                                @if(isset($product->image) && !empty($product->image))
                                    <img src="{{  \Storage::url($product->image) }}" width="120" height="120"><br /><br />
                                @else
                                    <img src="{{ url('frontend_theme/assets/defaults/no-image.jpg') }}" width="120" height="120">
                                @endif
                                <div class="clearfix">
                                    <div class="pull-center">
                                        <h4>{{ $product->title }}</h4>
                                    </div>
                                </div><br>
                                <div class="">
                                    <a href="{{ url('view_products', $product->id) }} " class="btn btn-primary waves-effect waves-light">View More</a>
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
