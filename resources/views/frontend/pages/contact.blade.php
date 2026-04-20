@extends('frontend.layouts.app')

@section('content')
    <!-- Section Main Content -->

    <!-- Section Main Content -->
    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            Contact Us</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Contact Us</p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>

        <!-- Section Contact -->
        <div class="section">
            <div class="hero-container">
                <div class="row row-cols-xl-2 row-cols-1 g-5">
                    <div class="col col-xl-5">
                        <div class="contact-title-wrapper">
                            <div class="card contact-title">
                                <div class="sub-heading">
                                    <i class="fa-regular fa-circle-dot"></i>
                                    <span>Reach out to us</span>
                                </div>
                                <h2 class="title-heading">Get in Touch</h2>
                                <p>Reach out to us for tailored digital solutions that drive results sollicitudin nec.</p>
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center text-md-start text-center gspace-2">
                                    <div>
                                        <div class="icon-wrapper">
                                            <div class="icon-box">
                                                <i class="fa-solid fa-phone-volume accent-color"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <h6>Phone Number</h6>
                                        <span>+91 9687350999</span>
                                    </div>
                                </div>
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center text-md-start text-center gspace-2">
                                    <div>
                                        <div class="icon-wrapper">
                                            <div class="icon-box">
                                                <i class="fa-solid fa-envelope accent-color"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <h6>Email Address</h6>
                                        <span>info@innoversiontechnolab.com</span>
                                    </div>
                                </div>
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center text-md-start text-center gspace-2">
                                    <div>
                                        <div class="icon-wrapper">
                                            <div class="icon-box">
                                                <i class="fa-solid fa-location-dot accent-color"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <h6>Office Address</h6>
                                        <span>Office no.1304, Rk World Tower, 150 Feet Ring Rd, near Sheetal Park, Shastri
                                            Nagar, Dharam Nagar Society, Rajkot, Gujarat 360006</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-7">

                        <div id="success-message"
                            class="alert success bg-success  {{ session('success') ? '' : 'hidden' }}">
                            <i class="fa-solid fa-2xl fa-check"></i>
                            <p>{{ session('success') ?: 'Thank you! Form submitted successfully.' }}</p>
                        </div>

                        <div id="error-message" class="alert error bg-danger {{ $errors->any() ? '' : 'hidden' }}">
                            <i class="fa-solid fa-2xl fa-xmark"></i>
                            <p>{{ $errors->first('error') ?: 'Oops! Form submission failed. Please try again.' }}</p>
                        </div>

                        <div class="form-layout-wrapper">
                            <div class="card form-layout">
                                <h3 class="title-heading">Let's Talk About Solutions</h3>
                                <form action="{{ route('contact.submit') }}" method="post" id="contactForm" class="form">
                                    @csrf
                                    <div class="row row-cols-md-2 row-cols-1 g-3">
                                        <div class="col">
                                            <input type="text" name="first_name" id="first_name"
                                                placeholder="First Name*" value="{{ old('first_name') }}">
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <input type="text" name="last_name" id="last_name" placeholder="Last Name*"
                                                value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row row-cols-md-2 row-cols-1 g-3">
                                        <div class="col">
                                            <input type="email" name="email" id="email" placeholder="Email Address*"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" name="company_name" id="company_name"
                                                placeholder="Company name" value="{{ old('company_name') }}">
                                            @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row row-cols-md-2 row-cols-1 g-3">
                                        <div class="col-md-4">
                                            <select name="country_code" id="country_code" placeholder="Country Code*">
                                                <option value="" disabled
                                                    {{ old('country_code') ? '' : 'selected' }}>Country Code*</option>
                                                @foreach ($countryCodes as $code => $name)
                                                    <option value="{{ $code }}"
                                                        {{ old('country_code') == $code ? 'selected' : '' }}>
                                                        {{ $name }} ({{ $code }})</option>
                                                @endforeach
                                            </select>
                                            @error('country_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-8">
                                            <input type="tel" name="phone" id="phone" placeholder="Phone number*"
                                                value="{{ old('phone') }}">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <textarea name="message" id="message" rows="5" placeholder="Message">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-button-container">
                                        <button type="submit" class="btn btn-accent">
                                            <span class="btn-title">
                                                <span>Send a Message</span>
                                            </span>
                                            <span class="icon-circle">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Maps -->
        <div class="section pt-0">
            <div class="hero-container">

                <iframe loading="lazy" class="maps overflow-hidden"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.9180931132023!2d70.76229657948515!3d22.318937227261937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c99e5ecff239%3A0x8f359608c68882d9!2sRk%20World%20Tower%2C%20406%2C%20150%20Feet%20Ring%20Rd%2C%20Sheetal%20Park%2C%20Manharpura%201%2C%20Madhapar%2C%20Rajkot%2C%20Gujarat%20360007!5e0!3m2!1sen!2sin!4v1775813506885!5m2!1sen!2sin"
                    title="Innoversion Technolab, Rajkot, Gujarat"
                    aria-label="Innoversion Technolab, Rajkot, Gujarat"></iframe>
            </div>
        </div>
    </main>
@endsection
