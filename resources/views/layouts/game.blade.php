<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
{{--    <link rel="shortcut icon" href="{{ asset('images/icon64.png') }}">--}}
    <meta property="description" content="SWITRIO">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">

    @if(env('APP_ENV') === 'production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151341634-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-151341634-1');
        </script>
    @endif
</head>
<body>
@yield('content')
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6"></script>
@stack('js')
</body>
</html>
