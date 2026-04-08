<div class="navbar-wrapper">
    <nav class="navbar navbar-expand-xl">
        <div class="navbar-container">
            <div class="logo-container">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('image/it-icon.png') }}" class="site-logo img-fluid"></a>
            </div>
            <button class="navbar-toggler nav-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('services') }}">Company Overview</a></li>
                            <li><a class="dropdown-item" href="#">Leadership & Team</a></li>
                            <li><a class="dropdown-item" href="#">Our Process</a></li>
                            <li><a class="dropdown-item" href="{{ route('testimonials') }}">Client Testimonials</a></li>
                            <li><a class="dropdown-item" href="#">Careers</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" aria-expanded="false">
                                    Software Development <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Custom Software Development</a></li>
                                    <li><a class="dropdown-item" href="#">Web Application Development</a></li>
                                    <li><a class="dropdown-item" href="#">Mobile App Development</a></li>
                                    <li><a class="dropdown-item" href="#">SaaS Development</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" aria-expanded="false">
                                    Integration & Automation <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">API Integration Services</a></li>
                                    <li><a class="dropdown-item" href="#">Workflow Automation</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" aria-expanded="false">
                                    Design & Growth <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">UI/UX Design</a></li>
                                    <li><a class="dropdown-item" href="#">Digital Marketing & SEO</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" aria-expanded="false">
                                    Support <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Maintenance & Support</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">HRMS</a></li>
                            <li><a class="dropdown-item" href="#">Autopluse (Automobile Showroom ERP)</a></li>
                            <li><a class="dropdown-item" href="#">Hotel Room Booking Management System</a></li>
                            <li><a class="dropdown-item" href="#">Cab Booking System</a></li>
                            <li><a class="dropdown-item" href="#">Donation Management System</a></li>
                            <li><a class="dropdown-item" href="#">CRM Solutions</a></li>
                            <li><a class="dropdown-item" href="#">ERP Systems</a></li>
                            <li><a class="dropdown-item" href="#">E-commerce Platforms</a></li>
                            <li><a class="dropdown-item" href="#">SaaS Applications</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Industries <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('blog') }}">Healthcare</a></li>
                            <li><a class="dropdown-item" href="#">Education</a></li>
                            <li><a class="dropdown-item" href="#">Finance & Banking</a></li>
                            <li><a class="dropdown-item" href="#">Manufacturing</a></li>
                            <li><a class="dropdown-item" href="#">Textile</a></li>
                            <li><a class="dropdown-item" href="#">Retail & E-commerce</a></li>
                            <li><a class="dropdown-item" href="#">Real Estate</a></li>
                            <li><a class="dropdown-item" href="#">Startups</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Technologies <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Frontend <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">React.js</a></li>
                                    <li><a class="dropdown-item" href="#">Vue.js</a></li>
                                    <li><a class="dropdown-item" href="#">Angular</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Backend <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Node.js</a></li>
                                    <li><a class="dropdown-item" href="#">Laravel</a></li>
                                    <li><a class="dropdown-item" href="#">Python</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Mobile <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Flutter</a></li>
                                    <li><a class="dropdown-item" href="#">React Native</a></li>
                                    <li><a class="dropdown-item" href="#">Android</a></li>
                                    <li><a class="dropdown-item" href="#">iOS</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Platforms <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Shopify</a></li>
                                    <li><a class="dropdown-item" href="#">Magento</a></li>
                                    <li><a class="dropdown-item" href="#">WordPress</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Cloud & Tools <i class="fa-solid fa-angle-down accent-color"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">AWS</a></li>
                                    <li><a class="dropdown-item" href="#">Azure</a></li>
                                    <li><a class="dropdown-item" href="#">DevOps</a></li>
                                    <li><a class="dropdown-item" href="#">Zoho</a></li>
                                    <li><a class="dropdown-item" href="#">Odoo</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Portfolio <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">All Projects</a></li>
                            <li><a class="dropdown-item" href="#">Web Applications</a></li>
                            <li><a class="dropdown-item" href="#">Mobile Apps</a></li>
                            <li><a class="dropdown-item" href="#">ERP / CRM Projects</a></li>
                            <li><a class="dropdown-item" href="#">E-commerce Projects</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Case Studies <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('case-studies') }}">All Case Studies</a></li>
                            <li><a class="dropdown-item" href="#">Industry-wise</a></li>
                            <li><a class="dropdown-item" href="#">Solution-wise</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blog <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('blog') }}">Latest Articles</a></li>
                            <li><a class="dropdown-item" href="#">Technology Blogs</a></li>
                            <li><a class="dropdown-item" href="#">Business Insights</a></li>
                            <li><a class="dropdown-item" href="#">Industry Trends</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Careers <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Open Positions</a></li>
                            <li><a class="dropdown-item" href="#">Life at Company</a></li>
                            <li><a class="dropdown-item" href="#">Apply Now</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contact <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a class="dropdown-item" href="#">Get Quote</a></li>
                            <li><a class="dropdown-item" href="#">Support</a></li>
                        </ul>
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
                    <h6>+91 9687350999</h6>
                </div>
            </div>
        </div>
    </nav>
</div>

<style>
.dropdown-submenu {
    position: relative;
}
.dropdown-menu {
    overflow: visible !important;
    background-color: rgba(15, 15, 15, 0.95) !important;
    border: 1px solid rgba(255, 255, 255, 0.08);
}
.dropdown-menu .dropdown-item {
    color: #f5f5f5;
    padding: 0.65rem 1.50rem;
    white-space: normal;
}
.dropdown-menu .dropdown-item:hover,
.dropdown-menu .dropdown-item:focus {
    background-color: rgba(255, 255, 255, 0.08);
    color: #fff;
}
.dropdown-submenu > .dropdown-menu {
    position: absolute;
    top: 0;
    left: 100%;
    margin-top: -0.5rem;
    display: none;
    min-width: 260px;
    max-width: 320px;
    z-index: 1000;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25);
    background-color: rgba(15, 15, 15, 0.95) !important;
}
.dropdown-submenu:hover > .dropdown-menu,
.dropdown-submenu > .dropdown-menu.show {
    display: block;
    margin-top: 21%;
}
.dropdown-submenu > .dropdown-item::after {
    content: "›";
    float: right;
    margin-left: 0.5rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle nested dropdowns
    const nestedDropdowns = document.querySelectorAll('.dropdown-submenu > .dropdown-toggle');

    nestedDropdowns.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const submenu = this.nextElementSibling;
            if (submenu && submenu.classList.contains('dropdown-menu')) {
                document.querySelectorAll('.dropdown-submenu > .dropdown-menu').forEach(function(menu) {
                    if (menu !== submenu) {
                        menu.classList.remove('show');
                    }
                });
                submenu.classList.toggle('show');
            }
        });
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown-submenu')) {
            document.querySelectorAll('.dropdown-submenu > .dropdown-menu').forEach(function(menu) {
                menu.classList.remove('show');
            });
        }
    });
});
</script>
