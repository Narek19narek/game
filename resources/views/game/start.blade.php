@extends('layouts.game')

@section('content')
    <canvas id="game-canvas"></canvas>
    <div id="play-menu" class="hidden">
        <label for="username-input">
            <input type="text" id="username-input" placeholder="Username"
                   value="@if (auth()->check()){{auth()->user()->name}}@else{{request('nickname')}}@endif"/>

            @if(auth()->check())
                <input type="hidden" id="user_info"
                       data-switches="{{auth()->user()->switch}}"
                       data-push="{{auth()->user()->push}}"
                       data-teleport="{{auth()->user()->teleport}}"
                       data-skin="{{auth()->user()->skeen_id}}"
                       data-game-mode="{{ auth()->user()->game_mode }}"
                       data-hide-name="{{ auth()->user()->hide_name }}"
                       data-hide-position="{{ auth()->user()->hide_position }}"
                       data-user-id="{{ auth()->id() }}"
                />
            @endif

        </label>
{{--        <button id="play-button" type="submit">PLAY</button>--}}
    </div>
    <div id="leaderboard" class="hidden">
        <table>
            <tbody>
            <tr>
                <th colspan="2">
                    <a href="{{route('home')}}" id="homeBtn">
                        <img src="{{asset("images/menu/logo.svg")}}" alt="Logo">
                    </a>
                </th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <div id="score"><h2></h2><span>Kills</span></div>
    </div>
    <div id="game-info" class="hidden">
        <div id="push-btn"><p>P</p><span></span></div>
        <div id="switch-btn"><p>S</p><span></span></div>
        <div id="teleport-btn"><p>T</p><span></span></div>
    </div>
    <div id="game-over" class="hidden">
        <h1>Game Over</h1>
    </div>
    <div id="disconnect-modal" class="hidden">
        <div>
            <h2>Disconnected from Server </h2>
            <hr/>
            <button id="reconnect-button">RECONNECT</button>
        </div>
    </div>
@endsection


@push('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
{{--    <script>--}}
{{--        let stateCheck = setInterval(() => {--}}
{{--            if (document.readyState === 'complete') {--}}
{{--                clearInterval(stateCheck);--}}
{{--                document.getElementById('play-button').click();--}}
{{--            }--}}
{{--        }, 2000);--}}
{{--    </script>--}}
@endpush
