<div>
    <div class="content-overlay">
        <div class="content-edit-sidebar">
            <div class="sidebar-header">
                <div></div>
                <div class="close-btn-second">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <div class="content">
                <span>Click on the Edit Content button to edit/add the content.</span>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="sidebar-overlay"></div>
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <img src="{{ asset('image/marko-logo.png') }}" class="site-logo img-fluid logo" alt="Logo">
            </div>
            <button class="close-btn"><span>X</span></button>
        </div>
        <ul class="menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Services</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="{{ route('services') }}">Service</a></li>
                    <li><a href="javascript:void(0)">Service Details</a></li>
                </ul>
            </li>
            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Pages</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="javascript:void(0)">Case Studies</a></li>
                    <li><a href="{{ route('team') }}">Our Team</a></li>
                    <li><a href="{{ route('partnership') }}">Partnership</a></li>
                    <li><a href="javascript:void(0)">Pricing Plan</a></li>
                    <li><a href="javascript:void(0)">Testimonial</a></li>
                    <li><a href="javascript:void(0)">FAQs</a></li>
                    <li><a href="javascript:void(0)">Error 404</a></li>
                </ul>
            </li>
            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Archive</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="single_post.html">Single Post</a></li>
                </ul>
            </li>
            <li class="below-dropdown"><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
    </div>
</div>
