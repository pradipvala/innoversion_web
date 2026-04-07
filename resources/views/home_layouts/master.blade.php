<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

        <link href="{{ asset('frontend_theme/assets/css/jquery-ui.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend_theme/assets/css/fancybox.min.css') }}">
        <link href="{{ asset('frontend_theme/assets/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend_theme/assets/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend_theme/assets/css/bootstrap-select.css') }}" rel="stylesheet">
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">  <!--  Need to Remove if not works -->
    
        
        <link href="{{ asset('frontend_theme/assets/css/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend_theme/assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend_theme/assets/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend_theme/assets/css/flickity.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
</head>




<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel Spatie Tutorial
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                       
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ ('Login') }} </a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ ('Register') }}</a></li>
                        @else
                            {{-- <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li> --}}
                            <li><a class="nav-link" href="{{ route('user') }}">Manage Users</a></li>
                            <li><a class="nav-link" href="{{ route('role') }}">Manage Role</a></li>
                            <li><a class="nav-link" href="{{ route('permission.show') }}">Permissions</a></li>
                            
                            <li class="ms-3 nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ ('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bg-light">
            <div class="container">
            @yield('content')

            {{-- <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
            {{-- <script type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}

            <script type="text/javascript" src="{{ url('/assets/js/jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{ url('/assets/js/jquery-3.5.1.min.js') }}"></script>
           


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <script type="text/javascript"  src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

            <script type="text/javascript"  src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

            <!--Export table buttons-->
            <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
            <script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
            <script src="https://momentjs.com/downloads/moment.js"></script>
            <!--Export table button CSS-->

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js"></script> 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

                {{-- @include('template.scripts') --}}
            </div>
        </main>
    </div>
</body>
</html> 