@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 pt-4 text-center">
        <div class="menu-buttons float-right">
            <div class="logo text-center">
                <a href="{{ route('home') }}" class="c-pointer">
                    <img src="{{ asset("images/menu/logo.svg") }}" alt="logo image">
                </a>
            </div>
            <div class="menu text-center">
                @guest
                    <div class="item position-relative">
                        <a href="{{ route('login') }}">
                            <img src="{{ asset("images/menu/account.svg") }}" alt="account image">
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('get-coin') }}">
                            <img src="{{ asset("images/menu/coin1.svg") }}" alt="coin image">

                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('get-skin') }}">
                            <img src="{{ asset("images/menu/skin1.svg") }}" alt="skin image">
                        </a>
                    </div>
                @else
                    <div class="item">
                        <a href="{{ route('profile', ['id' => auth()->id()]) }}">
                            <div class="account position-relative">
                                <span class="lvl">LVL</span>
                                <span class="lvl-count">{{ Auth::user()->level }}</span>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('get-coin') }}">
                            <img src="{{ asset("images/menu/coin2.svg") }}" alt="coin image">
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('get-skin') }}">
                            <img src="{{ asset("images/skins/skin-".(Auth::user()->skeen_id).".svg") }}" alt="skin image" width="56px">
                        </a>
                    </div>
                @endguest
                <div class="item">
                    <a href="{{ route('get-boosts') }}">
                        <img src="{{ asset("images/menu/boost1.svg") }}" alt="boost image">
                    </a>
                </div>
                <div class="item">
                    <a href="{{ route('help') }}">
                        <img src="{{ asset("images/menu/help.svg") }}" alt="help image">
                    </a>
                </div>
                <div class="item">
                    <a href="{{ route('settings') }}">
                        <img src="{{ asset("images/menu/setting.svg") }}" alt="settings image">
                    </a>
                </div>
            </div>
            <div class="share text-center position-relative mb-5">
                <div id="shareBtn" class="position-relative py-2">
                    <img src="{{ asset("images/menu/share.svg") }}" alt="share logo">
                </div>
                <div id="share-buttons" class="py-2">
                    <div>
                        <a href="https://plus.google.com/share?url={{env('APP_URL')}}" target="_blank">
                            <img src="{{ asset("images/menu/google.svg") }}" alt="google plus image">
                        </a>
                    </div>
                    <div>
                        <div id="fb-root"></div>
                        <a href="http://facebook.com/sharer/sharer.php?u={{env('APP_URL')}}" target="_blank">
                            <img src="{{ asset("images/menu/facebook.svg") }}" alt="facebook image">
                        </a>
                    </div>
                    <div>
                        <a href="https://www.instagram.com/?url={{env('APP_URL')}}" target="_blank">
                            <img src="{{ asset("images/menu/instagram.svg") }}" alt="instagram image">
                        </a>
                    </div>
                    <div>
                        <a href="https://twitter.com/intent/tweet?url={{env('APP_URL')}}" target="_blank">
                            <img src="{{ asset("images/menu/twitter.svg") }}" alt="twitter image">
                        </a>
                    </div>
                    <div>
                        <a href="mailto:" target="_blank">
                            <img src="{{ asset("images/menu/mail.svg") }}" alt="gmail image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="google-reklam">
            <script data-ad-client="ca-pub-5688279952546872" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:230px"
                 data-ad-client="ca-pub-xxxxxxxxxxxxxx"
                 data-ad-slot="yyyyyyyyyyy">
            </ins>
            <script>
                (adsbygoogle=window.adsbygoogle || []).push({});
            </script>
        </div>
        <div class="switrio ml-5">
            <div class="img">
                <img src="{{asset('images/switrio.png')}}" alt="">
            </div>
        </div>
        <div class="row ml-5">
            <div class="col-8 mx-auto">
                <div class="text-center play-btn">
                    <form method="POST" action="{{ route('play') }}" autocomplete="off">
                        @csrf
                        <input type="image" src="{{ asset('images/play-btn.png') }}" alt="PLAY" id="playBtn">
                        <input id="nickname" type="text" class="form-control-plaintext text-center p-0" name="nickname"
                               @guest autofocus placeholder="NICKNAME" @else disabled value="{{ Auth::user()->name }}" @endguest >
                    </form>
                </div>
            </div>
        </div>
        <div class="terms-and-privacy">
            <a href="{{ route('term-and-condition') }}" class="mr-3">Terms and Conditions</a>
            <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
        </div>
    </div>
@endsection
