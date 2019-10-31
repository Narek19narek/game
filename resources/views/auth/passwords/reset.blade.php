@extends('layouts.app')

@section('content')
    <div class="container-fluid h-100 pt-4">
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
        <div class="row justify-content-center" id="registerPage">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="centered">
                            @error('password')
                                <div class="alert alert-danger text-center">{{ $message }}</div>
                            @enderror
                            @error('password-confirm')
                                <div class="alert alert-danger text-center">{{ $message }}</div>
                            @enderror
                        </div>
                        <form method="POST" action="{{ route('password.update') }}" autocomplete="off">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="register formContent">
                                <input type="hidden"
                                       name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">

                                <div class="row justify-content-center mt-5 py-2">
                                    <label for="email"
                                           class="col-md-8 text-center">{{ __('Please enter new password') }}</label>
                                </div>
                                <div class="row">
                                    <label for="password" class="col-md-4 text-md-right">{{ __('PASSWORD:') }}</label>
                                    <div class="col-md-6 px-0">
                                        <input id="password" type="password"
                                               class=" @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <label for="password-confirm"
                                           class="col-md-4 text-md-right">{{ __('RE-ENTER:') }}</label>
                                    <div class="col-md-6 px-0">
                                        <input id="password-confirm" type="password"
                                               class=" @error('password-confirm') is-invalid @enderror"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center form-btn">
                                <button type="submit" class="btn">
                                    {{ __('RESET') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

