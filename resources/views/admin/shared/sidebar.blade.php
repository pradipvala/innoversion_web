<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title text-center">
                    <h4>{{ Auth::user()->name ?? null }}</h4>
                </li>

                <li class="has_sub">
                    <a href="{{ route('admin.admin_dashboard') }}"
                        class="{{ request()->is('admin/admin_dashboard*') ? 'active' : '' }}"><i class="fa fa-home"></i>
                        <span> Dashboard </span></a>
                        
                </li>


                <!-- Masters  -->
                @canany(['country-create', 'country-edit', 'country-view', 'country-delete', 'state-create', 'state-edit', 'state-view', 'state-delete',  'city-create', 'city-edit', 'city-view', 'city-delete'])
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-building"></i><span>Masters</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.country') }}">Country</a></li>
                        <li><a href="{{ route('admin.state') }}">State</a></li>
                        <li><a href="{{ route('admin.city') }}">City</a></li>
                    </ul>
                </li>
                @endcanany



                <!-- USER & ROLE & PERMISSION -->
                 @canany(['role-create', 'role-edit', 'role-view', 'role-delete', 'permission-create', 'permission-edit', 'permission-view', 'permission-delete', 'user-edit', 'user-view', 'user-delete', 'user-create'])
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube"></i> <span>Role & Permission</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.user') }}">User</a></li>
                        <li><a href="{{ route('admin.role') }}">Role</a></li>
                        <li><a href="{{ route('admin.permission') }}">Permission</a></li>
                    </ul>
                </li>
                @endcanany


                <!-- Visiting card  -->
                @canany(['visiting-card-create', 'visiting-card-edit', 'visiting-card-view', 'visiting-card-delete'])
                <li class="has_sub">
                    <a href="{{ route('admin.card') }}">
                        <i class="fa fa-credit-card"></i><span> Digital visiting Card</span>
                    </a>
                </li>
                @endcanany

                <!-- Franchise  -->
                @canany(['franchise-create', 'franchise-edit', 'franchise-view', 'franchise-delete', 
                            'sub-franchise-create', 'sub-franchise-edit', 'sub-franchise-view', 'sub-franchise-delete'])
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-group"></i> <span> Become a Franchise </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.franchise') }}"><span>Manage Franchise</a></li>
                        <li><a href="{{ route('admin.sub_franchise') }}">Sub Franchise</span></a></li>
                    </ul> 
                </li>
                @endcanany


                <!-- Wallet Payment -->
                @canany(['wallet-pay-create', 'wallet-pay-edit', 'wallet-pay-view', 'wallet-pay-delete'])
                    <li class="has_sub">
                        <a href="#">
                            <i class="fa fa-credit-card"></i><span> My Wallet Payment</span>
                        </a>
                    </li>
                @endcanany

                <!-- Web Support -->
                @canany(['web-support-create', 'web-support-edit', 'web-support-view', 'web-support-delete'])
                    <li class="has_sub">
                        <a href="{{ route('admin.websupport') }}">
                            <i class="fa fa-globe"></i><span> Web Support</span>
                        </a>
                    </li>
                @endcanany

                <!-- App Support -->
                @canany(['app-support-create', 'app-support-edit', 'app-support-view', 'app-support-delete'])

                    <li class="has_sub">
                       <a href="{{ route('admin.appsupport') }}">
                            <i class="fa fa-mobile-phone"></i><span> App Support</span>
                        </a>
                    </li>
                @endcanany


                <!-- Server Support -->
                @canany(['server-support-create', 'server-support-edit', 'server-support-view', 'server-support-delete'])

                    <li class="has_sub">
                        <a href="{{ route('admin.serversupport') }}">
                            <i class="fa fa-server"></i><span> Server Support</span>
                        </a>
                    </li>
                @endcanany

                <!-- Global Configuration -->
                @canany(['global-configuration-create', 'global-configuration-edit', 'global-configuration-view', 'global-configuration-delete'])

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i> <span>Global Configuration</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('admin.global_franchise') }}">Add/manage Franchise Fee</a></li>
                            <li><a href="#">Digital Visiting Card cost</a></li>
                        </ul>
                    </li>
                @endcanany


                <!-- Project Task -->
                @canany(['project-task-create', 'project-task-edit', 'project-task-view', 'project-task-delete'])

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-text"></i> <span>Manage Project</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('admin.project.task') }}">Add/manage Project</a></li>
                        </ul>
                    </li>
                @endcanany

                <!-- Project Task -->
                @canany(['lead-create', 'lead-edit', 'lead-view', 'lead-delete'])
                <li class="has_sub">
                    <a href="{{ route('admin.lead') }}" >
                        <i class="fa fa-headphones"></i> <span>Lead Board</span>
                    </a>
                </li>
                 @endcanany
                
                <li class="has_sub">
                    <a href="#">
                        <i class="fa fa-headphones"></i><span> Support Requirement </span>
                    </a>
                </li>

                
                <!-- Home PAge  -->
                @canany(['home-page-create', 'home-page-edit', 'home-page-view', 'home-page-delete'])
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Home Page </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.sliders') }}" class="{{ request()->is('admin/sliders*') || request()->is('admin/create/slider') || request()->is('admin/edit/slider*') ? 'active' : '' }}">Sliders</a></li>
                      <li><a href="{{ route('admin.aboutus') }}"  class="{{ request()->is('admin/about-us*') || request()->is('admin/create/aboutus') || request()->is('admin/edit/aboutus*') ? 'active' : '' }}">About Us</a></li>
                        <li><a href="{{ route('admin.partners') }}"  class="{{ request()->is('admin/partners*') || request()->is('admin/create/partner') || request()->is('admin/edit/partner*') ? 'active' : '' }}">Partners</a></li>
                        <li><a href="{{ route('admin.testimonials') }}"  class="{{ request()->is('admin/testimonials*') || request()->is('admin/create/testimonial') || request()->is('admin/edit/testimonial*') ? 'active' : '' }}">Testimonials</a></li>
                        <li><a href="{{ route('admin.clients') }}"  class="{{ request()->is('admin/clients*') || request()->is('admin/create/client') || request()->is('admin/edit/client*') ? 'active' : '' }}">Client</a></li>
                        <li><a href="{{ route('admin.homepageproduct') }}"  class="{{ request()->is('admin/homepageproduct*') || request()->is('admin/create/homepageproduct') || request()->is('admin/edit/homepageproduct*') ? 'active' : '' }}">Home Page Product</a></li>
                        <li><a href="{{ route('admin.homepageservice') }}"  class="{{ request()->is('admin/homepageservice*') || request()->is('admin/create/homepageservice') || request()->is('admin/edit/homepageservice*') ? 'active' : '' }}">Home Page Service</a></li>

                    </ul>
                    
                </li>
                @endcanany



                <!-- About PAge  -->
                @canany(['about-us-create', 'about-us-edit', 'about-us-view', 'about-us-delete'])

                  <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-question-circle"></i> <span> About Us </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.members') }}" class="{{ request()->is('admin/members*') || request()->is('admin/create/member') || request()->is('admin/edit/member*') ? 'active' : '' }}">Team Members</a></li>
                      <li><a href="{{ route('admin.certificates') }}"  class="{{ request()->is('admin/certificates*') || request()->is('admin/create/certificate') || request()->is('admin/edit/certificate*') ? 'active' : '' }}">Certificates</a></li>

                      <li><a href="{{ route('admin.about_us_detail') }}"  class="{{ request()->is('admin/about_us_detail*') || request()->is('admin/create/about_us_detail') || request()->is('admin/edit/about_us_detail*') ? 'active' : '' }}">About Us Details</a></li>
                      
                    </ul>
                    
                </li>
                @endcanany
                
                

                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-leanpub"></i> <span>Services </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">

                        @canany(['new-service-create', 'new-service-edit', 'new-service-view', 'new-service-delete'])
                         <li><a href="{{ route('admin.services_1.index') }}" class="{{ request()->is('admin/services*') || request()->is('admin/create/service') || request()->is('admin/edit/service*') ? 'active' : '' }}">Add Service</a></li>
                         
                        <li><a href="{{ route('admin.services') }}" class="{{ request()->is('admin/services*') || request()->is('admin/create/service') || request()->is('admin/edit/service*') ? 'active' : '' }}">Industries We Serve</a></li>
                         @endcanany

                        @canany(['show-service-create', 'show-service-edit', 'show-service-view', 'show-service-delete'])
                        <li><a href="{{ route('admin.dashboard_services') }}">Service</a></li>
                        @endcanany
                    </ul>
                    
                </li>
                
                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube"></i> <span>Product</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">

                        @canany(['new-product-create', 'new-product-edit', 'new-product-view', 'new-product-delete'])
                            <li><a href="{{ route('admin.categories', ['id' => '0']) }}" class="{{ request()->is('admin/categories*') || request()->is('admin/create/category*') || request()->is('admin/edit/category*') ? 'active' : '' }}">Product Categories</a>
                            </li>
                            
                            <li><a href="{{ route('admin.products') }}" class="{{ request()->is('admin/products*') || request()->is('admin/create/product') || request()->is('admin/edit/product*') ? 'active' : '' }}">Add Products</a></li>

                            <li><a href="{{ route('admin.brands') }}" class="{{ request()->is('admin/brands*') || request()->is('admin/create/brand') || request()->is('admin/edit/brand*') ? 'active' : '' }}">Brands</a></li>
                       @endcanany

                        @canany(['show-product-create', 'show-product-edit', 'show-product-view', 'show-product-delete'])
                         <li><a href="{{ route('admin.dashboard_products') }}">Products</a></li>
                        @endcanany
                     
                    </ul>
                    
                </li>
                
                <!-- Blogs Permission -->
                @canany(['blog-create', 'blog-edit', 'blog-view', 'blog-delete'])
                 <li class="has_sub">
                    <a href="{{ route('admin.blogs') }}"
                        class="{{ request()->is('admin/blogs*') || request()->is('admin/create/blog') || request()->is('admin/edit/blog*') ? 'active' : '' }}"><i
                            class="fa fa-sellsy"></i> <span> Blogs </span></a>
                </li>
                 @endcanany
                     

                <!-- Recruitment Permission -->
                @canany(['recruitment-create', 'recruitment-edit', 'recruitment-view', 'recruitment-delete'])
                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-search-plus"></i> <span>Recruitment</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.recruitments') }}" class="{{ request()->is('admin/recruitments*') || request()->is('admin/create/recruitment') || request()->is('admin/edit/recruitment*') ? 'active' : '' }}">Job Types</a></li>
                        <li><a href="{{ route('admin.recruitu.listing') }}" class="{{ request()->is('admin/recruitments*') || request()->is('admin/create/recruitment') || request()->is('admin/edit/recruitment*') ? 'active' : '' }}">CV</a></li>
                     
                    </ul>
                    
                </li>
                @endcanany

                <!-- Project Permission -->
                @canany(['project-create', 'project-edit', 'project-view', 'project-delete'])
                <li class="has_sub">
                    <a href="{{ route('admin.projects') }}"
                        class="{{ request()->is('admin/projects*') || request()->is('admin/create/project') || request()->is('admin/edit/project*') ? 'active' : '' }}"><i
                            class="fa fa-product-hunt"></i> <span> Project </span></a>
                </li>
                @endcanany


                <!-- Contact Us -->
                @canany(['contact-us-create', 'contact-us-edit', 'contact-us-view', 'contact-us-delete'])
                <li class="has_sub">
                    <a href="{{ route('admin.contactus') }}"
                        class="{{ request()->is('admin/contact-us*') ? 'active' : '' }}"><i class="fa fa-phone"></i>
                        <span> Contact Us</span></a>
                </li>
                @endcanany
                

                 <!-- Company Profile  Permission -->
                @canany(['company-profile-create', 'company-profile-edit', 'company-profile-view', 'company-profile-delete'])
                <li class="has_sub">
                    <a href="{{ route('admin.contactus1') }}"
                        class="{{ request()->is('admin/contact-us1') ? 'active' : '' }}"><i class="fa fa-download"></i>
                        <!--<span>Download Contact Us</span></a>-->
                        <span>Product Enquiry</span>
                </li>
                
                <li class="has_sub">
                    <a href="{{ route('admin.contact.file.list') }}"
                        class="{{ request()->is('admin/contact_file/') ? 'active' : '' }}"><i class="fa fa-mobile"></i>
                        <span> Company Profile</span></a>
                </li>
                @endcanany




                <!-- Whatsapp  Permission -->
                @canany(['whatsapp-create', 'whatsapp-edit', 'whatsapp-view', 'whatsapp-delete'])
                <li class="has_sub">
                    <a href="{{ route('admin.whatsapp.edit', ['id' => 1]) }}"
                        class="{{ request()->is('admin/contact_file/') ? 'active' : '' }}"><i class="fa fa-whatsapp"></i>
                        <span> Whatsapp</span></a>
                </li>
                @endcanany


                
                    
                


                

                
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
