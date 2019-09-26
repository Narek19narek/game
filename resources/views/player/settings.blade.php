@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 py-4" id="profile">
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
    </div>
@endsection
