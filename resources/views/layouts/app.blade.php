<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"           content="{{env('APP_URL')}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="SWITRIO" />
    <meta property="og:description"   content="Good game" />
    <meta property="og:image"         content="{{asset('images/switrio.svg')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Switrio') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset("js/main.js") }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/menu/logo.ico') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @stack('css')
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
        <div class="mb-version">
            <h1>COMING SOON</h1>
        </div>
    </div>
@stack('js')
</body>
</html>
