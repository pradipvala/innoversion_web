@extends('frontend.layouts.app')

@section('content')
    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            Company Overview</h2>
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
                        <img src="{{ asset('image/company-overview-real.jpg') }}" alt="Company Overview Banner"
                            class="single-service-img" style="object-fit: cover;">
                        <div class="single-service-title-layout">
                            <div class="">
                                <div class="single-service-spacer"></div>
                                <div class="single-service-title-wrapper">
                                    <div class="single-service-title">
                                        <div class="sub-heading animate-box animated slow animate__animated"
                                            data-animate="animate__fadeInRight">
                                            <i class="fa-regular fa-circle-dot"></i>
                                            <span>Who We Are ?</span>
                                        </div>
                                        <h3 class="title-heading animate-box animated animate__animated"
                                            data-animate="animate__fadeInRight">Driving Innovation Through Custom Software
                                            Development

                                        </h3>
                                        <p>We enable businesses with tailored, high-performance software solutions designed
                                            to streamline operations, solve complex challenges, and support long-term
                                            growth.</p>
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
                                    To deliver custom-built, scalable software solutions that align with business goals and
                                    create measurable value.
                                </p>

                                <div class="card service-included mt-4">
                                    <h4>Our Vision & Values</h4>
                                    <div class="underline-accent-short"></div>
                                    <p>To be a trusted partner in custom software development, enabling businesses with
                                        innovative and future-ready technology solutions.
                                    </p>
                                    <div class="row row-cols-md-2 row-cols-1 grid-spacer-2 mt-4">
                                        <div class="col">
                                            <ul class="check-list">
                                                <li>Client-First Approach - Delivering solutions aligned with business goals
                                                </li>
                                                <li>Uncompromising Quality - Maintaining excellence in every project</li>
                                                <li>Data-Driven Strategies - Making informed and effective decisions</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="check-list">
                                                <li>Agile Mentality - Adapting quickly to dynamic requirements</li>
                                                <li>Continuous Innovation - Leveraging modern technologies</li>
                                                <li>Trusted Partnerships - Building long-term client relationships</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{--  <h4 class="mt-4">Why We Stand Out</h4>
                                <p>With a strong foundation in technology and innovation, Innoversion Technolab has
                                    developed a reputation for delivering reliable, scalable, and high-performing digital
                                    solutions. Our approach blends creativity with deep technical expertise to ensure that
                                    every solution is not only visually appealing but also optimized for performance,
                                    scalability, and long-term growth.</p>
                                <div class="row row-cols-2 mt-2">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex flex-column gspace-2">
                                            <div
                                                class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                <div class="d-flex flex-column gspace-0">
                                                    <h5>Global Reach</h5>
                                                    <p class="mb-0">Serving clients across industries and regions</p>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                <div class="d-flex flex-column gspace-0">
                                                    <h5>Expert Team</h5>
                                                    <p class="mb-0">Skilled professionals with strong technical knowledge
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex flex-column gspace-2">
                                            <div
                                                class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                <div class="d-flex flex-column gspace-0">
                                                    <h5>Scalable Frameworks</h5>
                                                    <p class="mb-0">Solutions designed for growth and flexibility</p>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex flex-column flex-md-row align-items-center text-center text-md-start gspace-1">
                                                <i class="fa-regular fa-2x fa-circle-check accent-color"></i>
                                                <div class="d-flex flex-column gspace-0">
                                                    <h5>24/7 Support</h5>
                                                    <p class="mb-0">Continuous assistance and system reliability</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  --}}
                            </div>
                        </div>
                        <div class="col col-xl-4">
                            <div class="d-flex flex-column flex-md-row flex-xl-column justify-content-between gspace-5">
                                <div class="card service-recent">
                                    <h4>Quick Links</h4>
                                    <div class="underline-accent-short"></div>
                                    <ul class="single-service-list">
                                        <li><a href="{{ route('team') }}">Leadership & Team</a></li>
                                        <li><a href="{{ route('our.process') }}">Our Process</a></li>
                                        <li><a href="{{ route('testimonials') }}">Client Testimonials</a></li>
                                        <li><a href="javascript:void(0)">Case Studies</a></li>
                                        <li><a href="{{ route('open-positions') }}">Open Positions</a></li>
                                    </ul>
                                </div>
                                <div class="cta-service-banner cta-service-banner-company-overview">
                                    <div class="spacer"></div>
                                    <h3 class="title-heading">Join Our Journey</h3>
                                    <p>
                                        We are constantly growing and collaborating with forward-thinking businesses.
                                        Partner with Innoversion Technolab to build innovative, scalable, and
                                        high-performing digital solutions.
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
