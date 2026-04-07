@extends('admin.layouts.app') 
@push('url_title') Home @endpush 
@section('title', 'Admin Dashboard') 
@push('content')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box fadeInDown animated">
                    <div class="bg-icon bg-icon-info pull-left">
                        <i class="md md-attach-money text-info"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">0</b></h3>
                        <p class="text-muted">Services</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-pink pull-left">
                        <i class="md md-add-shopping-cart text-pink"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">0</b></h3>
                        <p class="text-muted">Products</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-purple pull-left">
                        <i class="md md-equalizer text-purple"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">0</b></h3>
                        <p class="text-muted">Gallery</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-success pull-left">
                        <i class="md md-remove-red-eye text-success"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">0</b></h3>
                        <p class="text-muted">Blogs</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- container -->
</div>
@endpush 

@push('js')

@endpush
