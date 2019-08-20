@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <ul class="navbar nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
                        <li><a data-toggle="tab" href="#register">Register</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="login" class="tab-pane fade in active show">
                            @include('player.login')
                        </div>
                        <div id="register" class="tab-pane fade">
                            @include('player.register')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
