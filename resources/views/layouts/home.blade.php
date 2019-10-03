<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->

    <style type="text/css">
        {{--@font-face {--}}
        {{--    font-family: FuturaPress;--}}
        {{--    src: url('{{ asset('fonts/futurapr.tff') }}');--}}
        {{--}--}}
        @font-face {
            font-family: 'FuturaPress';
            src: url('{{ asset('font/FuturaPressPress.eot') }}');
            src: url('{{ asset('font/FuturaPressPress.eot?#iefix') }}') format('embedded-opentype'),
            url('{{ asset('font/FuturaPressPress.woff2') }}') format('woff2'),
            url('{{ asset('font/FuturaPressPress.woff') }}') format('woff'),
            url('{{ asset('font/FuturaPressPress.ttf') }}') format('truetype'),
            url('{{ asset('font/FuturaPressPress.svg#FuturaPressPress') }}') format('svg');
            font-weight: normal;
            font-style: normal;
        }
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    @stack('home-header-pre-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @stack('home-header-post-styles')
<!-- Scripts -->
    @stack('home-header-pre-scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('home-header-post-scripts')
</head>

<body>
<main>
    @yield('content')
</main>
@stack('footer-pre-scripts')
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!-- Chart JS -->
{{--        <script src="../assets/js/plugins/chartjs.min.js"></script>--}}
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
</body>
</html>
