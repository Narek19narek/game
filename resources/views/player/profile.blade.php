@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 pt-4" id="profile">
        <div class="menu-buttons row justify-content-between">
            <div class="col-auto back-btn">
                <a href="{{ route('home') }}" class="btn p-0 c-pointer"><i class="fas fa-angle-left"></i></a>
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
                        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                            <ol class="row carousel-indicators mb-5">
                                <li data-target="#carousel" data-slide-to="0" class="active col-3 order-1">
                                    <img src="{{ asset('images/menu/profile-account.svg') }}" alt="Account">
                                    <p>ACCOUNT</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="1" class="col-3 order-3">
                                    <img src="{{ asset('images/menu/profile-transaction.svg') }}" alt="Account">
                                    <p>TRANSACTIONS</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="2" class="col-3 order-5">
                                    <img src="{{ asset('images/menu/profile-refer.svg') }}" alt="Account">
                                    <p>REFER A FRIEND</p>
                                </li>
                                <li class="col-1 p-0 dot order-2"></li>
                                <li class="col-1 p-0 dot order-4"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="formContent row">
                                        <div class="col-md-auto account-lvl position-relative p-0">
                                            <div class="my-4">
                                                <span class="lvl-count">{{ Auth::user()->level }}</span>
                                                <span class="lvl">LVL</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 account-info my-4">
                                            <div class="d-flex">
                                                <p class="my-0">XP: {{ $user->levelXp() }} / {{ $user->nextLevelXp() }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <p class="my-0" title="{{  $user->email }}">{{ $user->email }}</p>
                                            </div>
                                            <div class="d-flex">
{{--                                                @if (Route::has('password.request'))--}}
                                                    <a class="btn p-0" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
{{--                                                @endif--}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 notifications my-4 pr-4">
                                            <div class="row justify-content-end">
                                                <p>Notifications:</p>
                                            </div>
                                            <div>
                                                <form>
                                                    <div class="row justify-content-end">
                                                        <label for="email">Email</label>
                                                        <input type="checkbox" id="email" name="email">
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <label for="newsletter">Newsletter</label>
                                                        <input type="checkbox" id="newsletter" name="newsletter">
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <label for="br_notification">Browser Notifications</label>
                                                        <input type="checkbox" id="br_notification" name="br_notification">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center transactions">
                                        <div class="table table-borderless text-center d-block">
                                            <div class="thead">
                                                <div class="px-0">Date</div>
                                                <div class="px-1">Price</div>
                                                <div class="px-0">Coins</div>
                                                <div class="px-1">Method</div>
                                                <div class="px-0">Status</div>
                                            </div>
                                            <div class="tbody">
                                                @foreach($transactions as $transaction)
                                                    <div class="tr">
                                                        <div class="px-0 ">{{ $transaction->created_at }}</div>
                                                        <div class="px-1">${{ $transaction->coin->price }}</div>
                                                        <div class="px-0">{{ $transaction->coin->coin }}</div>
                                                        <div class="px-1 {{ strtolower($transaction->type_label) }}">
                                                            <i class="fab fa-lg fa-{{ strtolower($transaction->type_label) }}"></i>
                                                        </div>
                                                        <div class="px-0 {{ strtolower($transaction->status_label) }}">{{ $transaction->status_label }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center">
                                        <div class="col-12 account-info my-4 d-flex justify-content-center align-items-center">
                                            <h1 class="text-center">COMING SOON</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev carousel-icon" href="#carousel" role="button" data-slide="prev">
                                <i class="fas fa-caret-left"></i>
                            </a>
                            <a class="carousel-control-next carousel-icon" href="#carousel" role="button" data-slide="next">
                                <i class="fas fa-caret-right"></i>
                            </a>
                        </div>

                        <div class="row justify-content-center form-btn">
                            <p class="m-0">{{ __('PROFILE') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.()
    </script>
@endsection
