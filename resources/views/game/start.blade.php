@extends('layouts.game')

@section('content')
    <canvas id="game-canvas"></canvas>
    <div id="play-menu" class="hidden">
        <label for="username-input">
            <input type="text" id="username-input" placeholder="Username"
                   value="@if(auth()->check()){{auth()->user()->name}}@else{{request('nickname')}}@endif"/>
        </label>
        <button id="play-button" type="submit">PLAY</button>
    </div>
    <div id="leaderboard" class="hidden">
        <table>
            <tbody>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Score</th>
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
    </div>
    <div id="game-info" class="hidden">
        <div>S: <span></span></div>
        <div>T: <span></span></div>
        <div>P: <span></span></div>
    </div>
    <div id="kill" class="hidden"></div>
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
    <script>
        window.onload = () => {
            document.getElementById('play-button').click();
        }
        // window.onbeforeunload = () => {
        //     console.log(window.location.pathname);
        //     return window.location.pathname = '';
        // };
    </script>
@endpush
