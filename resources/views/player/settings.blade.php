@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 py-4" id="settings">
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
                            <h1 class="text-center">COMING SOON</h1>
{{--                            <div class="col-md-4 offset-2 pt-5">--}}
{{--                                <form action="">--}}
{{--                                    <label for="game_mode">Dark Mode</label>--}}
{{--                                    <input type="checkbox" id="game_mode" name="game_mode">--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>
                        <div class="row justify-content-center form-btn mt-5">
                            <p>{{ __('SETTINGS') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
