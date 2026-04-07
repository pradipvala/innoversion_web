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

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube"></i> <span>Role & Permission</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.user') }}">User</a></li>
                        <li><a href="{{ route('admin.role') }}">Role</a></li>
                        <li><a href="{{ route('admin.permission') }}">Permission</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube"></i> <span>Our Product</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        {{-- <li><a href="{{ route('admin.categories', ['id' => '0']) }}" class="{{ request()->is('admin/categories*') || request()->is('admin/create/category*') || request()->is('admin/edit/category*') ? 'active' : '' }}">Product Categories</a></li> --}}
                        <li><a href="{{ route('admin.products') }}" class="{{ request()->is('admin/products*') || request()->is('admin/create/product') || request()->is('admin/edit/product*') ? 'active' : '' }}">Products</a></li>
                        {{-- <li><a href="{{ route('admin.brands') }}" class="{{ request()->is('admin/brands*') || request()->is('admin/create/brand') || request()->is('admin/edit/brand*') ? 'active' : '' }}">Brands</a></li> --}}
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-leanpub"></i> <span>Services </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.services_1.index') }}" class="{{ request()->is('admin/services*') || request()->is('admin/create/service') || request()->is('admin/edit/service*') ? 'active' : '' }}">Service</a></li>
                        {{-- <li><a href="{{ route('admin.services') }}" class="{{ request()->is('admin/services*') || request()->is('admin/create/service') || request()->is('admin/edit/service*') ? 'active' : '' }}">Industries We Serve</a></li> --}}
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="{{ route('admin.card') }}">
                        <i class="fa fa-address-card"></i><span> Digital card</span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-group"></i> <span> Become a Franchise </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.franchise') }}"><span>Manage Franchise</a></li>
                        <li><a href="{{ route('admin.sub_franchise') }}">Sub Franchise</span></a></li>
                    </ul> 
                </li>
                
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
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-question-circle"></i> <span> About Us </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('admin.members') }}" class="{{ request()->is('admin/members*') || request()->is('admin/create/member') || request()->is('admin/edit/member*') ? 'active' : '' }}">Team Members</a></li>
                                    <li><a href="{{ route('admin.certificates') }}"  class="{{ request()->is('admin/certificates*') || request()->is('admin/create/certificate') || request()->is('admin/edit/certificate*') ? 'active' : '' }}">Certificates</a></li>
                                </ul>
                            </li> 
                            
                            
                            
                            
                            
                            
                            <li class="has_sub">
                                <a href="{{ route('admin.blogs') }}"
                                    class="{{ request()->is('admin/blogs*') || request()->is('admin/create/blog') || request()->is('admin/edit/blog*') ? 'active' : '' }}"><i
                                        class="fa fa-sellsy"></i> <span> Blogs </span></a>
                            </li>
                            
                                 
                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-search-plus"></i> <span>Recruitment</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('admin.recruitments') }}" class="{{ request()->is('admin/recruitments*') || request()->is('admin/create/recruitment') || request()->is('admin/edit/recruitment*') ? 'active' : '' }}">Job Types</a></li>
                                    <li><a href="{{ route('admin.recruitu.listing') }}" class="{{ request()->is('admin/recruitments*') || request()->is('admin/create/recruitment') || request()->is('admin/edit/recruitment*') ? 'active' : '' }}">CV</a></li>
                                 
                                </ul>
                                
                            </li> 
                
                 <li class="has_sub">
                    <a href="{{ route('admin.admin_dashboard') }}"
                      class="{{ request()->is('admin/admin_dashboard*') ? 'active' : '' }}"><i class="fa fa-home"></i>
                       <span> Home Page </span></a>
                </li> 

                

                 <li class="has_sub">
                    <a href="{{ route('admin.projects') }}"
                        class="{{ request()->is('admin/projects*') || request()->is('admin/create/project') || request()->is('admin/edit/project*') ? 'active' : '' }}"><i
                            class="fa fa-product-hunt"></i> <span> Project </span></a>
                </li>

                

                <li class="has_sub">
                    <a href="{{ route('admin.contactus') }}"
                        class="{{ request()->is('admin/contact-us*') ? 'active' : '' }}"><i class="fa fa-phone"></i>
                        <span> Contact Us</span></a>
                </li>
                
                <li class="has_sub">
                    <a href="{{ route('admin.contactus1') }}"
                        class="{{ request()->is('admin/contact-us1') ? 'active' : '' }}"><i class="fa fa-download"></i>
                        <!--<span>Download Contact Us</span></a>-->
                        <span>Company Profile Downloads</span>
                </li>
                
                
                <li class="has_sub">
                    <a href="{{ route('admin.contact.file.list') }}"
                        class="{{ request()->is('admin/contact_file/') ? 'active' : '' }}"><i class="fa fa-mobile"></i>
                        <span> Company Profile</span></a>
                </li>


                <li class="has_sub">
                    <a href="{{ route('admin.whatsapp.edit', ['id' => 1]) }}"
                        class="{{ request()->is('admin/contact_file/') ? 'active' : '' }}"><i class="fa fa-whatsapp"></i>
                        <span> Whatsapp</span></a>
                </li> 

                

                <li class="has_sub">
                    <a href="{{ route('admin.partners') }}"
                       class="{{ request()->is('admin/partners*') || request()->is('admin/create/partner') || request()->is('admin/edit/partner*') ? 'active' : '' }}">
                       <i class="fa fa-users"></i> <span> Partner </span></a>
                </li>


               <li class="has_sub">
                    <a href="{{ route('admin.clients') }}"
                        class="{{ request()->is('admin/clients*') || request()->is('admin/create/client') || request()->is('admin/edit/client*') ? 'active' : '' }}"><i
                            class="fa fa-contao"></i> <span> Client </span></a>
                </li>

                <li class="has_sub">
                  <a href="{{ route('admin.testimonials') }}"
                        class="{{ request()->is('admin/testimonials*') || request()->is('admin/create/testimonial') || request()->is('admin/edit/testimonial*') ? 'active' : '' }}"><i
                           class="fa fa-weixin"></i> <span> Testimonials </span></a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
