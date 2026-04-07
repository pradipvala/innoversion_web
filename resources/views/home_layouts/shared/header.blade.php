 <div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="#" class="logo"><img width="20%" src="{{ asset('frontend_theme/assets/images/innoversion_logo.png') }}"></a>
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
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">{{ Auth::user()->name ?? null}} </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('home_logout') }}" onclick="event.preventDefault(); document.getElementById('home_logout').submit();"><i class="ti-power-off m-r-5"></i>
                                Log Out System
                            </a></li>
                             <form id="home_logout" action="{{ route('home_logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>