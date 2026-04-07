<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Innoversion Technolab</title>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="icon" href={{ asset('image/favicon.ico') }}>
</head>
<body>
    <!-- Section Header -->
    <header>
        <!-- Section Navbar -->
        <div id="header">
        @include('frontend.layouts.header')
        </div>
    </header>

    <!-- Section Content Edit -->
    <aside>
        <div id="edit-sidebar"></div>
    </aside>

    <!-- Section Search -->
    <div id="search-form-container"></div>

    <!-- Section Sidebar -->
    <aside>
        <div id="sidebar">
        @include('frontend.layouts.sidebar')
        </div>
    </aside>

    <main>
        @yield('content')
    </main>

    <!-- Section Footer -->
    <footer>
        <div id="footer">
        @include('frontend.layouts.footer')
        </div>
    </footer>

    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/swiper-script.js') }}"></script>
    <script src="{{ asset('js/submit-form.js') }}"></script>
    <script src="{{ asset('js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/video_embedded.js') }}"></script>
</body>
</html>