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
                                <span class="lvl-count">{{$user->level}}</span>
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
                            @if(user_is_selected('colors'))
                                <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56">
                                    <g id="Mini_Skin" data-name="Mini Skin" fill="none">
                                        <path d="M28,0A28,28,0,1,1,0,28,28,28,0,0,1,28,0Z" stroke="none"/>
                                        <path
                                            d="M 28 10 C 18.07476425170898 10 10 18.07476425170898 10 28 C 10 37.92523574829102 18.07476425170898 46 28 46 C 37.92523574829102 46 46 37.92523574829102 46 28 C 46 18.07476425170898 37.92523574829102 10 28 10 M 28 0 C 43.46398162841797 0 56 12.53601837158203 56 28 C 56 43.46398162841797 43.46398162841797 56 28 56 C 12.53601837158203 56 0 43.46398162841797 0 28 C 0 12.53601837158203 12.53601837158203 0 28 0 Z"
                                            stroke="none"
                                            fill="{{$user->selectedSkin->color}}"/>
                                    </g>
                                </svg>
                            @else
                                <img src="{{ $user->selectedSkin->imageUrl }}" alt="skin image"
                                     width="56px"
                                     height="56px"
                                     style="border-radius: 33px;"
                                >
                            @endif
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
            <div class="support text-center position-relative">
                <div id="supportBtn" class="position-relative">
                    <img src="{{ asset("images/menu/support.svg") }}" alt="Support">
                </div>
                <div id="support-buttons">
                    <div>
                        <a href="mailto:help@raevantgames.com" target="_blank">
                            <img src="{{ asset("images/menu/mail.svg") }}" alt="Send mail">
                        </a>
                    </div>
                    <div>
                        <a href="https://discord.gg/ZyDw3pQ" target="_blank">
                            <img src="{{ asset("images/menu/discord.svg") }}" alt="Discord">
                        </a>
                    </div>
                </div>
            </div>
            <div class="share text-center position-relative mb-5">
                <div id="shareBtn" class="position-relative">
                    <img src="{{ asset("images/menu/share.svg") }}" alt="Share">
                </div>
                <div id="share-buttons">
                    <div>
                        <a href="http://facebook.com/sharer/sharer.php?u={{env('APP_URL')}}" target="_blank">
                            <img src="{{ asset("images/menu/facebook.svg") }}" alt="facebook image">
                        </a>
                    </div>
                    <div>
                        <a href="https://twitter.com/intent/tweet?url={{env('APP_URL')}}" target="_blank">
                            <img src="{{ asset("images/menu/twitter.svg") }}" alt="twitter image">
                        </a>
                    </div>
                    <div>
                        <a href="mailto:?subject={{route('home')}}" target="_blank">
                            <img src="{{ asset("images/menu/mail.svg") }}" alt="gmail image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="google-reklam">
            {{--            <script data-ad-client="ca-pub-5688279952546872" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>--}}
            {{--            <ins class="adsbygoogle"--}}
            {{--                 style="display:inline-block;width:300px;height:230px"--}}
            {{--                 data-ad-client="ca-pub-xxxxxxxxxxxxxx"--}}
            {{--                 data-ad-slot="yyyyyyyyyyy">--}}
            {{--            </ins>--}}
            {{--            <script>--}}
            {{--                (adsbygoogle=window.adsbygoogle || []).push({});--}}
            {{--            </script>--}}
        </div>
        <div class="row justify-content-center" style="margin: 0 71px;">
            <div class="col-lg-10">
                <div class="switrio">
                    <div class="img">
                        <img src="{{asset('images/switrio.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row ml-5">
            <div class="col-8 mx-auto">
                <div class="text-center play-btn">
                    <form method="POST" action="{{ route('play') }}" autocomplete="off">
                        <input type="image" src="{{ asset('images/play-btn.png') }}" alt="PLAY" id="playBtn">
                        <input id="nickname" type="text" class="form-control-plaintext text-center p-0 field"
                               name="nickname"
                               @guest placeholder="NICKNAME" @else value="{{ substr(Auth::user()->name, 0, 5) }}"
                               @endguest maxlength="5">
                    </form>
                </div>
            </div>
        </div>
        <div class="terms-and-privacy">
            <a href="{{ route('term-and-condition') }}" class="mr-3">Terms and Conditions</a>
            <a href="{{ route('privacy-policy') }}">Privacy Policy</a>

        </div>
    </div>
    <script>
        if (document.cookie.match('(^|;) ?nickname=([^;]*)(;|$)')) {
            document.querySelector('#nickname').value = document.cookie.match('(^|;) ?nickname=([^;]*)(;|$)')[2];
        }
    </script>
@endsection
