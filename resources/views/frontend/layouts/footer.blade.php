<div class="section-footer">
    <div class="bg-footer-wrapper">
        <div class="bg-footer">
            <div class="hero-container position-relative z-2">
                <div class="d-flex flex-column gspace-2">
                    <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 grid-spacer-5 mb-5">
                        <div class="col col-xl-4">
                            <div class="footer-logo-container">
                                <div class="logo-container-footer">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('image/marko-logo.png') }}" alt="Logo"
                                            class="site-logo img-fluid">
                                    </a>
                                </div>
                                {{--  <h4>Driving Digital Growth with Innovation & Strategy</h4>  --}}
                                {{--  <p>
                                    We deliver innovative and reliable software solutions that empower businesses to
                                    grow digitally. From web and mobile development to AI and branding, we turn ideas
                                    into powerful digital experiences.
                                </p>  --}}
                            </div>
                        </div>
                        <div class="col col-xl-2">
                            <div class="footer-quick-links">
                                <h5>Quick Links</h5>
                                <ul class="footer-list">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('services') }}">Service</a></li>
                                    {{--  <li><a href="{{ route('case-studies') }}">Case Studies</a></li>  --}}
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route('open-positions') }}">Requirements</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-xl-3">
                            <div class="footer-services-container">
                                <h5>Services</h5>
                                <ul class="footer-list">
                                    <li><a href="{{ route('service.details', 'web-application-development') }}">Web
                                            Application Development</a></li>
                                    <li><a href="{{ route('service.details', 'mobile-app-development') }}">App
                                            Application Development</a></li>
                                    <li><a href="{{ route('service.details', 'digital-marketing-seo') }}">SEO
                                            Application Development</a></li>
                                    {{--  <li><a href="javascript:void(0)">AI Development</a></li>  --}}
                                    {{--  <li><a href="javascript:void(0)">Branding Strategy</a></li>  --}}
                                    <li><a href="{{ route('service.details', 'saas-development') }}">Saas
                                            Development</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-xl-3">
                            <div class="footer-contact-container">
                                <h5>Contact Info</h5>
                                <ul class="contact-list">
                                    <li>
                                        <i class="fa-solid fa-envelope contact-list-icon"></i>
                                        <a href="mailto:info@innoversiontechnolab.com">info@innoversiontechnolab.com</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-phone contact-list-icon"></i>
                                        <a href="tel:+919687350999">+91
                                            9687350999</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-location-dot contact-list-icon"></i>
                                        <a href="https://maps.google.com/?q=Office no.1304, Rk World Tower, 150 Feet Ring Rd, near Sheetal Park, Shastri Nagar, Dharam Nagar Society, Rajkot, Gujarat 360006"
                                            target="_blank">Office no.1304, Rk World
                                            Tower,
                                            150 Feet Ring
                                            Rd, near Sheetal Park, Shastri
                                            Nagar, Dharam Nagar Society, Rajkot, Gujarat 360006</a>
                                    </li>
                                </ul>
                                <div class="d-flex flex-column gspace-1">
                                    <h5>Social Media</h5>
                                    <div class="social-container">
                                        <div class="social-item-wrapper">
                                            <a href="https://www.facebook.com/profile.php?id=61554574495923"
                                                target="_blank" class="social-item">
                                                <i class="fa-brands fa-facebook"></i>
                                            </a>
                                        </div>
                                        {{--  <div class="social-item-wrapper">
                                            <a href="https://youtube.com" class="social-item">
                                                <i class="fa-brands fa-youtube"></i>
                                            </a>
                                        </div>  --}}
                                        <div class="social-item-wrapper">
                                            <a href="https://www.instagram.com/innoversion/" target="_blank"
                                                class="social-item">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </div>
                                        <div class="social-item-wrapper">
                                            <a href="https://www.linkedin.com/company/innoversion-technolab/"
                                                target="_blank" class="social-item">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="footer-content-spacer"></div>  --}}
                </div>
                <div class="copyright-container">
                    <span class="copyright">© {{ Carbon\Carbon::now()->format('Y') }} Innoversion Technolab. All Rights
                        Reserved.</span>
                    <div class="d-flex flex-row gspace-2">
                        <a href="{{ route('terms-and-conditions') }}" class="legal-link">Terms & Conditions</a>
                        <a href="{{ route('privacy-policy') }}" class="legal-link">Privacy Policy</a>
                    </div>
                </div>
                <div class="footer-spacer"></div>
            </div>
        </div>
    </div>
</div>
