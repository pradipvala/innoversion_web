@extends('frontend.layouts.app')

<!-- Section Main Content-->
@section('content')
    <!-- Section Banner -->
    <div class="section-banner">
        <div class="banner-video-container keep-dark animate-box animated animate__animated animate__fadeInUp"
            data-animate="animate__fadeInUp" style="opacity: 1;">
            {{--  <iframe id="banner-video-background" frameborder="0" allowfullscreen
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" title="Marko Video Background"
                src="https://www.youtube.com/embed/P68V3iH4TeE?autoplay=1&controls=0&mute=1&loop=1&playlist=P68V3iH4TeE&showinfo=0&rel=0&enablejsapi=1&disablekb=1&modestbranding=1&iv_load_policy=3"></iframe>  --}}

            <video id="banner-video-background" autoplay muted loop playsinline webkit-playsinline preload="auto"
                disablepictureinpicture controlslist="nodownload noplaybackrate noremoteplayback"
                aria-label="Innoversion Video Background">
                <source src="{{ asset('image/innoversion-video.mp4') }}" type="video/mp4">
            </video>

            <div class="hero-container position-relative">
                <div class="d-flex flex-column gspace-2">
                    <h1 class="title-heading-banner animate-box animated animate__animated"
                        data-animate="animate__fadeInLeft">Enabling Technology with every aspects of Business.</h1>
                    <div class="banner-heading">

                        <div class="banner-content order-xl-2 order-1  animate-box animated animate__animated"
                            data-animate="animate__fadeInRight">
                            <p>At Innoversion Technolab, we build innovation with technology to build powerful, scalable
                                digital solutions.We don't just develop, we enable technologies which help business to save
                                time & energy.
                            </p>
                            <div
                                class="d-flex flex-md-row flex-column justify-content-center justify-content-xl-start align-self-center align-self-xl-start gspace-3">
                                <a href="{{ route('contact') }}" class="btn btn-accent">
                                    <div class="btn-title">
                                        <span>Get Started</span>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Expertise -->
    <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column flex-xl-row gspace-5">
                <div class="expertise-img-layout">
                    <div class="image-container expertise-img">
                        <img src="https://html.foxcreation.net/image/working-job-career-casual-showing-SJZWF3N-1024x737.jpg"
                            alt="Expertise Image" class="img-fluid  animate-box animated animate__animated"
                            data-animate="animate__fadeInUp">
                        <div class="expertise-layout">
                            <div class="d-flex flex-column">
                                <div class="card-expertise-wrapper">
                                    <div class="card card-expertise  animate-box animated animate__animated"
                                        data-animate="animate__fadeInDown">
                                        <h4>Ready to Build Powerful Tech Solutions?</h4>
                                        <p>Transform your ideas into scalable, high-performance Information technology with
                                            a team that
                                            understands business, technology, and growth.
                                        </p>
                                        <div class="d-flex align-items-center flex-row gspace-2 expertise-link">
                                            <a href="{{ route('contact') }}">Get Free Consultation</a>
                                            <i class="fa-solid fa-circle-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="expertise-spacer"></div>
                            </div>
                            <div class="expertise-spacer"></div>
                        </div>
                    </div>
                </div>
                <div class="expertise-title">
                    <div class="sub-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                        <i class="fa-regular fa-circle-dot"></i>
                        <span>Our Expertise</span>
                    </div>
                    <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                        End-to-End Technology Solutions That Drive Real Business Growth</h2>
                    <p>Innoversion Technolab, we specialize in building custom application that solve real business
                        challenges. From startups to enterprises, we design, develop, and deliver scalable systems that
                        improve efficiency, automate processes, and accelerate growth in a rapidly evolving digital
                        landscape.</p>
                    <div class="d-flex flex-column flex-md-row gspace-2">
                        <div class="expertise-list">
                            <h5>We Do With Best</h5>
                            <ul class="check-list">
                                <li><a href="{{ route('single.services') }}">Custom Web Development</a></li>
                                <li><a href="{{ route('single.services') }}">Mobile App Development</a></li>
                                <li><a href="{{ route('single.services') }}">UI/UX Design</a></li>
                                <li><a href="{{ route('single.services') }}">DevOps & Cloud Engineering</a></li>
                                <li><a href="{{ route('single.services') }}">E-commerce Solutions</a></li>
                                <li><a href="{{ route('single.services') }}">Software Maintenance & Support</a></li>
                            </ul>
                        </div>
                        <div class="card card-expertise card-expertise-counter animate-box animated animate__animated"
                            data-animate="animate__fadeInUp">
                            <div class="d-flex flex-row gspace-2 align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <span class="counter" data-target="15">15</span>
                                    <span class="counter-detail">+</span>
                                </div>
                                <h6>Years of Experience in customize Web and Mobile Development</h6>
                            </div>
                            <p>We build secure, scalable, and high-performing software systems tailored to business needs.
                                Our solutions help companies streamline operations, enhance user experience, and achieve
                                long-term digital success.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Modal Video -->
    <div class="section p-0">
        <div id="modal-overlay" class="modal-overlay">
            <span class="my-close"><i class="fa-solid fa-xmark"></i></span>
            <div class="my-modal">
                <iframe id="my-video-frame" allowfullscreen></iframe>
            </div>
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
                                At Innoversion Technolab, we deliver impactful digital solutions that drive growth, boost
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
                                <p>We deliver stable, reliable, and high-performing digital solutions backed by continuous
                                    support and monitoring. Our team ensures consistent quality, seamless performance, and
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
                                <p>We believe in clear communication and complete visibility at every stage of your project.
                                    From planning to delivery, we keep you informed with regular updates, honest timelines,
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
                                <p>Our agile approach ensures faster delivery, flexibility, and complete transparency with
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
                                Innoversion Technolab, we specialize in delivering high-quality, scalable software solutions
                                tailored to modern business needs. From custom applications to enterprise systems, we help
                                organizations streamline operations, enhance user experiences, and achieve long-term growth
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
                                            <h5>Partner with Innoversion Technolab & Take Your Business To the Next Level
                                            </h5>
                                            <div class="link-wrapper">
                                                <a href="./contact.html">Let's Talk Strategy</a>
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
                        <h3 class="title-heading">Transform Your Business by using technologies with Us</h3>
                        <p>We deliver scalable software solutions that drive innovation, efficiency, and business growth.
                            Our expertise in web, mobile, and custom development ensures high-performance digital products.
                            Partner with us to build secure, future-ready technology that delivers real results.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Service -->
    <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column justify-content-center text-center gspace-5">
                <div class="d-flex flex-column justify-content-center text-center gspace-2">
                    <div class="sub-heading align-self-center animate-box animated animate__animated"
                        data-animate="animate__fadeInDown">
                        <i class="fa-regular fa-circle-dot"></i>
                        <span>Our Core Services</span>
                    </div>

                    <h2 class="title-heading heading-container heading-container-medium animate-box animated animate__animated"
                        data-animate="animate__fadeInDown">Company-Focused Solutions That Drive Real Results</h2>
                </div>
                <div class="card-service-wrapper">
                    <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 grid-spacer-2">
                        @foreach ($services as $service)
                            <div class="col">
                                <div class="card card-service animate-box animated slow animate__animated"
                                    data-animate="animate__fadeInLeft">
                                    <div
                                        class="d-flex flex-row justify-content-between gspace-2 gspace-md-3 align-items-center">
                                        <div>
                                            <div class="service-icon-wrapper">
                                                <div class="service-icon">
                                                    <img src="{{ isset($service->img) ? asset('storage/' . $service->img) : asset('image/Icon-7.png') }}"
                                                        alt="Service Icon" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="service-title">
                                            <h4>{{ $service->title }}</h4>
                                        </div>
                                    </div>
                                    <p>
                                        {!! $service->description !!}
                                    </p>
                                    <a href="{{ route('service.details', [$service->sub_title]) }}"
                                        class="btn btn-accent">
                                        <div class="btn-title">
                                            <span>View Details</span>
                                        </div>
                                        <div class="icon-circle">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="service-link-footer">
                    <p>Need a custom solution? Let's create a strategy tailored for your business. <a
                            href="{{ route('contact') }}">Get a Free Strategy Call</a></p>
                </div>
            </div>
        </div>
    </div>


    <!-- Section Partner -->
    <div class="section-partner mb-5">
        <div class="hero-container">
            <div class="card card-partner  animate-box animated animate__animated" data-animate="animate__fadeInRight">
                <div class="partner-spacer"></div>
                <div class="row row-cols-xl-2 row-cols-1 align-items-center px-5 position-relative z-2">
                    <div class="col">
                        <div class="d-flex flex-column justify-content-center pe-xl-3 pe-0">
                            <h3 class="title-heading">Our Clients</h3>
                            <p>Over the years, our services have been trusted by the best in the industry.</p>
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

                                @foreach ($clients as $client)
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <div class="partner-slide">
                                                <img src="{{ isset($client->image) ? asset('storage/' . $client->image) : asset('image/client-7.png') }}"
                                                    alt="Client" class="img-fluid">
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  <!-- Section Case Studies -->
    <div class="section p-0">
        <div class="hero-container">
            <div class="case-studies-layout">
                <div class="card card-case-studies">
                    <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                        <div class="col">
                            <div class="d-flex flex-column gspace-2 animate-box animated animate__animated"
                                data-animate="animate__fadeInLeft">
                                <div class="sub-heading">
                                    <i class="fa-regular fa-circle-dot"></i>
                                    <span>Case Studies</span>
                                </div>
                                <h2 class="title-heading">See How We Help Businesses Thrive</h2>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column h-100 justify-content-end gspace-2 animate-box animated animate__animated"
                                data-animate="animate__fadeInRight">
                                <p>Innoversion Technolab, we help businesses solve real challenges with scalable software
                                    and smart digital solutions that drive measurable growth.
                                </p>
                                <div class="link-wrapper">
                                    <a href="./case_studies.html">More Case Studies</a>
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column gspace-2">
                        <div class="d-flex flex-column flex-xl-row gspace-2">
                            <div class="card case-studies-content local-business animate-box animated fast animate__animated"
                                data-animate="animate__fadeInUp">
                                <div
                                    class="case-studies-component large align-self-end justify-content-end align-items-end">
                                    <div class="cs-component">
                                        <a href="#">Web Development</a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#">UI/UX Design</a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#">SEO</a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#">Analytics</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gspace-2">
                                    <a href="#" class="case-studies-title">
                                        <h4>Local Business Digital Transformation</h4>
                                    </a>
                                    <p>
                                        We helped a traditional business transition into a fully digital ecosystem with a
                                        modern web platform and optimized user experience.
                                    </p>
                                </div>
                            </div>
                            <div class="card case-studies-content saas-leads animate-box animated animate__animated"
                                data-animate="animate__fadeInUp">
                                <div class="d-flex flex-column gspace-2">
                                    <a href="#" class="case-studies-title">
                                        <h4>SaaS Platform & Lead Optimization
                                        </h4>
                                    </a>
                                    <p>
                                        We designed and developed a high-performance SaaS solution integrated with smart
                                        lead management and automation tools.

                                    </p>
                                </div>
                                <div
                                    class="case-studies-component small align-self-end justify-content-end align-items-end">
                                    <div class="cs-component">
                                        <a href="#">SaaS Development</a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#">CRM Integration</a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#">Automation </a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#"> Cloud Solutions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-xl-row gspace-2">
                            <div class="card case-studies-content ecommerce animate-box animated fast animate__animated"
                                data-animate="animate__fadeInUp">
                                <div
                                    class="case-studies-component small align-self-start justify-content-start align-items-start">
                                    <div class="cs-component">
                                        <a href="#"> E-commerce Development </a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#"> CRO </a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#"> SEO </a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#"> Analytics </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gspace-2">
                                    <a href="#" class="case-studies-title">
                                        <h4>E-Commerce Growth & Optimization</h4>
                                    </a>
                                    <p>
                                        We built and optimized an e-commerce platform focused on performance, speed, and
                                        seamless customer experience.
                                    </p>
                                </div>
                            </div>

                            <div class="card case-studies-content startup-branding animate-box animated animate__animated"
                                data-animate="animate__fadeInUp">
                                <div class="d-flex flex-column gspace-2">
                                    <a href="#" class="case-studies-title">
                                        <h4>Startup Brand Growth & Expansion</h4>
                                    </a>
                                    <p>
                                        We supported a startup in building a strong digital presence with a combination of
                                        branding, technology, and marketing strategies.
                                    </p>
                                </div>
                                <div
                                    class="case-studies-component large align-self-start justify-content-start align-items-start">
                                    <div class="cs-component">
                                        <a href="#">Branding </a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#">Digital Strategy</a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#">Social Media </a>
                                    </div>
                                    <div class="cs-component">
                                        <a href="#">Product Development</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spacer"></div>
            </div>
        </div>
    </div>  --}}

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
                                                    <div class="testimonial-image">
                                                        <img src="{{ asset('image/dummy-img-400x400.jpg') }}"
                                                            alt="Testimonial Person Image" class="img-fluid">
                                                    </div>
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
                                    At Innoversion Technolab, we follow a structured and transparent approach to turn your
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
                                                We begin by understanding your business, goals, and challenges. This helps
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
                                                    Once we have clarity, we create a well-defined roadmap. From choosing
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
                                                    Our team develops your solution using modern technologies, focusing on
                                                    performance, security, and scalability while continuously refining the
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

    <!-- Section Pricing -->
    {{-- <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column justify-content-center text-center gspace-5">
                <div class="d-flex flex-column gspace-2 animate-box animated animate__animated"
                    data-animate="animate__fadeInUp">
                    <div class="sub-heading align-self-center">
                        <i class="fa-regular fa-circle-dot"></i>
                        <span>Our Core Services</span>
                    </div>
                    <h2 class="title-heading heading-container heading-container-short">Flexible Pricing Plans for Every
                        Business</h2>
                </div>
                <div class="row row-cols-xl-3 row-cols-1 grid-spacer-2">
                    <div class="col">
                        <div class="pricing-container">
                            <div class="card card-pricing-title animate-box animated animate__animated"
                                data-animate="animate__fadeInLeft">
                                <div class="spacer"></div>
                                <div class="content">
                                    <h3 class="title-heading">Let's Find the Right Strategy for You!</h3>
                                    <div class="link-wrapper">
                                        <a href=".contact.html">Book a Free Consultation</a>
                                        <i class="fa-solid fa-arrow-circle-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-pricing animate-box animated animate__animated"
                                data-animate="animate__fadeInUp">
                                <h4>Starter</h4>
                                <p>Perfect for startups & small businesses</p>
                                <div class="d-flex flex-row gspace-1 align-items-center h-100">
                                    <h3>
                                        $99
                                    </h3>
                                    <p>/Month</p>
                                </div>
                                <a href="#" class="btn btn-accent">
                                    <div class="btn-title">
                                        <span>View Details</span>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                <ul class="check-list">
                                    <li><a href="{{ route('single.services') }}">Basic SEO & Marketing</a></li>
                                    <li><a href="{{ route('single.services') }}">Social Media Management (1 Platform)</a></li>
                                    <li><a href="{{ route('single.services') }}">Monthly Performance Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-pricing pricing-highlight animate-box animated slow animate__animated"
                            data-animate="animate__fadeInUp">
                            <div class="spacer"></div>
                            <h4>Enterprise</h4>
                            <p>Full scale marketing for maximum impact</p>
                            <div class="d-flex flex-row gspace-1 align-items-center">
                                <h3>
                                    $399
                                </h3>
                                <p>/Month</p>
                            </div>
                            <a href="#" class="btn btn-accent">
                                <div class="btn-title">
                                    <span>View Details</span>
                                </div>
                                <div class="icon-circle">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                            <div class="core-benefits">
                                <div class="benefit">
                                    <i class="fa-solid fa-brain"></i>
                                    <a href="#">Dedicated Account Manager</a>
                                </div>
                                <div class="benefit">
                                    <i class="fa-brands fa-accessible-icon"></i>
                                    <a href="#">Priority Support 24/7</a>
                                </div>
                                <div class="benefit">
                                    <i class="fa-solid fa-bug"></i>
                                    <a href="#">Customized Growth Strength</a>
                                </div>
                            </div>
                            <ul class="check-list">
                                <li><a href="#">Complate Digital Marketing Suite</a></li>
                                <li><a href="#">Paid Ads Management</a></li>
                                <li><a href="#">Dedicated Account Manager</a></li>
                                <li><a href="#">Email Marketing & Automation</a></li>
                                <li><a href="#">Dedicated Account Manager</a></li>
                                <li><a href="#">Weekly Performance insights</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pricing-container">
                            <div class="card pricing-highlight-box animate-box animated animate__animated"
                                data-animate="animate__fadeInRight">
                                <div class="d-flex flex-column gspace-2 w-100">
                                    <h5>Your Growth, Our Priority!</h5>
                                    <div class="d-flex flex-column gspace-2">
                                        <div class="pricing-highlights">
                                            <a href="#">Data-Driven Digital Marketing</a>
                                            <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                        <div class="pricing-highlights">
                                            <a href="#">Proven Strategies for Higher</a>
                                            <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                        <div class="pricing-highlights">
                                            <a href="#">Scalable Solution for Every Business</a>
                                            <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="spacer"></div>
                            </div>
                            <div class="card card-pricing animate-box animated animate__animated"
                                data-animate="animate__fadeInUp">
                                <h4>Growth</h4>
                                <p>Best for growing businesses ready</p>
                                <div class="d-flex flex-row gspace-1 align-items-center h-100">
                                    <h3>
                                        $299
                                    </h3>
                                    <p>/Month</p>
                                </div>
                                <a href="#" class="btn btn-accent">
                                    <div class="btn-title">
                                        <span>View Details</span>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                <ul class="check-list">
                                    <li><a href="{{ route('single.services') }}">Basic SEO & Marketing</a></li>
                                    <li><a href="{{ route('single.services') }}">Social Media Management (1 Platform)</a></li>
                                    <li><a href="{{ route('single.services') }}">Monthly Performance Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Section Newsletter -->
    <div class="section">
        <div class="hero-container">
            <div class="newsletter-wrapper">
                <div class="newsletter-layout">
                    <div class="spacer"></div>
                    <div class="d-flex flex-column gspace-5 position-relative z-2">
                        <div class="d-flex flex-column gspace-2 animate-box animated animate__animated"
                            data-animate="animate__fadeInLeft">
                            <h3 class="title-heading">Stay Ahead with Technology & Innovation</h3>
                            <p>Receive expert insights, product updates, and development strategies designed to keep your
                                business future-ready.
                            </p>
                        </div>
                        <div id="newsletter-success"
                            class="alert success {{ session('newsletter_success') ? '' : 'hidden' }}">
                            <span class="check-icon"><i class="fa-solid fa-2xl fa-check"></i></span>
                            <p class="text-center">
                                {{ session('newsletter_success', 'Thank you! Form submitted successfully.') }}</p>
                        </div>

                        <div id="newsletter-error" class="alert error {{ session('newsletter_error') ? '' : 'hidden' }}">
                            <span class="cross-icon"><i class="fa-solid fa-2xl fa-xmark"></i></span>
                            <p class="text-center">
                                {{ session('newsletter_error', 'Oops! Form submission failed. Please try again.') }}</p>
                        </div>

                        <form action="{{ route('newsletter.subscribe') }}" method="POST" id="newsletterForm"
                            class="needs-validation animate-box animated animate__animated"
                            data-animate="animate__fadeInRight">
                            @csrf
                            <div class="input-container">
                                <input type="email" name="email" id="newsletter-email"
                                    placeholder="Enter your email" value="{{ old('email') }}" required>
                                <p class="error-text hidden"></p>
                            </div>
                            <button class="btn btn-accent" type="submit">
                                <span class="btn-title">
                                    <span>Subscribe</span>
                                </span>
                                <span class="icon-circle">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Blog -->
    <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column gspace-5">
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5 m-0">
                    <div class="col col-xl-8 ps-0 pe-0">
                        <div class="d-flex flex-column gspace-2 animate-box animated fast animate__animated"
                            data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>Insights & Trends</span>
                            </div>
                            <h2 class="title-heading">2026 Technology Insights, Trends & Practical Guides</h2>
                        </div>
                    </div>
                    <div class="col col-xl-4 ps-0 pe-0">
                        <div class="d-flex flex-column gspace-2 justify-content-end h-100 animate-box animated animate__animated"
                            data-animate="animate__fadeInRight">
                            <p>Explore what is shaping digital products now: applied AI, secure cloud-native systems,
                                intelligent automation, and data-driven decision making. Learn with actionable examples
                                your team can implement fast.</p>
                            <div class="link-wrapper">
                                <a href="{{ route('blog') }}">View All Articles</a>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 grid-spacer-3">
                    <div class="col">
                        <div class="card card-blog animate-box animated animate__animated"
                            data-animate="animate__fadeInUp" onclick="window.location.href='single_post.html'">
                            <div class="blog-image">
                                <img src="https://html.foxcreation.net/image/collaborative-process-of-multicultural-skilled-peo-AN9FZBQ-1024x683.jpg"
                                    alt="Blog Image">
                            </div>
                            <div class="card-body">
                                {{--  <div class="d-flex flex-row gspace-2">
                                    <div class="d-flex flex-row gspace-1 align-items-center">
                                        <i class="fa-solid fa-calendar accent-color"></i>
                                        <span class="meta-data">April 14, 2025</span>
                                    </div>
                                    <div class="d-flex flex-row gspace-1 align-items-center">
                                        <i class="fa-solid fa-folder accent-color"></i>
                                        <span class="meta-data">Social Media</span>
                                    </div>
                                </div>  --}}
                                <a href="javascript:void(0)" class="blog-link">AI Agents in Business Workflows</a>
                                <p>How teams are embedding AI copilots in support, sales, and operations to reduce manual
                                    work and improve response quality.</p>
                                {{--  <a href="javascript:void(0)" class="read-more">Read More</a>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-blog animate-box animated animate__animated"
                            data-animate="animate__fadeInUp" onclick="window.location.href='single_post.html'">
                            <div class="blog-image">
                                <img src="https://html.foxcreation.net/image/collaborative-process-of-multicultural-skilled-peo-LY58K9U-1024x683.jpg"
                                    alt="Blog Image">
                            </div>
                            <div class="card-body">
                                {{--  <div class="d-flex flex-row gspace-2">
                                    <div class="d-flex flex-row gspace-1 align-items-center">
                                        <i class="fa-solid fa-calendar accent-color"></i>
                                        <span class="meta-data">April 14, 2025</span>
                                    </div>
                                    <div class="d-flex flex-row gspace-1 align-items-center">
                                        <i class="fa-solid fa-folder accent-color"></i>
                                        <span class="meta-data">SEO</span>
                                    </div>
                                </div>  --}}
                                <a href="javascript:void(0)" class="blog-link">Cloud Cost Optimization in 2026</a>
                                <p>Modern FinOps practices to control cloud spend while keeping performance and developer
                                    velocity high.</p>
                                {{--  <a href="javascript:void(0)" class="read-more">Read More</a>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
