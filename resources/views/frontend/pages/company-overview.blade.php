@extends('frontend.layouts.app')

@section('content')
    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">Company Overview</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Company Overview</p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>
        
        <!-- Section Overview -->
        <div class="section pb-4">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="image-container">
                        <img src="{{ asset('image/dummy-img-600x400.jpg') }}" alt="Company Overview Banner" class="single-service-img" style="object-fit: cover;">
                        <div class="single-service-title-layout">
                            <div class="">
                                <div class="single-service-spacer"></div>
                                <div class="single-service-title-wrapper">
                                    <div class="single-service-title">
                                        <div class="sub-heading animate-box animated slow animate__animated" data-animate="animate__fadeInRight">
                                            <i class="fa-regular fa-circle-dot"></i>
                                            <span>Who We Are</span>
                                        </div>
                                        <h3 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">Driving Innovation & Excellence Globally</h3>
                                        <p>At Marko, we believe in transforming businesses through robust technology, scalable digital solutions, and creative strategies tailored specifically to empower our partners.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-service-spacer"></div>
                        </div>
                    </div>

                    <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                        <div class="col col-xl-8">
                            <div class="d-flex flex-column gspace-2">
                                <h4>Our Mission</h4>
                                <p>
                                    Our mission is to deliver comprehensive, future-ready digital solutions that bridge the gap between complex challenges and sustainable success. We focus on building lasting relationships with our clients through transparency, dedication, and an uncompromising standard of quality.
                                </p>

                                <div class="card service-included mt-4">
                                    <h4>Our Vision & Values</h4>
                                    <div class="underline-accent-short"></div>
                                    <p>We envision a tech-driven world where businesses of all scales can thrive efficiently. Integrity, innovation, and client-centricity remain the pillars of everything we do.</p>
                                    <div class="row row-cols-md-2 row-cols-1 grid-spacer-2 mt-4">
                                        <div class="col">
                                            <ul class="check-list">
                                                <li>Client-First Approach</li>
                                                <li>Uncompromising Quality</li>
                                                <li>Data-Driven Strategies</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="check-list">
                                                <li>Agile Mentality</li>
                                                <li>Continuous Innovation</li>
                                                <li>Trusted Partnerships</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mt-4">Why We Stand Out</h4>
                                <p>Over the years, we have honed our methodologies, combining creative flair with deep technical expertise to ensure our solutions not only look incredible but perform identically well.</p>
                                <div class="row row-cols-2 mt-2">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex flex-column gspace-2">
                                            <div class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                <div class="d-flex flex-column gspace-0">
                                                    <h5>Global Reach</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                <div class="d-flex flex-column gspace-0">
                                                    <h5>Expert Team</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex flex-column gspace-2">
                                            <div class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                <div class="d-flex flex-column gspace-0">
                                                    <h5>Scalable Frameworks</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                <div class="d-flex flex-column gspace-0">
                                                    <h5>24/7 Support</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-4">
                            <div class="d-flex flex-column flex-md-row flex-xl-column justify-content-between gspace-5">
                                <div class="card service-recent">
                                    <h4>Quick Links</h4>
                                    <div class="underline-accent-short"></div>
                                    <ul class="single-service-list">
                                        <li><a href="{{ route('team') }}">Leadership & Team</a></li>
                                        <li><a href="javascript:void(0)">Our Process</a></li>
                                        <li><a href="{{ route('testimonials') }}">Client Testimonials</a></li>
                                        <li><a href="javascript:void(0)">Case Studies</a></li>
                                        <li><a href="{{ route('open-positions') }}">Open Positions</a></li>
                                    </ul>
                                </div>
                                <div class="cta-service-banner">
                                    <div class="spacer"></div>
                                    <h3 class="title-heading">Join Our Journey</h3>
                                    <p>
                                        We are constantly growing and looking for amazing partners. Reach out to see how we can collaborate.
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
