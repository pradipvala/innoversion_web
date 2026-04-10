@extends('frontend.layouts.app')

@section('content')
    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            {{ $service['name'] }}</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Service Details</p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>

        <!-- Section Details -->
        <div class="section pb-4">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="image-container">
                        <img src="{{ asset('image/dummy-img-600x400.jpg') }}" alt="{{ $service['name'] }} Banner"
                            class="single-service-img" style="object-fit: cover;">
                        <div class="single-service-title-layout">
                            <div class="">
                                <div class="single-service-spacer"></div>
                                <div class="single-service-title-wrapper">
                                    <div class="single-service-title">
                                        <div class="sub-heading animate-box animated slow animate__animated"
                                            data-animate="animate__fadeInRight">
                                            <i class="fa-regular fa-circle-dot"></i>
                                            <span>Our Expertise</span>
                                        </div>
                                        <h3 class="title-heading animate-box animated animate__animated"
                                            data-animate="animate__fadeInRight">Accelerating Growth With
                                            {{ $service['name'] }}</h3>
                                        <p>{{ $service['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-service-spacer"></div>
                        </div>
                    </div>

                    <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                        <div class="col col-xl-8">
                            <div class="d-flex flex-column gspace-2">
                                <h4>Overview</h4>
                                <p>
                                    {{ $service['overview'] }}
                                </p>

                                <div class="card service-included">
                                    <h4>What's Included</h4>
                                    <div class="underline-accent-short"></div>
                                    <div class="row row-cols-md-2 row-cols-1 grid-spacer-2 mt-4">
                                        <div class="col">
                                            <ul class="check-list">
                                                @foreach (array_slice($service['features'], 0, ceil(count($service['features']) / 2)) as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="check-list">
                                                @foreach (array_slice($service['features'], ceil(count($service['features']) / 2)) as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4>Why Choose {{ $service['name'] }}?</h4>
                                <div class="row row-cols-2 mt-2">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex flex-column gspace-2">
                                            @foreach (array_slice($service['why_choose'], 0, ceil(count($service['why_choose']) / 2)) as $why)
                                                <div
                                                    class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                    <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                    <div class="d-flex flex-column gspace-0">
                                                        <h5>{{ $why }}</h5>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex flex-column gspace-2">
                                            @foreach (array_slice($service['why_choose'], ceil(count($service['why_choose']) / 2)) as $why)
                                                <div
                                                    class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                    <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                    <div class="d-flex flex-column gspace-0">
                                                        <h5>{{ $why }}</h5>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-4">
                            <div class="d-flex flex-column flex-md-row flex-xl-column justify-content-between gspace-5">
                                <div class="card service-recent">
                                    <h4>Other Services</h4>
                                    <div class="underline-accent-short"></div>
                                    <ul class="single-service-list">
                                        <li><a href="{{ route('service.details', 'custom-software-development') }}">Custom
                                                Software Development</a></li>
                                        <li><a href="{{ route('service.details', 'web-application-development') }}">Web App
                                                Development</a></li>
                                        <li><a href="{{ route('service.details', 'mobile-app-development') }}">Mobile App
                                                Development</a></li>
                                        <li><a href="{{ route('service.details', 'api-integration-services') }}">API
                                                Integration</a></li>
                                        <li><a href="{{ route('service.details', 'ui-ux-design') }}">UI/UX Design</a></li>
                                        <li><a href="{{ route('service.details', 'digital-marketing-seo') }}">Digital
                                                Marketing & SEO</a></li>
                                    </ul>
                                </div>
                                <div class="cta-service-banner">
                                    <div class="spacer"></div>
                                    <h3 class="title-heading">Transform Your Business with Marko!</h3>
                                    <p>
                                        Take your digital transformation to the next level with data-driven strategies and
                                        innovative tech stacks. Let's create something amazing together!
                                    </p>
                                    <div class="link-wrapper">
                                        <a href="{{ route('about') }}">Read More</a>
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
