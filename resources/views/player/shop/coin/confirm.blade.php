@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 py-4" id="coin">
        <div class="menu-buttons row justify-content-between">
            <div class="col-auto back-btn">
                <a href="{{ route('get-coin') }}" class="btn p-0"><i class="fas fa-angle-left"></i></a>
            </div>
            <div class="col-auto logo text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset("images/menu/logo.svg") }}" alt="logo image">
                </a>
            </div>
        </div>
        <div class="row justify-content-center" id="coin_success">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="formContent row align-items-center">
                            <div class="position-relative w-25">
                                <p class="coin-count">{{ $coin->coin }}</p>
                                <img src="{{ asset("images/coins/coin.svg") }}" alt="Coin" class="img-fluid">
                            </div>
                            <div class="w-50">
                                <h1 class="text-center">{{ $headline }}!</h1>
                                <p class="text-center">{{ $message }}</p>
                            </div>
                            <a href="{{ route('get-coin') }}" class="btn close-btn" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="row justify-content-center form-btn">
                            <p class="m-0">{{ __('COINS') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
