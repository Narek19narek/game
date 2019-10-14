@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 py-4" id="game_over">
        <div class="menu-buttons row justify-content-between">
            <div class="col-auto back-btn">
                <a href="{{ route('home') }}" class="btn p-0"><i class="fas fa-angle-left"></i></a>
            </div>
            <div class="col-auto logo text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset("images/menu/logo.svg") }}" alt="logo image">
                </a>
            </div>
        </div>
        <div class="row justify-content-center pt-4">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="formContent row align-items-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4 xp p-0">
                                        <h1>{{ $totalPoints }}</h1>
                                        <h2>XP</h2>
                                    </div>
                                    <div class="col-4 kill p-0 d-flex align-items-center">
                                        <h1 class="w-100">YOU DIED</h1>
                                    </div>
                                    <div class="col-4 p-0 d-flex justify-content-center position-relative coins">
                                        <img src="{{ asset("images/coins/coin.svg") }}" alt="Coins" width="94">
                                        <p class="position-absolute d-flex justify-content-center align-items-center m-0">@if($user) $user->coins @endif</p>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-4 p-0">
                                        <h4 class="text-center">Switches:@if($user) $user->switch @else 3 @endif</h4>
                                    </div>
                                    <div class="col-4 p-0">
                                        <h4 class="text-center">Kills: <span>{{ $params['kill'] }}</span></h4>
                                    </div>
                                    <div class="col-4 p-0">
                                        <h4 class="text-center">Time: <span>{{ $params['time'] }} second</span></h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-center form-btn mt-5">
                            <form action="{{ route('play') }}" method="post">
                                @csrf
                                <p><input type="submit" id="playBtn" value="{{ __('PLAY AGAIN') }}"></p>
                                <input id="nickname" type="text" class="form-control-plaintext text-center" name="nickname"
                                     value="{{ session()->get('nickname') }}" hidden>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

