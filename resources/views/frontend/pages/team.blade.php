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
                            Leadership & Team</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Our Team</p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>


        <!-- Section Team -->
        <div class="section">
            <div class="hero-container">
                <div class="team-wrapper d-flex flex-column gap-4 gap-lg-5">

                    @php
                        $teamMembersCollection = collect($teamMembers);
                        $leadMember = $teamMembersCollection->take(1);
                        $progressMembers = $teamMembersCollection->slice(1, 6);
                        $coreMembers = $teamMembersCollection->slice(7, 3);
                        $ourTeamMembers = $teamMembersCollection->slice(10, 3);
                    @endphp

                    <div class="card team-layout mb-0">
                        <div class="d-flex flex-column align-items-center gspace-2 animate-box animated animate__animated"
                            data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>Our Founder</span>
                            </div>
                            <h4 class="title-heading text-center">Visionary Leadership Behind Innoversion</h4>
                        </div>
                        <div class="row g-4">
                            @foreach ($leadMember as $member)
                                <div class="col-xl-4 col-lg-5 col-md-6 col-12">
                                    <div class="team-member-card d-flex flex-column">
                                        <div class="image-team">
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="Team Image"
                                                class="img-fluid"
                                                style="border-radius: 25px 25px 0px 0px; height: 400px;width: 100%; object-fit: cover;object-position: top center;">
                                            <div class="social-team-wrapper">
                                                <div class="social-team-spacer"></div>
                                            </div>
                                        </div>
                                        <div class="team-profile">
                                            <h4>{{ $member->name }}</h4>
                                            {{--  <span class="title">{{ $member->role }}</span>  --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-xl-8 col-lg-7 col-md-6 col-12">
                                <div class="d-flex flex-column h-100">
                                    <div class="sub-heading mb-3 mt-2">
                                        <i class="fa-regular fa-circle-dot"></i>
                                        <span>FOUNDER’S NOTE</span>
                                    </div>

                                    {{--  <h4 class="mb-2" align="left">A Message from Pradeep Vala, Founder & CEO</h4>  --}}
                                    {{--  <p class="mb-3">Innoversion Technolabs</p>  --}}
                                    <p class="mb-0 mt-3" align="left">At Innoversion Technolab, our vision is to enable
                                        technology at every
                                        business aspect through reliable, scalable, and future-ready solutions. We
                                        strive to
                                        be a trusted technology partner, delivering practical innovations that drive
                                        efficiency, business growth, and measurable outcomes.</p>
                                    </br>
                                    <p class="mb-0" align="left">
                                        With a strong commitment to quality, transparency, and long-term partnerships, we
                                        focus on creating solutions that align with our clients’ goals and support their
                                        success in an evolving digital landscape. </br>
                                    </p>
                                    </br>

                                    <span class="fw-bold" align="left"> Enabling Technology. Driving Business
                                        Growth.</span>
                                </div>
                            </div>
                        </div>
                        <div class="spacer"></div>
                    </div>

                    <div class="card team-layout mb-0">
                        <div class="d-flex flex-column align-items-center gspace-2 animate-box animated animate__animated"
                            data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>Our Team Lead</span>
                            </div>
                            <h4 class="title-heading text-center">Strategic Technical Experts Guiding Every Milestone</h4>
                        </div>
                        <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4">
                            @foreach ($progressMembers as $member)
                                <div class="col">
                                    <div class="team-member-card d-flex flex-column">
                                        <div class="image-team">
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="Team Image"
                                                class="img-fluid"
                                                style="border-radius: 25px 25px 0px 0px; height: 400px;width: 100%; object-fit: cover;object-position: top center;">
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
                                            {{--  <span class="title">{{ $member->role }}</span>  --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="spacer"></div>
                    </div>


                    <div class="card team-layout mb-0">
                        <div class="d-flex flex-column align-items-center gspace-2 animate-box animated animate__animated"
                            data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>Our Senior Team</span>
                            </div>
                            <h4 class="title-heading text-center">Building strong teams that deliver smarter solutions.</h4>
                        </div>
                        <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4">
                            @foreach ($coreMembers as $member)
                                <div class="col">
                                    <div class="team-member-card d-flex flex-column">
                                        <div class="image-team">
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="Team Image"
                                                class="img-fluid"
                                                style="border-radius: 25px 25px 0px 0px; height: 400px;width: 100%; object-fit: cover;object-position: top center;">
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
                                            {{--  <span class="title">{{ $member->role }}</span>  --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="spacer"></div>
                    </div>


                    <div class="card team-layout mb-0">
                        <div class="d-flex flex-column align-items-center gspace-2 animate-box animated animate__animated"
                            data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>Our Team</span>
                            </div>
                            <h4 class="title-heading text-center">Passionate Professionals Powering Daily Success</h4>
                        </div>
                        <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4">
                            @foreach ($ourTeamMembers as $member)
                                <div class="col">
                                    <div class="team-member-card d-flex flex-column">
                                        <div class="image-team">
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="Team Image"
                                                class="img-fluid"
                                                style="border-radius: 25px 25px 0px 0px; height: 400px;width: 100%; object-fit: cover;object-position: top center;">
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
                                            {{--  <span class="title">{{ $member->role }}</span>  --}}
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
    </main>
@endsection
