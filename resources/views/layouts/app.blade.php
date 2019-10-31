<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Switr.io is a free online multiplayer io game. Switch your shape to stay alive!">
    <meta property="og:url"           content="{{env('APP_URL')}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="SWITRIO" />
    <meta property="og:description"   content="Good game" />
    <meta property="og:image"         content="{{asset('images/switrio.svg')}}" />
    <meta name="propeller" content="d73fd873337f6e382b2c70179b5a9c46">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Switrio') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset("js/main.js") }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/menu/logo.ico') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @stack('css')
    <link rel="stylesheet" type="text/css" href=""  id="ie_styles"/>

    <script type="text/javascript">
        const isIE = /*@cc_on!@*/false || !!document.documentMode;
        if(isIE) {
            document.getElementById('ie_styles').setAttribute('href', '{{ asset('css/ie.css') }}')
        }
    </script>
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
        <div class="mb-version">
            <div class="text-center play-btn">
                <form method="POST" action="{{ route('play') }}" autocomplete="off">
                    <input type="image" src="{{ asset('images/play-btn.png') }}" alt="PLAY" id="playBtn">
                    <input id="nickname" type="text" class="form-control-plaintext text-center p-0" name="nickname"
                           @guest placeholder="NICKNAME" @else value="{{ substr(Auth::user()->name, 0, 5) }}" @endguest maxlength="5">
                </form>
            </div>
        </div>
    </div>
@stack('js')
</body>
</html>
