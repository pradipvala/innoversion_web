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
            {{--  <li><a href="{{ route('about') }}">About Us</a></li>  --}}
            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Company</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="{{ route('company.overview') }}">Company Overview</a></li>
                    <li><a href="{{ route('team') }}">Leadership & Team</a></li>
                    <li><a href="javascript:void(0)">Our Process</a></li>
                    <li><a href="javascript:void(0)">Case Studies</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="javascript:void(0)">Life at Company</a></li>
                    <li><a href="{{ route('open-positions') }}">Open Positions</a></li>
                </ul>
            </li>
            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Services</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="{{ route('service.details', 'custom-software-development') }}">Custom Software
                            Development</a></li>
                    <li><a href="{{ route('service.details', 'web-application-development') }}">Web Application
                            Development</a></li>
                    <li><a href="{{ route('service.details', 'mobile-application-development') }}">Mobile Application
                            Development</a></li>
                    <li><a href="{{ route('service.details', 'saas-development') }}">Saas Development</a></li>
                    <li><a href="{{ route('service.details', 'api-integration-services') }}">API Integration
                            Services</a></li>
                    <li><a href="{{ route('service.details', 'workflow-automation') }}">Workflow Automation</a></li>
                    <li><a href="{{ route('service.details', 'ui-ux-design') }}">UI/UX Design</a></li>
                    <li><a href="{{ route('service.details', 'digital-marketing-seo') }}">Digital Marketing & SEO</a>
                    </li>
                    {{--  <li><a href="javascript:void(0)">React.js Development</a></li>
                    <li><a href="javascript:void(0)">Vue.js Development</a></li>
                    <li><a href="javascript:void(0)">Angular Development</a></li>  --}}
                </ul>
            </li>

            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Products</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="javascript:void(0)">HRMS</a></li>
                    <li><a href="{{ route('auto.pulse') }}">AutoPulse</a></li>
                    <li><a href="javascript:void(0)">Hotel Room Booking System</a></li>
                    <li><a href="javascript:void(0)">Cab Booking System</a></li>
                    <li><a href="javascript:void(0)">Donation Management System</a></li>
                    <li><a href="javascript:void(0)">Custom Solutions</a></li>
                    <li><a href="javascript:void(0)">CRM Solutions</a></li>
                    <li><a href="javascript:void(0)">ERP Systems</a></li>
                    <li><a href="javascript:void(0)">E-commerce Platforms</a></li>
                    <li><a href="javascript:void(0)">SaaS Applications</a></li>
                </ul>
            </li>

            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Industries</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="{{ route('industry.details', 'healthcare') }}">Healthcare</a></li>
                    <li><a href="{{ route('industry.details', 'education') }}">Education</a></li>
                    <li><a href="{{ route('industry.details', 'finance') }}">Finance & Banking</a></li>
                    <li><a href="{{ route('industry.details', 'manufacturing') }}">Manufacturing</a></li>
                    <li><a href="{{ route('industry.details', 'textiles') }}">Textiles</a></li>
                    <li><a href="{{ route('industry.details', 'retail') }}">Retail & E-commerce</a></li>
                    <li><a href="{{ route('industry.details', 'realestate') }}">RealEstate</a></li>
                    <li><a href="{{ route('industry.details', 'startups') }}">Startups</a></li>
                </ul>
            </li>

            <li class="below-dropdown"><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
    </div>
</div>
