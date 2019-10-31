@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 py-4" id="settings">
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
        <div class="row justify-content-center">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="formContent row justify-content-between">
{{--                            <h1 class="text-center">COMING SOON</h1>--}}
                            <div class="col-md-4 offset-2 pt-5 game-mode">
                                <div>
                                    <label for="game_mode">Dark Mode
                                        <span class="@if(auth()->check() && auth()->user()->game_mode) active @endif"></span>
                                    </label>
                                    <input type="checkbox" id="game_mode" name="game_mode" @if(auth()->check() && auth()->user()->game_mode) checked @endif hidden>
                                </div>
                                @if(auth()->check())
                                    <div>
                                        <label for="hide_name">Hide name
                                            <span class="@if(auth()->user()->hide_name) active @endif"></span>
                                        </label>
                                        <input type="checkbox" id="hide_name" name="hide_name" @if(auth()->user()->hide_name) checked @endif hidden>
                                    </div>
                                    <div>
                                        <label for="hide_position">Hide Position
                                            <span class="@if(auth()->user()->hide_position) active @endif"></span>
                                        </label>
                                        <input type="checkbox" id="hide_position" name="hide_position" @if(auth()->user()->hide_position) checked @endif hidden>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center form-btn mt-5">
                            <p>{{ __('SETTINGS') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const gameModeCookie = document.cookie.match('(^|;) ?game_mode=([^;]*)(;|$)');
        const inputGameMode = $('#game_mode');
        if (gameModeCookie && gameModeCookie[2] === '1') {
            inputGameMode.attr('checked', 'checked');
            inputGameMode.siblings().children().addClass('active');
        }
        inputGameMode.on('change', function () {
            const checked = $(this).is(':checked') ? 1 : 0;
            if (checked) {
                $(this).siblings('label').children().addClass('active');
            } else {
                $(this).siblings('label').children().removeClass('active');
            }
            $.ajax({
                method: 'get',
                url: '/settings/game-mode',
                data: {
                    checked: checked
                },
                success: function(data) {
                   if (!data.message) {
                       document.cookie = 'game_mode=' + checked;
                   }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        });

        const hideName = $('#hide_name');
        const hidePosition = $('#hide_position');

        hideProperty(hideName);
        hideProperty(hidePosition);

        function hideProperty(input) {
            input.on('change', function () {
                let name =  $(this).attr('name');
                let checked = $(this).is(':checked') ? 1 : 0;
                if (checked) {
                    $(this).siblings('label').children().addClass('active');
                } else {
                    $(this).siblings('label').children().removeClass('active');
                }
                $.ajax({
                    method: 'get',
                    url: '/settings/hide-property',
                    data: {
                        checked: checked,
                        name: name
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            });
        }
    </script>
@endsection
