@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 py-4" id="help">
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
        <div class="row">
            <div class="col-md-7 offset-lg-1">
                <table class="mx-5">
                    <tbody>
                        <tr>
                            <th class="py-2 pr-4"><img src="{{ asset("images/how_to/A-key.svg") }}" alt="A-key"></th>
                            <td>Click A to switch right</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4"><img src="{{ asset("images/how_to/D-key.svg") }}" alt="D-key"></th>
                            <td>Click D to switch left</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4"><img src="{{ asset("images/how_to/W-key.svg") }}" alt="W-key"></th>
                            <td>Click W to teleport</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4"><img src="{{ asset("images/how_to/S-key.svg") }}" alt="S-key"></th>
                            <td>Click S to push</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4"><img src="{{ asset("images/how_to/space-key.svg") }}" alt="space-key"></th>
                            <td>Click Space to boost (must kill first)</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-5 ml-5">
                    <img src="{{ asset("images/how_to/how-to-switch.svg") }}" alt="How To Switch">
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset("images/how_to/kills.svg") }}" alt="Kills">
            </div>
            <div class="col-12 d-flex justify-content-center form-btn mt-5">
                <p>{{ __('HOW TO') }}</p>
            </div>
        </div>
    </div>
@endsection
