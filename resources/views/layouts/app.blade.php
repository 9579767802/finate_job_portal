<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">


    <!--== Bootstrap CSS ==-->
    {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <!--== Icofont Icon CSS ==-->
    <link href="{{ asset('assets/css/swiper.min.css') }}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{ asset('assets/css/swiper.min.css') }}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{ asset('assets/css/fancybox.min.css') }}" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="{{ asset('assets/css/aos.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <!--== Main Style CSS ==-->
    {{-- <link href="resources/css/app.css" rel="stylesheet" /> --}}
    <!-- Scripts -->
    @notifyCss
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/toastr.scss'])
</head>

<body>
    <div id="app">
        @include('nav')
        <main class="main-content">
            <div style="position: relative; z-index: 10;"><x-notify::notify /></div>
            @yield('content')
            @include('footer')
    </div>
    </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- <script src="{{ asset('js/candidate_actions.js') }}"></script> --}}
    <!--=== jQuery Modernizr Min Js ===-->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{ asset('assets/js/jquery-main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate.js') }}"></script>
    <!--=== jQuery Popper Min Js ===-->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!--=== jQuery Swiper Min Js ===-->
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <!--=== jQuery Fancybox Min Js ===-->
    <script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
    <!--=== jQuery Aos Min Js ===-->
    <script src="{{ asset('assets/js/aos.min.js') }}"></script>
    <!--=== jQuery Counterup Min Js ===-->
    <script src="{{ asset('assets/js/counterup.js') }}"></script>
    <!--=== jQuery Waypoint Js ===-->
    <script src="{{ asset('assets/js/waypoint.js') }}"></script>
    <!--=== jQuery Custom Js ===-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @notifyJs
    @stack('scripts')
</body>

</html>
