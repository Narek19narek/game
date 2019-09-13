<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" href="{{ asset('images/icon64.png') }}">
    <meta property="description" content="A complete example multiplayer .io web game implemented from scratch. Built with Javascript and Node.js. Open source on Github.">
    <meta property="og:title" content="Chingachung">
    <meta property="og:description" content="A complete example multiplayer .io web game implemented from scratch. Built with Javascript and Node.js. Open source on Github.">
    <meta property="og:image" content="/assets/icon1200.png">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
</head>
<body>
@yield('content')

@stack('js')
</body>
</html>
