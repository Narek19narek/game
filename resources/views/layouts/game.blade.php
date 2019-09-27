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
            font-family: FuturaPress;
            src: url('{{ asset('fonts/futurapr.tff') }}');
        }
    </style>
</head>
<body>
@yield('content')

@stack('js')
</body>
</html>
