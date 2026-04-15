@extends('frontend.layouts.app')

@section('content')
    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            {{ $industry['name'] }}</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Industry Details</p>
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
                        <img src="{{ asset('image/' . ($industry['image'] ?? 'tech-banner.png')) }}"
                            alt="{{ $industry['name'] }} Banner" class="single-service-img" style="object-fit: cover;">
                        <div class="single-service-title-layout">
                            <div class="">
                                <div class="single-service-spacer"></div>
                                <div class="single-service-title-wrapper">
                                    <div class="single-service-title">
                                        <div class="sub-heading animate-box animated slow animate__animated"
                                            data-animate="animate__fadeInRight">
                                            <i class="fa-regular fa-circle-dot"></i>
                                            <span>Industry Solutions</span>
                                        </div>
                                        <h3 class="title-heading animate-box animated animate__animated"
                                            data-animate="animate__fadeInRight">Empowering {{ $industry['name'] }} With
                                            Technology</h3>
                                        <p>{{ $industry['description'] }}</p>
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
                                    {{ $industry['overview'] }}
                                </p>

                                <div class="card service-included">
                                    <h4>Key Solutions Designed For You</h4>
                                    <div class="underline-accent-short"></div>
                                    <div class="row row-cols-md-2 row-cols-1 grid-spacer-2 mt-4">
                                        <div class="col">
                                            <ul class="check-list">
                                                @foreach (array_slice($industry['features'], 0, ceil(count($industry['features']) / 2)) as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="check-list">
                                                @foreach (array_slice($industry['features'], ceil(count($industry['features']) / 2)) as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4>Why Partner With Us?</h4>
                                <div class="row row-cols-2 mt-2">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex flex-column gspace-2">
                                            @foreach (array_slice($industry['why_choose'], 0, ceil(count($industry['why_choose']) / 2)) as $why)
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
                                            @foreach (array_slice($industry['why_choose'], ceil(count($industry['why_choose']) / 2)) as $why)
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
                                    <h4>Other Industries</h4>
                                    <div class="underline-accent-short"></div>
                                    <ul class="single-service-list">
                                        <li><a href="{{ route('industry.details', 'healthcare') }}">Healthcare</a></li>
                                        <li><a href="{{ route('industry.details', 'finance-banking') }}">Finance &
                                                Banking</a></li>
                                        <li><a href="{{ route('industry.details', 'manufacturing') }}">Manufacturing</a>
                                        </li>
                                        <li><a href="{{ route('industry.details', 'retail-ecommerce') }}">Retail &
                                                E-commerce</a></li>
                                        <li><a href="{{ route('industry.details', 'real-estate') }}">Real Estate</a></li>
                                        <li><a href="{{ route('industry.details', 'startups') }}">Startups</a></li>
                                    </ul>
                                </div>
                                <div class="cta-service-banner">
                                    <div class="spacer"></div>
                                    <h3 class="title-heading">Elevate Your Operations Today!</h3>
                                    <p>
                                        Leverage our deep industry expertise and innovative digital solutions to accelerate
                                        your organizational growth securely.
                                    </p>
                                    <div class="link-wrapper">
                                        <a href="{{ route('contact') }}">Contact Us</a>
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
