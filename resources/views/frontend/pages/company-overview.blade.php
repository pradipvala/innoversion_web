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
                                            data-animate="animate__fadeInRight">Driving Innovation & Excellence Globally
                                        </h3>
                                        <p>At Innoversion Technolab, we are committed to delivering cutting-edge digital
                                            solutions that empower businesses to innovate, scale, and succeed in a rapidly
                                            evolving technological landscape. We combine strong technical expertise with a
                                            solution-driven approach to build high-performance, scalable, and future-ready
                                            digital products. Our focus is to create meaningful impact through innovation,
                                            precision, and a deep understanding of business challenges.</p>
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
                                    Our mission is to become a trusted technology partner for businesses by delivering
                                    intelligent, high-quality, and innovative digital solutions. We aim to help
                                    organizations evolve through the power of modern technologies, exceptional design, and
                                    scalable software development. We are dedicated to building engaging applications,
                                    robust platforms, and seamless digital experiences that combine performance,
                                    reliability, and user-centric design, ensuring long-term success for our clients,
                                    partners, and stakeholders.
                                </p>

                                <div class="card service-included mt-4">
                                    <h4>Our Vision & Values</h4>
                                    <div class="underline-accent-short"></div>
                                    <p>Our vision is to be a globally recognized technology partner, delivering advanced
                                        solutions that are accessible, impactful, and future-ready. We strive to
                                        continuously adapt, innovate, and evolve to meet changing market demands while
                                        maintaining excellence in execution.</p>
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
