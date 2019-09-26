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
        <div class="row justify-content-center pt-4" id="registerPage">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="register">
                                <div class="row justify-content-center my-5 py-2">
                                    <label for="email" class="col-md-8 text-center">{{ __('EMAIL OR USERNAME:') }}</label>
                                    <div class="col-md-8 px-0">
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center form-btn pt-5">
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
