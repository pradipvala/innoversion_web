 <div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
        <a href="#" class="logo"><img width="60%" src="{{ asset('admin/images/innoversion_logo.png') }}"></a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="ion-navicon"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                <ul class="nav navbar-nav navbar-right pull-right">
                    {{-- <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                    </li> --}}
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">{{ Auth::user()->name ?? null}} </a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="{{ route('home_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i>Log Out </a></li> 
                           <li><a href=""><i class="fa fa-key"></i> Change Password</a></li>
                            <li><a href=""><i class="ti-user m-r-5"></i>My Profile</a></li>
                            <li><a href=""><i class="ti-settings m-r-5"></i>Settings</a></li> -->
                             
                             <li><a href="{{ route('home_logout') }}" onclick="event.preventDefault(); document.getElementById('home_logout').submit();"><i class="ti-power-off m-r-5"></i>
                                Log Out
                            </a></li>
                             <form id="home_logout" action="{{ route('home_logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>