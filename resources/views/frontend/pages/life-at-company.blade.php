@extends('frontend.layouts.app')

@section('content')
    <main>
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            Life at Company</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Life at Company</p>
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
                        <img src="{{ asset('image/home/IMG_3442.JPG') }}" alt="Life at Innoversion Technolab Banner"
                            class="single-service-img" style="object-fit: cover;">
                        <div class="single-service-title-layout">
                            <div>
                                <div class="single-service-spacer"></div>
                                <div class="single-service-title-wrapper">
                                    <div class="single-service-title">
                                        <div class="sub-heading animate-box animated slow animate__animated"
                                            data-animate="animate__fadeInRight">
                                            <i class="fa-regular fa-circle-dot"></i>
                                            <span>Life at Innoversion Technolab</span>
                                        </div>
                                        <h3 class="title-heading animate-box animated animate__animated"
                                            data-animate="animate__fadeInRight">Culture, Perks & Team Life</h3>
                                        <p>At Innoversion Technolab, we believe that great work comes from a great
                                            environment. We foster a culture of innovation, collaboration, and continuous
                                            learning where every team member is empowered to grow, contribute, and make an
                                            impact.</p>
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
                                        <h4>Our Culture</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We promote a positive and inclusive workplace where ideas are valued, creativity
                                            is
                                            encouraged, and teamwork drives success. Our culture is built on trust,
                                            transparency, and mutual respect.</p>
                                        <ul class="check-list mt-3">
                                            <li>Open & Collaborative Environment</li>
                                            <li>Innovation-Driven Mindset</li>
                                            <li>Transparent Communication</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>Growth & Learning</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We are committed to the professional growth of our team. By encouraging
                                            continuous
                                            learning and skill development, we help our employees stay ahead in a rapidly
                                            evolving tech landscape.</p>
                                        <ul class="check-list mt-3">
                                            <li>Continuous Learning Opportunities</li>
                                            <li>Exposure to Modern Technologies</li>
                                            <li>Career Growth & Development</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>Work-Life Balance</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We understand the importance of maintaining a healthy balance between work and
                                            personal
                                            life. Our flexible and supportive environment ensures productivity without
                                            burnout.
                                        </p>
                                        <ul class="check-list mt-3">
                                            <li>Flexible Work Environment</li>
                                            <li>Supportive Team Culture</li>
                                            <li>Focus on Well-Being</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>Perks & Benefits</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>We offer a range of benefits designed to keep our team motivated, engaged, and
                                            valued.</p>
                                        <ul class="check-list mt-3">
                                            <li>Competitive Compensation</li>
                                            <li>Recognition & Rewards</li>
                                            <li>Team Activities & Events</li>
                                            <li>Friendly Work Environment</li>
                                            <li>Opportunity to Work on Diverse Projects</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card service-included h-100">
                                        <h4>Team Spirit</h4>
                                        <div class="underline-accent-short"></div>
                                        <p>Our strength lies in our people. We celebrate teamwork, collaboration, and shared
                                            success, creating a workplace where everyone feels connected and inspired.</p>
                                        <ul class="check-list mt-3">
                                            <li>Strong Team Collaboration</li>
                                            <li>Inclusive Work Culture</li>
                                            <li>Celebrating Achievements Together</li>
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
                                        <li><a href="{{ route('our.process') }}">Our Process</a></li>
                                        <li><a href="{{ route('team') }}">Leadership & Team</a></li>
                                        <li><a href="{{ route('open-positions') }}">Open Positions</a></li>
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    </ul>
                                </div>

                                <div class="cta-service-banner cta-service-banner-life-company">
                                    <div class="spacer"></div>
                                    <h3 class="title-heading">Grow With Us</h3>
                                    <p>Join a team where innovation, collaboration, and continuous growth are part of
                                        everyday
                                        work.</p>
                                    <div class="link-wrapper">
                                        <a href="{{ route('open-positions') }}">View Open Positions</a>
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
