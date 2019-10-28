<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
{{--    <link rel="shortcut icon" href="{{ asset('images/icon64.png') }}">--}}
    <meta property="description" content="SWITRIO">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
</head>
<body>
@yield('content')
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6"></script>
@stack('js')
</body>
</html>
