@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 py-4" id="errors">
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
        <div class="row justify-content-center">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="formContent row align-items-center">
                            <div class="position-relative w-25">
                                <img src="{{ asset("images/error.svg") }}" alt="Error" class="img-fluid">
                            </div>
                            <div class="w-50">
                                <h1 class="text-center">Error 500 :/</h1>
                                <h4 class="text-center">I'm literally calling the developer now</h4>
                            </div>
                        </div>
                        <div class="row justify-content-center form-btn mt-5">
                            <p>{{ __('ERROR') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

