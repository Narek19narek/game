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
        <div class="row justify-content-center" id="loginPage">
            <div class="col">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <label for="email"
                               class="col-md-4 offset-md-1 text-md-right">{{ __('EMAIL/USERNAME:') }}</label>
                        <div class="col-md-5">
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="password" class="col-md-4 offset-md-1 text-md-right">{{ __('PASSWORD:') }}</label>

                        <div class="col-md-5">
                            <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{--                    <div class="form-group row">--}}
                    {{--                        <div class="col-md-6 offset-md-4">--}}
                    {{--                            <div class="form-check">--}}
                    {{--                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                    {{--                                <label class="form-check-label" for="remember">--}}
                    {{--                                    {{ __('Remember Me') }}--}}
                    {{--                                </label>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="row">
                        <div class="col-md-5 offset-md-5">

                            @if (Route::has('password.request'))
                                <a class="btn p-0" href="{{ route('password.request') }}">
                                    {{ __('Reset pass') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="row register formContent">
                                <div class="google-register mb-4">
                                    <a href="{{ url('auth/google') }}">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>

                                </div>
                                <div class="default-register mb-4">
                                    <a href="{{ route('register') }}" class="d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40.375" height="58.003"
                                             viewBox="0 0 40.375 58.003">
                                            <path id="Path_1" data-name="Path 1"
                                                  d="M0,37.677.011,56H37.294V41.372L12.853,28.1,37.029,14.985S33.685-1.213,17.269.073-.023,18.286.012,18.286H6.15s1.5-11.16,10.838-12.3,12.35,6.163,12.35,6.163L.011,28.1l31.14,16.937v4.754H6.162V37.677Z"
                                                  transform="translate(2.082 1.003)" fill="#E0E0E0" stroke="#E0E0E0"
                                                  stroke-width="2"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="facebook-register mb-4">
                                    <a href="{{ url('/auth/redirect/facebook') }}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-12 d-flex justify-content-center text">
                                    <p>REGISTER</p>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row justify-content-center mt-5 form-btn">
                        <button type="submit" class="btn">
                            {{ __('LOGIN') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
