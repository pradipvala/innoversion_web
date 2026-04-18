@extends('frontend.layouts.app')

@section('content')
    <!-- Section Main Content -->

    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            About Us</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">About Us</p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>

        <!-- Section About Us -->
        <div class="section">
            <div class="hero-container">

                @foreach ($abouts as $about)
                    <div class="d-flex flex-column flex-xl-row gspace-5">
                        <div class="about-img-layout">
                            <div class="image-container about-img">
                                <img src="{{ isset($about->image) ? asset('storage/' . $about->image) : asset('frontend/image/dummy-img-600x400.jpg') }}"
                                    alt="About Us Image" class="img-fluid animate-box animated animate__animated"
                                    data-animate="animate__fadeInUp">
                                <div class="about-layout">
                                    <div class="d-flex flex-column">
                                        <div class="card-about-wrapper">
                                            <div class="card card-about animate-box animated animate__animated"
                                                data-animate="animate__fadeInDown">
                                                <div class="d-flex flex-row align-items-center">
                                                    <span class="counter" data-target="15">15</span>
                                                    <span class="counter-detail">+</span>
                                                </div>
                                                <h6>Years of Experience on Digital Marketing Services</h6>
                                            </div>
                                        </div>
                                        <div class="about-spacer"></div>
                                    </div>
                                    <div class="about-spacer"></div>
                                </div>
                            </div>
                        </div>
                        <div class="about-title">
                            <div class="d-flex flex-column gspace-2">
                                <div class="sub-heading animate-box animated animate__animated"
                                    data-animate="animate__fadeInRight">
                                    <i class="fa-regular fa-circle-dot"></i>
                                    <span>About Us</span>
                                </div>
                                <h2 class="title-heading animate-box animated animate__animated"
                                    data-animate="animate__fadeInRight">{{ $about->title }}</h2>
                                <p>{{ $about->description }}</p>

                                <div class="d-flex flex-column flex-md-row gspace-1 gspace-md-5">
                                    <div class="about-list">
                                        <ul class="check-list">
                                            <li><a href="{{ route('single.services') }}">PPC & Paid Ads</a></li>
                                            <li><a href="{{ route('single.services') }}">Brand Strategy</a></li>
                                            <li><a href="{{ route('single.services') }}">Conversion Optimization</a></li>
                                        </ul>
                                    </div>
                                    <div class="about-list">
                                        <ul class="check-list">
                                            <li><a href="{{ route('single.services') }}">Performance Marketing</a></li>
                                            <li><a href="{{ route('single.services') }}">Social Media Growth</a></li>
                                            <li><a href="{{ route('single.services') }}">Content Marketing</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Section Partner -->
        <div class="section-partner">
            <div class="hero-container">
                <div class="card card-partner  animate-box animated animate__animated" data-animate="animate__fadeInRight">
                    <div class="partner-spacer"></div>
                    <div class="row row-cols-xl-2 row-cols-1 align-items-center px-5 position-relative z-2">
                        <div class="col">
                            <div class="d-flex flex-column justify-content-start pe-xl-3 pe-0">
                                <h3 class="title-heading">Industries We Work</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column ps-xl-3 ps-0">
                                <p>
                                    At Innoversion Technolab, we deliver impactful digital solutions that drive growth,
                                    boost
                                    visibility, and maximize ROI. We partner with businesses of all sizes to turn ideas into
                                    scalable success through innovation, strategy, and performance-driven execution.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiperPartner-layout">
                        <div class="swiperPartner-overlay">
                            <div class="spacer"></div>
                        </div>
                        <div class="swiperPartner-container">
                            <div class="swiper swiperPartner">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="{{ route('industry.details', 'healthcare') }}">
                                            <div class="partner-slide">
                                                <span
                                                    class="partner-logo
                                                img-fluid "><b>Healthcare</b></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="{{ route('industry.details', 'education') }}">
                                            <div class="partner-slide">
                                                <span
                                                    class="partner-logo
                                                img-fluid"><b>Education</b></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="{{ route('industry.details', 'finance-banking') }}">
                                            <div class="partner-slide">
                                                <span
                                                    class="partner-logo
                                                img-fluid"><b>Finance
                                                        & Banking</b></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="{{ route('industry.details', 'manufacturing') }}">
                                            <div class="partner-slide">
                                                <span
                                                    class="partner-logo
                                                img-fluid"><b>Manufacturing</b></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="{{ route('industry.details', 'textile') }}">
                                            <div class="partner-slide">
                                                <span
                                                    class="partner-logo
                                                img-fluid"><b>Textile</b></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="{{ route('industry.details', 'retail-ecommerce') }}">
                                            <div class="partner-slide">
                                                <span
                                                    class="partner-logo
                                                img-fluid"><b>E-commerce</b></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="{{ route('industry.details', 'real-estate') }}">
                                            <div class="partner-slide">
                                                <span
                                                    class="partner-logo
                                                img-fluid"><b>Real
                                                        Estate</b></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="{{ route('industry.details', 'startups') }}">
                                            <div class="partner-slide">
                                                <span
                                                    class="partner-logo
                                                img-fluid"><b>Startups</b></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Why Choose Us -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column flex-xl-row gspace-5">
                    <div class="chooseus-card-container">
                        <div class="d-flex flex-column gspace-2">
                            <div class="card card-chooseus animate-box animated fast animate__animated"
                                data-animate="animate__fadeInLeft">
                                <div class="chooseus-icon-wrapper">
                                    <div class="chooseus-spacer above"></div>
                                    <div class="chooseus-icon-layout">
                                        <div class="chooseus-icon">
                                            <img src="{{ asset('image/Icon-2.png') }}" alt="Why Choose Us Icon"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="chooseus-spacer below"></div>
                                </div>
                                <div class="chooseus-content">
                                    <h4 class="chooseus-title">We provide consistency</h4>
                                    <p>We deliver stable, reliable, and high-performing digital solutions backed by
                                        continuous
                                        support and monitoring. Our team ensures consistent quality, seamless performance,
                                        and
                                        long-term reliability so your business runs smoothly without interruptions.
                                    </p>
                                    {{--  <div class="link-wrapper">
                                        <a href="#">Read More</a>
                                        <i class="fa-solid fa-arrow-circle-right accent-color"></i>
                                    </div>  --}}
                                </div>
                            </div>
                            <div class="card card-chooseus  animate-box animated animate__animated"
                                data-animate="animate__fadeInLeft">
                                <div class="chooseus-icon-wrapper">
                                    <div class="chooseus-spacer above"></div>
                                    <div class="chooseus-icon-layout">
                                        <div class="chooseus-icon">
                                            <img src="{{ asset('image/icon-1.png') }}" alt="Why Choose Us Icon"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="chooseus-spacer below"></div>
                                </div>
                                <div class="chooseus-content">
                                    <h4 class="chooseus-title">Maintain Transparency</h4>
                                    <p>We believe in clear communication and complete visibility at every stage of your
                                        project.
                                        From planning to delivery, we keep you informed with regular updates, honest
                                        timelines,
                                        and no hidden surprises.</p>
                                    {{--  <div class="link-wrapper">
                                        <a href="#">Read More</a>
                                        <i class="fa-solid fa-arrow-circle-right accent-color"></i>
                                    </div>  --}}
                                </div>
                            </div>
                            <div class="card card-chooseus  animate-box animated slow animate__animated"
                                data-animate="animate__fadeInLeft">
                                <div class="chooseus-icon-wrapper">
                                    <div class="chooseus-spacer above"></div>
                                    <div class="chooseus-icon-layout">
                                        <div class="chooseus-icon">
                                            <img src="{{ asset('image/Icon-3.png') }}" alt="Why Choose Us Icon"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="chooseus-spacer below"></div>
                                </div>
                                <div class="chooseus-content">
                                    <h4 class="chooseus-title">Agile Development & Transparency</h4>
                                    <p>Our agile approach ensures faster delivery, flexibility, and complete transparency
                                        with
                                        regular updates, clear communication, and milestone tracking.</p>
                                    {{--  <div class="link-wrapper">
                                        <a href="#">Read More</a>
                                        <i class="fa-solid fa-arrow-circle-right accent-color"></i>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chooseus-content-container">
                        <div class="d-flex flex-column gspace-5">
                            <div class="d-flex flex-column gspace-2">
                                <div class="sub-heading  animate-box animated animate__animated"
                                    data-animate="animate__fadeInDown">
                                    <i class="fa-regular fa-circle-dot"></i>
                                    <span>Why Choose Innoversion</span>
                                </div>
                                <h2 class="title-heading  animate-box animated animate__animated"
                                    data-animate="animate__fadeInDown">Your Success is Our Mission</h2>
                                <p class="mb-0 animate-box animated animate__animated" data-animate="animate__fadeInDown">
                                    Innoversion Technolab, we specialize in delivering high-quality, scalable software
                                    solutions
                                    tailored to modern business needs. From custom applications to enterprise systems, we
                                    help
                                    organizations streamline operations, enhance user experiences, and achieve long-term
                                    growth
                                    through reliable technology.</p>
                            </div>
                            <div class="image-container">
                                <img src="https://html.foxcreation.net/image/collaborative-process-of-multicultural-skilled-peo-5EHBQRG-1024x683.jpg"
                                    alt="Why Choose Us Image" class="chooseus-img">
                                <div class="card-chooseus-cta-layout">
                                    <div class="chooseus-cta-spacer"></div>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="chooseus-cta-spacer"></div>
                                        <div class="card-chooseus-cta-wrapper">
                                            <div class="card card-chooseus-cta animate-box animated animate__animated"
                                                data-animate="animate__fadeInUp">
                                                <h5>Partner with Innoversion Technolab & Take Your Business To the Next
                                                    Level
                                                </h5>
                                                <div class="link-wrapper">
                                                    <a href="{{ route('contact') }}">Let's Talk Strategy</a>
                                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Guide -->
        <div class="section-guide">
            <div class="guide-banner">
                <div class="hero-container">
                    <div class="guide-content  animate-box animated animate__animated" data-animate="animate__fadeInUp">
                        {{--  <div class="guide-video-container">
                        <button class="request-loader" data-video="https://www.youtube.com/watch?v=P68V3iH4TeE"><i
                                class="fa-solid fa-play"></i></button>
                        <p>
                            See How We Help Brands Grow
                        </p>
                    </div>  --}}
                        <div class="d-flex flex-column gspace-2">
                            <h3 class="title-heading">Transform Your Business with Innoversion Technolab</h3>
                            <p>We deliver scalable software solutions that drive innovation, efficiency, and business
                                growth.
                                Our expertise in web, mobile, and custom development ensures high-performance digital
                                products.
                                Partner with us to build secure, future-ready technology that delivers real results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Modal Video -->
        <div class="section p-0">
            <div id="modal-overlay" class="modal-overlay">
                <span class="modal-close"><i class="fa-solid fa-xmark"></i></span>
                <div class="video-modal">
                    <iframe id="modal-video-frame" class="ifr-video" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- Section Team -->
        <div class="section">
            <div class="hero-container">
                <div class="team-wrapper">
                    <div class="card team-layout">
                        <div class="d-flex flex-column align-items-center gspace-2 animate-box animated animate__animated"
                            data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>Our Team</span>
                            </div>
                            <h2 class="title-heading">Meet the Minds Behind Your Digital Success</h2>
                        </div>
                        <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4">
                            @foreach ($teamMembers as $member)
                                <div class="col">
                                    <div class="d-flex flex-column">
                                        <div class="image-team">
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="Team Image"
                                                class="img-fluid"
                                                style="border-radius: 25px 25px 0px 0px; height: 500px;width: 100%; object-fit: cover;object-position: top center;">
                                            <div class="social-team-wrapper">
                                                <div class="social-team-spacer"></div>
                                                {{--  <div class="d-flex flex-column align-items-end">
                                                    <div class="social-team-container">
                                                        <a href="https://facebook.com" class="social-item">
                                                            <i class="fa-brands fa-facebook"></i>
                                                        </a>
                                                        <a href="https://instagram.com" class="social-item">
                                                            <i class="fa-brands fa-instagram"></i>
                                                        </a>
                                                        <a href="https://linkedin.com" class="social-item">
                                                            <i class="fa-brands fa-linkedin"></i>
                                                        </a>
                                                    </div>
                                                    <div class="social-team-spacer"></div>
                                                </div>  --}}
                                            </div>
                                        </div>
                                        <div class="team-profile">
                                            <h4>{{ $member->name }}</h4>
                                            <span class="title">{{ $member->role }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="spacer"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Digital Process -->
        <div class="section-wrapper-digital-process">
            <div class="section digital-process-banner">
                <div class="hero-container">
                    <div class="digital-process-content">
                        <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                            <div class="col">
                                <div class="d-flex flex-column gspace-2 animate-box animated animate__animated"
                                    data-animate="animate__fadeInDown">
                                    <div class="sub-heading">
                                        <i class="fa-regular fa-circle-dot"></i>
                                        <span>How it Work</span>
                                    </div>
                                    <h2 class="title-heading">Simple Steps to Digital Success</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column gspace-2 justify-content-end h-100  animate-box animated fast animate__animated"
                                    data-animate="animate__fadeInDown">
                                    <p>
                                        At Innoversion Technolab, we follow a structured and transparent approach to turn
                                        your
                                        ideas into scalable digital solutions. Our process is designed to ensure clarity,
                                        efficiency, and long-term success.
                                    </p>
                                    <div class="link-wrapper">
                                        <a href="{{ route('contact') }}">Get Started Now</a>
                                        <i class="fa-solid fa-arrow-circle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="digital-process-steps-wrapper">
                            <div class="digital-process-steps">
                                <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
                                    <div class="col">
                                        <div class="digital-process-step animate-box animated animate__animated"
                                            data-animate="animate__fadeInUp">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <img src="{{ asset('image/digital-marketing-icons-N952ZWA.png') }}"
                                                        alt="Digital Proccess Icon" class="process-icon">
                                                </div>
                                                {{--  <span>01</span>  --}}
                                            </div>
                                            <div class="d-flex flex-column gspace-2">
                                                <h5>Discovery & Consult</h5>
                                                <p>
                                                    We begin by understanding your business, goals, and challenges. This
                                                    helps
                                                    us define the right direction and ensure that every decision aligns with
                                                    your vision.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-md-row flex-column gspace-2 animate-box animated animate__animated"
                                            data-animate="animate__fadeInDown">
                                            <div class="step-spacer"></div>
                                            <div class="digital-process-step">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <img src="{{ asset('image/Icon-11.png') }}"
                                                            alt="Digital Process Icon" class="process-icon">
                                                    </div>
                                                    {{--  <span>02</span>  --}}
                                                </div>
                                                <div class="d-flex flex-column gspace-2">
                                                    <h5>Strategy & Planning</h5>
                                                    <p>
                                                        Once we have clarity, we create a well-defined roadmap. From
                                                        choosing
                                                        the right technology to planning the user experience, everything is
                                                        structured for smooth execution.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-md-row flex-column gspace-2 animate-box animated animate__animated"
                                            data-animate="animate__fadeInUp">
                                            <div class="step-spacer"></div>
                                            <div class="digital-process-step">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <img src="{{ asset('image/Icon-10.png') }}"
                                                            alt="Digital Process Icon" class="process-icon">
                                                    </div>
                                                    {{--  <span>03</span>  --}}
                                                </div>
                                                <div class="d-flex flex-column gspace-2">
                                                    <h5>Execution & Optimize</h5>
                                                    <p>
                                                        Our team develops your solution using modern technologies, focusing
                                                        on
                                                        performance, security, and scalability while continuously refining
                                                        the
                                                        product.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-md-row flex-column gspace-2 animate-box animated animate__animated"
                                            data-animate="animate__fadeInDown">
                                            <div class="step-spacer"></div>
                                            <div class="digital-process-step">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <img src="{{ asset('image/Icon-12.png') }}"
                                                            alt="Digital Process Icon" class="process-icon">
                                                    </div>
                                                    {{--  <span>04</span>  --}}
                                                </div>
                                                <div class="d-flex flex-column gspace-2">
                                                    <h5>Result & Growth</h5>
                                                    <p>
                                                        After delivery, we stay with you to support, improve, and scale your
                                                        solution, ensuring consistent growth and long-term value.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
        </div>

        <!-- Section Testimonial -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <h2 class="title-heading heading-container heading-container-medium animate-box animated animate__animated"
                        data-animate="animate__fadeInDown">Client Testimonials</h2>
                    {{--  <div class="d-flex flex-column flex-xl-row gspace-5">
                    <div class="testimonial-reviewer-container">
                        <div class="testimonial-header-wrapper animate-box animated fast animate__animated"
                            data-animate="animate__fadeInDown">
                            <div class="card card-testimonial-reviewer">
                                <div
                                    class="d-flex flex-column flex-md-row flex-xl-column justify-content-between gspace-3">
                                    <div class="testimonial-reviewer">
                                        <div class="avatar-container">
                                            <img src="{{ asset('image/dummy-img-400x400.jpg') }}"
                                                alt="Testimonial Reviewer" class="avatar">
                                            <img src="{{ asset('image/dummy-img-400x400.jpg') }}"
                                                alt="Testimonial Reviewer" class="avatar">
                                            <img src="{{ asset('image/dummy-img-400x400.jpg') }}"
                                                alt="Testimonial Reviewer" class="avatar">
                                            <img src="{{ asset('image/dummy-img-400x400.jpg') }}"
                                                alt="Testimonial Reviewer" class="avatar">
                                        </div>
                                        <div class="detail">
                                            <h6>550+ Positive</h6>
                                            <h6>Reviews</h6>
                                        </div>
                                    </div>
                                    <div class="testimonial-rating-container">
                                        <div class="d-flex flex-column justify-content-center align-items-center gspace-1">
                                            <div class="d-flex flex-row align-items-center">
                                                <span class="counter" data-target="95">95</span>
                                                <span class="counter-detail">%</span>
                                            </div>
                                            <p>Improved Project</p>
                                        </div>
                                        <div class="underline-vertical"></div>
                                        <div class="d-flex flex-column justify-content-center align-items-center gspace-1">
                                            <div class="d-flex flex-row align-items-center">
                                                <span class="counter" data-target="80">80</span>
                                                <span class="counter-detail">%</span>
                                            </div>
                                            <p>New Project</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row flex-xl-column justify-content-center gspace-2">
                                    <div class="testimonial-header-link-wrapper">
                                        <i class="fa-regular fa-circle-check accent-color"></i>
                                        <a href="#">Client Satisfaction Rate</a>
                                    </div>
                                    <div class="testimonial-header-link-wrapper">
                                        <i class="fa-regular fa-circle-check accent-color"></i>
                                        <a href="#">Repeat Client Projects</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-title-container">
                        <div class="testimonial-header-wrapper-title animate-box animated animate__animated"
                            data-animate="animate__fadeInRight">
                            <div class="card-testimonial-header-title">
                                <div class="sub-heading">
                                    <i class="fa-regular fa-circle-dot"></i>
                                    <span>What Our Client Says</span>
                                </div>
                                <h2 class="title-heading">Hear From Our Satisfied Clients, Real Success Stories</h2>
                                <p>Discover how businesses like yours have achieved outstanding growth with Innoversion
                                    Technolab’s expert development and digital solutions.</p>
                            </div>
                        </div>
                    </div>
                </div>  --}}
                    <div class="d-flex flex-column">
                        <div class="overflow-hidden">
                            <div class="swiper swiperTestimonial">
                                <div class="swiper-wrapper">
                                    @foreach ($testimonials as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="card card-testimonial" style="height: 500px;">
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="d-flex flex-row align-items-center justify-content-between">
                                                    <div class="d-flex flex-row gspace-2">
                                                        {{--  <div class="testimonial-image">
                                                            <img src="{{ asset('image/dummy-img-400x400.jpg') }}"
                                                                alt="Testimonial Person Image" class="img-fluid">
                                                        </div>  --}}
                                                        <div class="d-flex flex-column">
                                                            <span class="profile-name">{!! $testimonial->name !!}</span>
                                                            {{--  <p class="profile-info">{{ $testimonial->position ?? 'Founder' }}  --}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <i class="fa-solid fa-3x fa-quote-right accent-color"></i>
                                                </div>
                                                <p class="testimonial-description">
                                                    {!! $testimonial->description !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
