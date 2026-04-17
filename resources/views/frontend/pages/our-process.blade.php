@extends('frontend.layouts.app')

@section('content')
    <main>
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            Our Process</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Our Process</p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>

        <div class="section pb-4">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="image-container">
                        <img src="{{ asset('image/our-process.jpg') }}" alt="Our Process Banner" class="single-service-img"
                            style="object-fit: cover;">
                        <div class="single-service-title-layout">
                            <div>
                                <div class="single-service-spacer"></div>
                                <div class="single-service-title-wrapper">
                                    <div class="single-service-title">
                                        <div class="sub-heading animate-box animated slow animate__animated"
                                            data-animate="animate__fadeInRight">
                                            <i class="fa-regular fa-circle-dot"></i>
                                            <span>Our Process</span>
                                        </div>
                                        <h3 class="title-heading animate-box animated animate__animated"
                                            data-animate="animate__fadeInRight">How We Deliver Results</h3>
                                        <p>At Innoversion Technolab, we follow a structured, transparent, and result-driven
                                            process to ensure every project is delivered with precision, quality, and
                                            efficiency. Our approach focuses on understanding your business needs, applying
                                            the right technologies, and delivering scalable solutions that drive measurable
                                            outcomes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-service-spacer"></div>
                        </div>
                    </div>

                    <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                        <div class="col col-xl-8">
                            <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>1. Discovery & Requirement Analysis</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We begin by understanding your business goals, challenges, and project
                                            requirements.
                                            Our team conducts detailed discussions and analysis to define a clear roadmap
                                            for
                                            success.</p>
                                        <ul class="check-list mt-3">
                                            <li>Business & Market Understanding</li>
                                            <li>Requirement Gathering & Planning</li>
                                            <li>Project Scope Definition</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>2. Strategy & Planning</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We create a strategic plan tailored to your project, selecting the right
                                            technologies,
                                            architecture, and approach to ensure scalability and performance.</p>
                                        <ul class="check-list mt-3">
                                            <li>Technical Architecture Design</li>
                                            <li>Technology Stack Selection</li>
                                            <li>Timeline & Milestone Planning</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>3. UI/UX Design & Prototyping</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>Our design team focuses on creating intuitive, engaging, and user-friendly
                                            experiences
                                            that align with your brand and enhance usability.</p>
                                        <ul class="check-list mt-3">
                                            <li>Wireframes & Prototypes</li>
                                            <li>User Experience Optimization</li>
                                            <li>Visual Design & Branding</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>4. Development & Implementation</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We build robust, scalable, and high-performance applications using modern
                                            technologies
                                            and best development practices.</p>
                                        <ul class="check-list mt-3">
                                            <li>Web & Mobile Development</li>
                                            <li>API Integration & Backend Development</li>
                                            <li>Scalable & Secure Coding</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>5. Testing & Quality Assurance</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We ensure your product meets the highest standards through rigorous testing and
                                            quality
                                            checks before deployment.</p>
                                        <ul class="check-list mt-3">
                                            <li>Functional & Performance Testing</li>
                                            <li>Bug Fixing & Optimization</li>
                                            <li>Security & Compatibility Checks</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>6. Deployment & Launch</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We deploy your solution in a secure and optimized environment, ensuring a smooth
                                            and
                                            successful launch.</p>
                                        <ul class="check-list mt-3">
                                            <li>Cloud Deployment</li>
                                            <li>Performance Monitoring</li>
                                            <li>Go-Live Support</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>7. Support & Continuous Improvement</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>Our commitment continues after launch with ongoing support, maintenance, and
                                            improvements to keep your solution up-to-date and performing at its best.</p>
                                        <ul class="check-list mt-3">
                                            <li>Ongoing Maintenance</li>
                                            <li>Feature Enhancements</li>
                                            <li>Performance Optimization</li>
                                        </ul>
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
                                        <li><a href="{{ route('company.overview') }}">Company Overview</a></li>
                                        <li><a href="{{ route('team') }}">Leadership & Team</a></li>
                                        <li><a href="{{ route('testimonials') }}">Client Testimonials</a></li>
                                        <li><a href="{{ route('open-positions') }}">Open Positions</a></li>
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    </ul>
                                </div>

                                <div class="cta-service-banner cta-service-banner-our-process">
                                    <div class="spacer"></div>
                                    <h3 class="title-heading">Start Your Project</h3>
                                    <p>Let us transform your idea into a scalable digital product with a clear and reliable
                                        delivery process.</p>
                                    <div class="link-wrapper">
                                        <a href="{{ route('contact') }}">Get In Touch</a>
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
