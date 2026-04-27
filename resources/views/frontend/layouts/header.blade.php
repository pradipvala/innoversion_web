<div class="navbar-wrapper">
    <nav class="navbar navbar-expand-xl">
        <div class="navbar-container">
            <div class="logo-container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('image/marko-logo.png') }}" class="site-logo img-fluid">
                </a>
            </div>
            <button class="navbar-toggler nav-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('services') ? 'active' : '' }}"
                            href="{{ route('services') }}" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Company <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu" style="min-width:290px">
                            <div class="sec-h">About Us</div>
                            <a href="{{ route('company.overview') }}" class="dl">
                                <div>
                                    <div class="dt"><b> Company Overview </b></div>
                                    <div class="ds">Who we are & our mission</div>
                                </div>
                            </a>
                            <a href="{{ route('team') }}" class="dl">
                                <div>
                                    <div class="dt"><b> Leadership & Team</b></div>
                                    <div class="ds">Meet the people behind the work</div>
                                </div>
                            </a>
                            <a href="{{ route('our.process') }}" class="dl">
                                <div>
                                    <div class="dt"><b> Our Process</b></div>
                                    <div class="ds">How we deliver results</div>
                                </div>
                            </a>
                            {{--  <a href="{{ route('testimonials') }}" class="dl">
                                <div>
                                    <div class="dt"><b> Client Testimonials</b></div>
                                    <div class="ds">What our clients say about us</div>
                                </div>
                            </a>  --}}
                            {{--  <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>Portfolio</b></div>
                                    <div class="ds">Projects & client success stories</div>
                                </div>
                            </a>  --}}
                            {{--  <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>Case Studies</b></div>
                                    <div class="ds">Deep-dive project breakdowns</div>
                                </div>
                            </a>
                            <a href="{{ route('blog') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Blog</b></div>
                                    <div class="ds">Insights, news & tech articles</div>
                                </div>
                            </a>  --}}
                            <a href="{{ route('life.at.company') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Life at Company</b></div>
                                    <div class="ds">Culture, perks & team life</div>
                                </div>
                            </a>
                            {{--  <div class="divd"></div>  --}}
                            {{--  <div class="sec-h">Careers</div>
                            <a href="{{ route('open-positions') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Open Positions</b></div>
                                    <div class="ds">See current job openings</div>
                                </div>
                            </a>  --}}

                            {{-- <div class="divd"></div> --}}
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu mega" style="min-width:760px;">
                            <div class="mega-grid">
                                <div class="mega-col">
                                    <div class="col-h">Software Development</div>
                                    <a href="{{ route('service.details', 'custom-software-development') }}"
                                        class="dl">
                                        <div>
                                            <div class="dt"><b>Custom Software Development</b></div>
                                            <div class="ds">Tailored solutions for your business</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('service.details', 'web-application-development') }}"
                                        class="dl">
                                        <div>
                                            <div class="dt"><b>Web Application Development</b></div>
                                            <div class="ds">Scalable & responsive web apps</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('service.details', 'mobile-app-development') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>Mobile App Development</b></div>
                                            <div class="ds">iOS & Android applications</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('service.details', 'saas-development') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>SaaS Development</b></div>
                                            <div class="ds">Cloud-based software platforms</div>
                                        </div>
                                    </a>
                                    <div class="col-h" style="margin-top:8px">Integration & Automation</div>
                                    <a href="{{ route('service.details', 'api-integration-services') }}"
                                        class="dl">
                                        <div>
                                            <div class="dt"><b>API Integration Services</b></div>
                                            <div class="ds">Connect your systems seamlessly</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('service.details', 'workflow-automation') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>Workflow Automation</b></div>
                                            <div class="ds">Automate repetitive processes</div>
                                        </div>
                                    </a>
                                    <div class="col-h" style="margin-top:8px">Design & Growth</div>
                                    <a href="{{ route('service.details', 'ui-ux-design') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>UI/UX Design</b></div>
                                            <div class="ds">Beautiful, user-centered design</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('service.details', 'digital-marketing-seo') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>Digital Marketing & SEO</b></div>
                                            <div class="ds">Grow your online presence</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="mega-col">
                                    <div class="col-h">Technologies</div>
                                    <div class="sec-h" style="color:#9CA3AF">Frontend Development</div>
                                    <div class="tag-row">
                                        <a href="{{ route('technology.details', 'react') }}"
                                            class="tag text-decoration-none">React.js</a>
                                        <a href="{{ route('technology.details', 'vue') }}"
                                            class="tag text-decoration-none">Vue.js</a>
                                        <a href="{{ route('technology.details', 'angular') }}"
                                            class="tag text-decoration-none">Angular.js</a>
                                    </div>
                                    <div class="sec-h" style="color:#9CA3AF">Backend Development</div>
                                    <div class="tag-row">
                                        <a href="{{ route('technology.details', 'node-js') }}"
                                            class="tag text-decoration-none">Node.js</a>
                                        <a href="{{ route('technology.details', 'laravel') }}"
                                            class="tag text-decoration-none">Laravel</a>
                                        <a href="{{ route('technology.details', 'python') }}"
                                            class="tag text-decoration-none">Python</a>
                                        <a href="{{ route('technology.details', 'codeigniter') }}"
                                            class="tag text-decoration-none">CodeIgniter</a>
                                    </div>
                                    <div class="sec-h" style="color:#9CA3AF">Mobile App Development</div>
                                    <div class="tag-row">
                                        <a href="{{ route('technology.details', 'flutter') }}"
                                            class="tag text-decoration-none">Flutter</a>
                                        <a href="{{ route('technology.details', 'react-native') }}"
                                            class="tag text-decoration-none">React Native</a>
                                        <a href="{{ route('technology.details', 'android') }}"
                                            class="tag text-decoration-none">Android</a>
                                        <a href="{{ route('technology.details', 'ios') }}"
                                            class="tag text-decoration-none">iOS</a>
                                    </div>
                                    <div class="sec-h" style="color:#9CA3AF">CMS & eCommerce Platforms</div>
                                    <div class="tag-row">
                                        <a href="{{ route('technology.details', 'shopify') }}"
                                            class="tag text-decoration-none">Shopify</a>
                                        <a href="{{ route('technology.details', 'magento') }}"
                                            class="tag text-decoration-none">Magento</a>
                                        <a href="{{ route('technology.details', 'wordpress') }}"
                                            class="tag text-decoration-none">WordPress</a>
                                    </div>
                                    <div class="sec-h" style="color:#9CA3AF">Design & Marketing</div>
                                    <div class="tag-row">
                                        <a href="{{ route('technology.details', 'ui-ux-design') }}"
                                            class="tag text-decoration-none">UI/UX Design</a>
                                        <a href="{{ route('technology.details', 'seo') }}"
                                            class="tag text-decoration-none">SEO (Search Engine Optimization)</a>
                                    </div>
                                    <div class="sec-h" style="color:#9CA3AF">Cloud, CRM & Tools</div>
                                    <div class="tag-row">
                                        <a href="{{ route('technology.details', 'aws') }}"
                                            class="tag text-decoration-none">AWS</a>
                                        <a href="{{ route('technology.details', 'devops') }}"
                                            class="tag text-decoration-none">DevOps</a>
                                        <a href="{{ route('technology.details', 'zoho') }}"
                                            class="tag text-decoration-none">Zoho</a>
                                        <a href="{{ route('technology.details', 'odoo') }}"
                                            class="tag text-decoration-none">Odoo</a>
                                    </div>
                                </div>
                                <div class="mega-col">
                                    <div class="col-h">Why Choose Us</div>
                                    <a href="{{ route('expertise.details', 'end-to-end-delivery') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>End-to-End Delivery</b></div>
                                            <div class="ds">From concept to deployment — we handle the full
                                                lifecycle.</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('expertise.details', 'agile-transparent') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>Agile & Transparent</b></div>
                                            <div class="ds">Weekly sprints, full visibility, zero surprises.</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('expertise.details', 'dedicated-support') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>Dedicated Support</b></div>
                                            <div class="ds">Post-launch care with SLA-backed response times.</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('expertise.details', 'experience') }}" class="dl">
                                        <div>
                                            <div class="dt"><b>15+ Years Experience</b></div>
                                            <div class="ds">Proven expertise across 200+ successful projects.</div>
                                        </div>
                                    </a>

                                    <a href="{{ route('projects') }}" class="dl" {{--  style="padding:8px 12px; border-radius:6px;"  --}}>
                                        <div>
                                            <div class="dt"><b>Project</b></div>
                                            <div class="ds">AutoPulse </br> Family Tree System </br>
                                                I AM Happy
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Products <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu" style="min-width:295px">
                            <div class="sec-h"><b>Ready-Made Products</b></div>
                            <a href="{{ route('auto.pulse') }}" class="dl">
                                <div>
                                    <div class="dt"><b>AutoPulse</b></div>
                                    <div class="ds">Automobile Showroom ERP</div>
                                </div>
                            </a>
                            {{--  <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>HRMS</b></div>
                                    <div class="ds">HR & Payroll Management System</div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>Hotel Room Booking System</b></div>
                                    <div class="ds">Full hotel management platform</div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>Cab Booking System</b></div>
                                    <div class="ds">Ride & fleet management solution</div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>Donation Management System</b></div>
                                    <div class="ds">NGO & charity platform</div>
                                </div>
                            </a>
                            <div class="divd"></div>
                            <div class="sec-h"><b>Custom Solutions</b></div>
                            <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>CRM Solutions</b></div>
                                    <div class="ds">Customer relationship management</div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>ERP Systems</b></div>
                                    <div class="ds">Enterprise resource planning</div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>E-commerce Platforms</b></div>
                                    <div class="ds">Online store & marketplace</div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dl">
                                <div>
                                    <div class="dt"><b>SaaS Applications</b></div>
                                    <div class="ds">Scalable cloud-based software</div>
                                </div>
                            </a>  --}}
                        </ul>
                    </li>
                    {{--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Industries <i class="fa-solid fa-angle-down accent-color"></i>
                        </a>
                        <ul class="dropdown-menu" style="min-width:250px">
                            <a href="{{ route('industry.details', 'healthcare') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Healthcare</b></div>
                                    <div class="ds">Clinics, hospitals & healthtech</div>
                                </div>
                            </a>
                            <a href="{{ route('industry.details', 'education') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Education</b></div>
                                    <div class="ds">EdTech, LMS & school systems</div>
                                </div>
                            </a>
                            <a href="{{ route('industry.details', 'finance-banking') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Finance & Banking</b></div>
                                    <div class="ds">Fintech & banking software</div>
                                </div>
                            </a>
                            <a href="{{ route('industry.details', 'manufacturing') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Manufacturing</b></div>
                                    <div class="ds">Production & supply chain</div>
                                </div>
                            </a>
                            <a href="{{ route('industry.details', 'textile') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Textile</b></div>
                                    <div class="ds">Fabric & garment industry</div>
                                </div>
                            </a>
                            <a href="{{ route('industry.details', 'retail-ecommerce') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Retail & E-commerce</b></div>
                                    <div class="ds">Online & offline retail tech</div>
                                </div>
                            </a>
                            <a href="{{ route('industry.details', 'real-estate') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Real Estate</b></div>
                                    <div class="ds">Property & listing platforms</div>
                                </div>
                            </a>
                            <a href="{{ route('industry.details', 'startups') }}" class="dl">
                                <div>
                                    <div class="dt"><b>Startups</b></div>
                                    <div class="ds">MVP to scale-up solutions</div>
                                </div>
                            </a>
                        </ul>
                    </li>  --}}
                    <!-- CAREER -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('open-positions') ? 'active' : '' }}"
                            href="{{ route('open-positions') }}">Requirements</a>
                    </li>
                    <!-- CONTACT -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Contact Us</a>
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
                    <a href="tel:+916359131135">
                        <h6>+91 6359131135</h6>
                    </a>
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
        padding: 8px !important;
        border-radius: 12px !important;
        box-shadow: 0 24px 60px rgba(0, 0, 0, .7) !important;
    }

    body.lightmode .dropdown-menu {
        background-color: #ffffff !important;
        border: 1px solid rgba(15, 23, 42, 0.12) !important;
        box-shadow: 0 20px 44px rgba(15, 23, 42, 0.16) !important;
    }

    .dropdown-menu.show {
        display: block;
        animation: dropdownShow 0.22s ease forwards;
    }

    @keyframes dropdownShow {
        0% {
            opacity: 0;
            margin-top: -6px;
        }

        100% {
            opacity: 1;
            margin-top: 0;
        }
    }

    .dl {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 8px 10px;
        border-radius: 7px;
        cursor: pointer;
        transition: background .14s;
        text-decoration: none;
    }

    .dl:hover {
        background: rgba(255, 255, 255, 0.06);
    }

    body.lightmode .dl:hover {
        background: rgba(226, 1, 15, 0.08);
    }

    .dt {
        /* font-size: 13.5px; */
        font-weight: 500;
        color: #E2010F;
        line-height: 1.2;
        /* font-family: 'Inter', sans-serif; */
    }

    .ds {
        font-size: 11.5px;
        color: #9CA3AF;
        margin-top: 3px;
        line-height: 1.4;
        font-family: 'Inter', sans-serif;
    }

    body.lightmode .ds {
        color: #5F6B7A;
    }

    .sec-h {
        font-size: 10px;
        font-weight: 700;
        color: #9CA3AF;
        text-transform: uppercase;
        letter-spacing: .9px;
        padding: 10px 10px 4px;
        margin-top: 2px;
    }

    body.lightmode .sec-h {
        color: #6B7280;
    }

    .divd {
        height: 1px;
        background: rgba(255, 255, 255, 0.08);
        margin: 6px 6px;
    }

    body.lightmode .divd {
        background: rgba(15, 23, 42, 0.12);
    }

    /* ---- MEGA MENU ---- */
    .dropdown-menu.mega {
        left: 50% !important;
        transform: translateX(-50%) !important;
    }

    @media(max-width: 1200px) {
        .dropdown-menu.mega {
            left: 0 !important;
            transform: none !important;
            min-width: 100% !important;
        }
    }

    .mega-grid {
        display: grid;
        grid-template-columns: 1.1fr 1fr 1fr;
        gap: 0;
    }

    .mega-col {
        padding: 4px;
    }

    .mega-col+.mega-col {
        border-left: 1px solid rgba(255, 255, 255, 0.08);
    }

    body.lightmode .mega-col+.mega-col {
        border-left: 1px solid rgba(15, 23, 42, 0.12);
    }

    .col-h {
        color: #9CA3AF;
        text-transform: uppercase;
        letter-spacing: .9px;
        /* padding: 8px 10px 6px; */
    }

    body.lightmode .col-h {
        color: #6B7280;
    }

    .tag-row {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
        padding: 4px 10px 10px;
    }

    .tag {
        background: rgba(30, 58, 95, 0.4);
        color: #E2010F;
        font-size: 11px;
        padding: 3px 9px;
        border-radius: 4px;
        font-weight: 500;
        border: 1px solid rgba(147, 197, 253, 0.1);
    }

    body.lightmode .tag {
        background: rgba(226, 1, 15, 0.07);
        color: #C4000C;
        border: 1px solid rgba(226, 1, 15, 0.2);
    }

    .why-card {
        margin: 4px 6px 6px;
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        padding: 10px 12px;
    }

    .why-t {
        color: #E2010F;
    }

    .why-s {
        font-size: 11.5px;
        color: #9CA3AF;
        line-height: 1.5;
    }

    @media(max-width: 991px) {
        .mega-grid {
            grid-template-columns: 1fr;
        }

        .mega-col+.mega-col {
            border-left: none;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        body.lightmode .mega-col+.mega-col {
            border-top: 1px solid rgba(15, 23, 42, 0.12);
        }
    }

    .dropdown-menu .dropdown-item {
        color: #f5f5f5;
        padding: 0.65rem 1.50rem;
        white-space: normal;
    }

    body.lightmode .dropdown-menu .dropdown-item {
        color: #111827;
    }

    .dropdown-menu .dropdown-item:hover,
    .dropdown-menu .dropdown-item:focus {
        background-color: rgba(255, 255, 255, 0.08);
        color: #fff;
    }

    body.lightmode .dropdown-menu .dropdown-item:hover,
    body.lightmode .dropdown-menu .dropdown-item:focus {
        background-color: rgba(226, 1, 15, 0.08);
        color: #0f172a;
    }

    .dropdown-submenu>.dropdown-menu {
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

    body.lightmode .dropdown-submenu>.dropdown-menu {
        background-color: #ffffff !important;
    }

    .dropdown-submenu:hover>.dropdown-menu,
    .dropdown-submenu>.dropdown-menu.show {
        display: block;
        margin-top: 21%;
    }

    .dropdown-submenu>.dropdown-item::after {
        content: " ›";
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
                    document.querySelectorAll('.dropdown-submenu > .dropdown-menu').forEach(
                        function(menu) {
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
