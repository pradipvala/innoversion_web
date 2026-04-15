@extends('frontend.layouts.app')

@section('content')
    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            {{ $technology['name'] }}</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Technology Details</p>
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
                        <img src="{{ asset('image/' . ($technology['image'] ?? 'tech-banner.png')) }}"
                            alt="{{ $technology['name'] }} Banner" class="single-service-img" style="object-fit: cover;">
                        <div class="single-service-title-layout">
                            <div class="">
                                <div class="single-service-spacer"></div>
                                <div class="single-service-title-wrapper">
                                    <div class="single-service-title">
                                        <div class="sub-heading animate-box animated slow animate__animated"
                                            data-animate="animate__fadeInRight">
                                            <i class="fa-regular fa-circle-dot"></i>
                                            <span>Technology Spotlight</span>
                                        </div>
                                        <h3 class="title-heading animate-box animated animate__animated"
                                            data-animate="animate__fadeInRight">
                                            {{ $technology['hero_title'] ?? 'Powering The Future With ' . $technology['name'] }}
                                        </h3>
                                        <p>{{ $technology['description'] }}</p>
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
                                    {{ $technology['overview'] }}
                                </p>

                                @if (!empty($technology['included']))
                                    <div class="card service-included">
                                        <h4>What's Included</h4>
                                        <div class="underline-accent-short"></div>
                                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-2 mt-4">
                                            <div class="col">
                                                <ul class="check-list">
                                                    @foreach (array_slice($technology['included'], 0, ceil(count($technology['included']) / 2)) as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <ul class="check-list">
                                                    @foreach (array_slice($technology['included'], ceil(count($technology['included']) / 2)) as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="card service-included">
                                    <h4>Key Features</h4>
                                    <div class="underline-accent-short"></div>
                                    <div class="row row-cols-md-2 row-cols-1 grid-spacer-2 mt-4">
                                        <div class="col">
                                            <ul class="check-list">
                                                @foreach (array_slice($technology['features'], 0, ceil(count($technology['features']) / 2)) as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="check-list">
                                                @foreach (array_slice($technology['features'], ceil(count($technology['features']) / 2)) as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4>Why Choose {{ $technology['name'] }}?</h4>
                                <div class="row row-cols-2 mt-2">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex flex-column gspace-2">
                                            @foreach (array_slice($technology['why_choose'], 0, ceil(count($technology['why_choose']) / 2)) as $why)
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
                                            @foreach (array_slice($technology['why_choose'], ceil(count($technology['why_choose']) / 2)) as $why)
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
                                    <h4>Other Technologies</h4>
                                    <div class="underline-accent-short"></div>
                                    <ul class="single-service-list">
                                        <li><a href="{{ route('technology.details', 'react') }}">React.js</a></li>
                                        <li><a href="{{ route('technology.details', 'vue') }}">Vue.js</a></li>
                                        <li><a href="{{ route('technology.details', 'laravel') }}">Laravel</a></li>
                                        <li><a href="{{ route('technology.details', 'node-js') }}">Node.js</a></li>
                                        <li><a href="{{ route('technology.details', 'flutter') }}">Flutter</a></li>
                                        <li><a href="{{ route('technology.details', 'aws') }}">AWS</a></li>
                                    </ul>
                                </div>
                                <div class="cta-service-banner">
                                    <div class="spacer"></div>
                                    <h3 class="title-heading">Transform Your Business with Innoversion Technolab</h3>
                                    <p>
                                        Take your business to the next level with smart, scalable, and secure digital
                                        solutions. We combine innovation and technology to build software that drives real
                                        results.
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
