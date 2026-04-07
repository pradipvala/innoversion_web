<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title text-center">
                    <h4>{{ Auth::user()->name ?? null }}</h4>
                </li>

                <li class="has_sub">
                    <a href="{{ route('simple_dashboard') }}">
                        <i class="fa fa-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                

                <!-- USER & ROLE & PERMISSION -->
                @canany(['role-create', 'role-edit', 'role-view', 'role-delete', 'permission-create', 'permission-edit', 
                            'permission-view', 'permission-delete', 'user-edit', 'user-view', 'user-delete', 'user-create'])
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube"></i> <span>Role & Permission</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('user') }}">User</a></li>
                            <li><a href="{{ route('role') }}">Role</a></li>
                            <li><a href="{{ route('permission') }}">Permission</a></li>
                        </ul>
                    </li>
                @endcanany


                <!-- Franchise  -->
                @canany(['franchise-create', 'franchise-edit', 'franchise-view', 'franchise-delete', 
                            'sub-franchise-create', 'sub-franchise-edit', 'sub-franchise-view', 'sub-franchise-delete'])
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-group"></i> <span> Become a Franchise </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('franchise') }}"><span>Manage Franchise</a></li>
                            <li><a href="{{ route('sub_franchise') }}">Sub Franchise</span></a></li>
                        </ul> 
                    </li>
                @endcanany

                <!-- Visiting card  -->
                @canany(['visiting-card-create', 'visiting-card-edit', 'visiting-card-view', 'visiting-card-delete'])
                        
                        <li class="has_sub">
                        <a href="{{ route('card') }}">
                            <i class="fa fa-address-card"></i><span> Digital visiting Card</span>
                        </a>
                    </li>
                @endcanany


                <!-- Add Service  -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-leanpub"></i> <span>Services </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">

                        @canany(['new-service-create', 'new-service-edit', 'new-service-view', 'new-service-delete'])
                            <li><a href="{{ route('home_services') }}">Add Service</a></li>
                        @endcanany

                        @canany(['home-page-service-create', 'home-page-service-edit', 'home-page-service-view', 'home-page-service-delete'])
                            <li><a href="{{ route('homepageservice') }}" >Home Page Service</a></li>
                        @endcanany

                        @canany(['show-service-create', 'show-service-edit', 'show-service-view', 'show-service-delete'])
                            <li><a href="{{ route('dashboard_services') }}">Service</a></li>
                        @endcanany
                    </ul>
                </li>
                

                
                <!-- Add Product  -->
                
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube"></i> <span>Product</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            @canany(['new-product-create', 'new-product-edit', 'new-product-view', 'new-product-delete'])
                                <li><a href="{{ route('home_products') }}">Add Products</a></li>
                            @endcanany

                             @canany(['home-page-product-create', 'home-page-product-edit', 'home-page-product-view', 'home-page-product-delete'])
                                <li><a href="{{ route('homepageproduct') }}" >Home Page Product</a></li>
                            @endcanany

                            @canany(['show-product-create', 'show-product-edit', 'show-product-view', 'show-product-delete'])
                                <li><a href="{{ route('dashboard_products') }}">Products</a></li>
                            @endcanany
                        </ul>
                    </li>
                

                <!-- Show Services -->
                <!-- @canany(['show-service-create', 'show-service-edit', 'show-service-view', 'show-service-delete'])
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-leanpub"></i> <span>Services </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('dashboard_services') }}">Service</a></li>
                        </ul>
                    </li>-->
                <!-- @endcanany-->

                 <!-- Show Products  -->
                 <!-- @canany(['show-product-create', 'show-product-edit', 'show-product-view', 'show-product-delete']) 
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube"></i> <span>Our Product</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('dashboard_products') }}">Products</a></li>
                        </ul>
                    </li>-->
                <!-- @endcanany -->

                <!-- Wallet Payment  -->
                @canany(['wallet-pay-create', 'wallet-pay-edit', 'wallet-pay-view', 'wallet-pay-delete'])
                    <li class="has_sub">
                        <a href="#">
                            <i class="fa fa-credit-card"></i><span> Wallet Payment</span>
                        </a>
                    </li>
                @endcanany

                <!-- Support -->
                @canany(['support-create', 'support-edit', 'support-view', 'support-delete'])
                    <li class="has_sub">
                        <a href="#">
                            <i class="fa fa-headphones"></i><span> Support</span>
                        </a>
                    </li>
                @endcanany

                @canany(['contact-us-create', 'contact-us-edit', 'contact-us-view', 'contact-us-delete'])
                    <li class="has_sub">
                        <a href="{{ route('contactus1') }}">
                            <i class="fa fa-address-card"></i><span>Contact Us</span>
                        </a>
                    </li>
                @endcanany
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
