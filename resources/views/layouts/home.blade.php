<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ generateAppTitle() }}</title>

    <!-- ================= Favicons ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="{{ asset('images/BuddiesAppLogo.svg') }}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/BuddiesAppLogo.svg') }}">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/BuddiesAppLogo.svg') }}">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/BuddiesAppLogo.svg') }}">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/BuddiesAppLogo.svg') }}">

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style-multi-scroll.css') }}" />

    <!-- Scripts -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    @yield('PAGE_LEVEL_STYLES')
    <!-- END PAGE LEVEL STYLES -->
</head>
<body>
    <!-- BEGIN PAGE START SECTION -->
    @yield('PAGE_START')
    <!-- END PAGE START SECTION -->

    @include('_sections.home.loading')

    <!-- +++ START - MultiScroll sections +++ -->
    <div id="multi-div">

        @yield('PAGE_CONTENT')

    </div>
    <!-- +++ END - MultiScroll sections +++ -->

    <!-- BEGIN PAGE END SECTION -->
    @yield('PAGE_END')
    <!-- END PAGE END SECTION -->

    <!-- ///////////////////\\\\\\\\\\\\\\\\\\\ -->
    <!-- ********** jQuery Resources ********** -->
    <!-- \\\\\\\\\\\\\\\\\\\/////////////////// -->

    <!-- * Libraries jQuery, Easing and Bootstrap - Be careful to not remove them * -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easings.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- MultiScroll plugin -->
    <script type="text/javascript" src="{{ asset('js/jquery.multiscroll.js') }}"></script>

    <!-- Slideshow plugin -->
    <script type="text/javascript" src="{{ asset('js/vegas-multiscroll.js') }}"></script>

    <!-- Google Maps API and Skin -->

    <!-- PhotoSwipe Core JS file -->
    <script type="text/javascript" src="{{ asset('js/photoswipe.js') }}"></script>

    <!-- PhotoSwipe UI JS file -->
    <script type="text/javascript" src="{{ asset('js/photoswipe-ui-default.js') }}"></script>

    <!-- Contact form plugin -->
    <script type="text/javascript" src="{{ asset('js/contact-me.js') }}"></script>

    <!-- Newsletter plugin -->
    <script type="text/javascript" src="{{ asset('js/notifyMe.js') }}"></script>

    <!-- Main JS File -->
    <script type="text/javascript" src="{{ asset('js/main-multi-scroll.js') }}"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    @yield('PAGE_LEVEL_SCRIPTS')
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>
