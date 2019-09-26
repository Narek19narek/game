{{--<div class="switrio">--}}
{{--    <img src="{{asset('images/switrio.png')}}" alt="">--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--    <div class="col-8 mx-auto">--}}
{{--        <div class="text-center play-btn">--}}
{{--            <form method="POST" action="{{ route('play') }}">--}}
{{--                @csrf--}}
{{--                <input type="image" src="{{ asset('images/play-btn.png') }}" alt="PLAY" id="playBtn">--}}
{{--                @guest--}}
{{--                    <input id="nickname" type="text" class="form-control-plaintext text-center" name="nickname" autofocus placeholder="NICKNAME">--}}
{{--                @else--}}
{{--                    <input id="nickname" type="text" class="form-control-plaintext text-center" name="nickname" disabled value="{{ Auth::user()->name }}">--}}
{{--                @endguest--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        --}}{{--                <div class="shadow p-3 mb-5 bg-white rounded">--}}
{{--        --}}{{--                    @guest--}}
{{--        --}}{{--                        <ul class="navbar nav nav-tabs">--}}
{{--        --}}{{--                            <li class="active"><a data-toggle="tab" href="#login">Login</a></li>--}}
{{--        --}}{{--                            <li><a data-toggle="tab" href="#register">Register</a></li>--}}
{{--        --}}{{--                        </ul>--}}
{{--        --}}{{--                        <div class="tab-content">--}}
{{--        --}}{{--                            <div id="login" class="tab-pane fade in active show">--}}
{{--        --}}{{--                                @include('player.login')--}}
{{--        --}}{{--                            </div>--}}
{{--        --}}{{--                            <div id="register" class="tab-pane fade">--}}
{{--        --}}{{--                                @include('player.register')--}}
{{--        --}}{{--                            </div>--}}
{{--        --}}{{--                        </div>--}}
{{--        --}}{{--                    @else--}}
{{--        --}}{{--                        <div class="tab-content">--}}
{{--        --}}{{--                            <div class="card">--}}
{{--        --}}{{--                                <img src="{{ asset('images/profile.png') }}" class="card-img-top img-thumbnail" alt="profile">--}}
{{--        --}}{{--                                <div class="card-body">--}}
{{--        --}}{{--                                    <h2 class="card-title">{{ Auth::user()->name }}</h2>--}}
{{--        --}}{{--                                    <div class="d-flex justify-content-around">--}}
{{--        --}}{{--                                        <h4 class="card-title">Level {{ Auth::user()->level }}</h4>--}}
{{--        --}}{{--                                        <h5 class="card-title">{{ Auth::user()->coins }} coins</h5>--}}
{{--        --}}{{--                                    </div>--}}
{{--        --}}{{--                                    <div class="level-xp">--}}
{{--        --}}{{--                                        <div class="level-width" style="width: {{ $user->levelXp() * 100 / $user->nextLevelXp() }}%"></div>--}}
{{--        --}}{{--                                        <span class="level-text">{{ $user->levelXp() }} / {{ $user->nextLevelXp() }} XP</span>--}}
{{--        --}}{{--                                    </div>--}}
{{--        --}}{{--                                    <table class="table table-bordered">--}}
{{--        --}}{{--                                        <thead>--}}
{{--        --}}{{--                                            <tr>--}}
{{--        --}}{{--                                                <th>Switch</th>--}}
{{--        --}}{{--                                                <th>Teleport</th>--}}
{{--        --}}{{--                                                <th>Push</th>--}}
{{--        --}}{{--                                            </tr>--}}
{{--        --}}{{--                                        </thead>--}}
{{--        --}}{{--                                        <tbody>--}}
{{--        --}}{{--                                            <tr>--}}
{{--        --}}{{--                                                <td>{{ Auth::user()->switch }}</td>--}}
{{--        --}}{{--                                                <td>{{ Auth::user()->teleport }}</td>--}}
{{--        --}}{{--                                                <td>{{ Auth::user()->push }}</td>--}}
{{--        --}}{{--                                            </tr>--}}
{{--        --}}{{--                                        </tbody>--}}
{{--        --}}{{--                                    </table>--}}
{{--        --}}{{--                                    <p class="card-text">Switch - {{ Auth::user()->switch }}</p>--}}
{{--        --}}{{--                                    <p class="card-text">Teleport - {{ Auth::user()->teleport }}</p>--}}
{{--        --}}{{--                                    <p class="card-text">Push - {{ Auth::user()->push }}</p>--}}
{{--        --}}{{--                                    <a class="btn btn-primary" href="{{ route('logout') }}"--}}
{{--        --}}{{--                                       onclick="event.preventDefault();--}}
{{--        --}}{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--        --}}{{--                                        {{ __('Logout') }}--}}
{{--        --}}{{--                                    </a>--}}
{{--        --}}{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--        --}}{{--                                        @csrf--}}
{{--        --}}{{--                                    </form>--}}
{{--        --}}{{--                                </div>--}}
{{--        --}}{{--                            </div>--}}
{{--        --}}{{--                        </div>--}}
{{--        --}}{{--                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--        --}}{{--                            {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--        --}}{{--                        </a>--}}
{{--        --}}{{--                    @endguest--}}
{{--        --}}{{--                </div>--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--            <div class="col-md-4 col-12">--}}
{{--        --}}{{--                <div class="shadow p-3 mb-5 bg-white rounded">--}}
{{--        --}}{{--                    <div class="card">--}}
{{--        --}}{{--                        <div class="card-body">--}}
{{--        --}}{{--                            <form method="POST" action="{{ route('play') }}">--}}
{{--        --}}{{--                                @csrf--}}
{{--        --}}{{--                                <div class="form-group">--}}
{{--        --}}{{--                                    <label for="nickname" class="text-md-right">{{ __('Nickname') }}</label>--}}
{{--        --}}{{--                                    @guest--}}
{{--        --}}{{--                                        <input id="nickname" type="text" class="form-control" name="nickname" autofocus>--}}
{{--        --}}{{--                                    @else--}}
{{--        --}}{{--                                        <input id="nickname" type="text" class="form-control" name="nickname" disabled value="{{ Auth::user()->name }}">--}}
{{--        --}}{{--                                    @endguest--}}
{{--        --}}{{--                                </div>--}}
{{--        --}}{{--                                <div class="form-group mb-0">--}}
{{--        --}}{{--                                    <button type="submit" class="btn btn-primary w-100" id="playBtn">--}}
{{--        --}}{{--                                        {{ __('Play') }}--}}
{{--        --}}{{--                                    </button>--}}
{{--        --}}{{--                                </div>--}}
{{--        --}}{{--                            </form>--}}
{{--        --}}{{--                        </div>--}}
{{--        --}}{{--                    </div>--}}
{{--        --}}{{--                </div>--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--            <div class="col-md-4 col-12">--}}
{{--        --}}{{--                <div class="shadow p-3 mb-5 bg-white rounded">--}}
{{--        --}}{{--                    <div class="card">--}}
{{--        --}}{{--                        <div class="card-body">--}}
{{--        --}}{{--                            <a class="btn btn-primary" href="{{route('shop')}}">Shop</a>--}}
{{--        --}}{{--                        </div>--}}
{{--        --}}{{--                    </div>--}}
{{--        --}}{{--                </div>--}}
{{--        --}}{{--                <div class="shadow p-3 mb-5 bg-white rounded">--}}
{{--        --}}{{--                    <div class="card">--}}
{{--        --}}{{--                        <div class="card-body">--}}
{{--        --}}{{--                            <a class="btn btn-primary" href="{{route('get-coin')}}">Coin</a>--}}
{{--        --}}{{--                        </div>--}}
{{--        --}}{{--                    </div>--}}
{{--        --}}{{--                </div>--}}
{{--    </div>--}}
{{--</div>--}}
