@extends('layouts.app')

@section('content')
    <div class="container-fluid h-100 py-4">
        <div class="menu-buttons row justify-content-between">
            <div class="col-auto back-btn">
                <a href="{{ url()->previous() }}" class="btn p-0"><i class="fas fa-angle-left"></i></a>
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
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('register') }}" autocomplete="off">
                            @csrf

                            <div class="register formContent">
                                <div class="row justify-content-center pt-4">
                                    <label for="email" class="col-md-4 text-md-right">{{ __('EMAIL:') }}</label>
                                    <div class="col-md-6 px-0">
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <label for="name" class="col-md-4 text-md-right">{{ __('USERNAME:') }}</label>
                                    <div class="col-md-6 px-0">
                                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <label for="password" class="col-md-4 text-md-right">{{ __('PASSWORD:') }}</label>
                                    <div class="col-md-6 px-0">
                                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <label for="password-confirm" class="col-md-4 text-md-right">{{ __('RE-ENTER:') }}</label>
                                    <div class="col-md-6 px-0">
                                        <input id="password-confirm" type="password" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center pb-4">
                                    <label for="conditions" class="col-md-4 text-md-right conditions"><a href="{{route('term-and-condition')}}">{{ __('Terms and Conditions') }}</a></label>
                                    <div class="col-md-6 px-0 mt-1">
                                        <input id="conditions" type="radio" name="conditions" required>
                                        <label for="conditions" class="pl-2">ACCEPT</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center form-btn">
                                <button type="submit" class="btn">
                                    {{ __('REGISTER') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const err = $('.invalid-feedback');
        if(err) {
            $.each(err, function (index, value) {
                window.alert($(value).find('strong').text());
            });
        }
    </script>
@endsection
