<div class="navbar-wrapper">
    <nav class="navbar navbar-expand-xl">
        <div class="navbar-container">
            <div class="logo-container">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('image/it-icon.png') }}" class="site-logo img-fluid"></a>
            </div>
            <button class="navbar-toggler nav-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars "></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Services <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('services') }}">Service</a></li>
                            <li><a class="dropdown-item" href="{{ route('single.services') }}">Single Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pages <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('case-studies') }}">Case Studies</a></li>
                            <li><a class="dropdown-item" href="{{ route('team') }}">Our Team</a></li>
                            <li><a class="dropdown-item" href="{{ route('partnership') }}">Partnership</a></li>
                            <li><a class="dropdown-item" href="{{ route('testimonials') }}">Testimonial</a></li>
                            <li><a class="dropdown-item" href="faq.html">FAQs</a></li>
                            <li><a class="dropdown-item" href="404_page.html">Error 404</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Archive <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('blog') }}">Blog</a></li>
                            <li><a class="dropdown-item" href="{{ route('single.blog') }}">Single Post</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-action-container">
                <div class="navbar-action-button">
                    <button id="themeSwitch" class="themeswitch" aria-label="Toggle Theme">
                        <i id="themeIcon" class="fas fa-moon"></i>
                    </button>                      
                </div>
                <div class="navbar-icon-wrapper">
                    <div class="icon-circle">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <h6>+91 29687350999</h6>
                </div>
            </div>
        </div>
    </nav>
</div>