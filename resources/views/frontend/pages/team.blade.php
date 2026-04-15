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
                                                class="img-fluid">
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
    </main>
@endsection
