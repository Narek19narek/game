<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
{{--    <link rel="shortcut icon" href="{{ asset('images/icon64.png') }}">--}}
    <meta property="description" content="SWITRIO">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <style type="text/css">
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
        * {
            font-family: 'FuturaPress', sans-serif;
        }
    </style>
</head>
<body>
@yield('content')

@stack('js')
</body>
</html>
