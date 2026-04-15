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
                    <li><a href="{{ route('case-studies') }}">Case Studies</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="javascript:void(0)">Life at Company</a></li>
                </ul>
            </li>
            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Services</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        Software Development</li>
                    <li><a href="{{ route('service.details', 'custom-software-development') }}">Custom Software
                            Development</a></li>
                    <li><a href="{{ route('service.details', 'web-application-development') }}">Web Application
                            Development</a></li>
                    <li><a href="{{ route('service.details', 'mobile-app-development') }}">Mobile App
                            Development</a></li>
                    <li><a href="{{ route('service.details', 'saas-development') }}">SaaS Development</a></li>
                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        Integration & Automation</li>
                    <li><a href="{{ route('service.details', 'api-integration-services') }}">API Integration
                            Services</a></li>
                    <li><a href="{{ route('service.details', 'workflow-automation') }}">Workflow Automation</a></li>
                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        Design & Growth</li>
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
                    <a href="#">Technologies</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        Frontend Development</li>
                    <li><a href="{{ route('technology.details', 'react') }}">React.js</a></li>
                    <li><a href="{{ route('technology.details', 'vue') }}">Vue.js</a></li>
                    <li><a href="{{ route('technology.details', 'angular') }}">Angular</a></li>

                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        Backend Development</li>
                    <li><a href="{{ route('technology.details', 'node-js') }}">Node.js</a></li>
                    <li><a href="{{ route('technology.details', 'laravel') }}">Laravel</a></li>
                    <li><a href="{{ route('technology.details', 'python') }}">Python</a></li>
                    <li><a href="{{ route('technology.details', 'codeigniter') }}">CodeIgniter</a></li>

                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        Mobile App Development</li>
                    <li><a href="{{ route('technology.details', 'flutter') }}">Flutter</a></li>
                    <li><a href="{{ route('technology.details', 'react-native') }}">React Native</a></li>
                    <li><a href="{{ route('technology.details', 'android') }}">Android</a></li>
                    <li><a href="{{ route('technology.details', 'ios') }}">iOS</a></li>

                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        CMS & eCommerce Platforms</li>
                    <li><a href="{{ route('technology.details', 'shopify') }}">Shopify</a></li>
                    <li><a href="{{ route('technology.details', 'magento') }}">Magento</a></li>
                    <li><a href="{{ route('technology.details', 'wordpress') }}">WordPress</a></li>

                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        Design & Marketing</li>
                    <li><a href="{{ route('technology.details', 'ui-ux-design') }}">UI/UX Design</a></li>
                    <li><a href="{{ route('technology.details', 'seo') }}">SEO</a></li>

                    <li
                        style="padding: 8px 16px 4px; font-size: 12px; font-weight: 700; text-transform: uppercase; opacity: .75;">
                        Cloud, CRM & Tools</li>
                    <li><a href="{{ route('technology.details', 'aws') }}">AWS</a></li>
                    <li><a href="{{ route('technology.details', 'devops') }}">DevOps</a></li>
                    <li><a href="{{ route('technology.details', 'zoho') }}">Zoho</a></li>
                    <li><a href="{{ route('technology.details', 'odoo') }}">Odoo</a></li>
                </ul>
            </li>

            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Why Choose Us</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="javascript:void(0)">End-to-End Delivery</a></li>
                    <li><a href="javascript:void(0)">Agile & Transparent</a></li>
                    <li><a href="javascript:void(0)">Dedicated Support</a></li>
                    <li><a href="javascript:void(0)">15+ Years Experience</a></li>
                    <li><a href="{{ route('projects') }}">Project</a></li>
                </ul>
            </li>

            <li class="sidebar-dropdown">
                <div class="dropdown-header">
                    <a href="#">Products</a>
                    <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <ul class="sidebar-dropdown-menu">
                    <li><a href="{{ route('auto.pulse') }}">AutoPulse</a></li>
                </ul>
            </li>

            <li class="below-dropdown"><a href="{{ route('open-positions') }}">Careers</a></li>
            <li class="below-dropdown"><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
    </div>
</div>
