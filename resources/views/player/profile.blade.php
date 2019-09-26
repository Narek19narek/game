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
        <div class="row justify-content-center pt-4">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                            <ol class="row">
                                <li data-target="#carousel" data-slide-to="0" class="active col-3">
                                    <img src="{{ asset('images/menu/profile-account.png') }}" alt="Account">
                                    <p>ACCOUNT</p>
                                </li>
                                <li class="col-1 p-0 dot"></li>
                                <li data-target="#carousel" data-slide-to="1" class="col-3">
                                    <img src="{{ asset('images/menu/profile-transaction.png') }}" alt="Account">
                                    <p>TRANSACTIONS</p>
                                </li>
                                <li class="col-1 p-0 dot"></li>
                                <li data-target="#carousel" data-slide-to="2" class="col-3">
                                    <img src="{{ asset('images/menu/profile-refer.png') }}" alt="Account">
                                    <p>REFER A FRIEND</p>
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="formContent row justify-content-center">
                                        <div class="col-md-2 account-lvl position-relative">
                                            <div class="my-4">
                                                <span class="lvl-count">{{ Auth::user()->level }}</span>
                                                <span class="lvl">LVL</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 account-info my-4">
                                            <div class="d-flex">
                                                <p class="my-0">XP:</p>
                                                <p class="my-0">{{ $user->levelXp() }} / {{ $user->nextLevelXp() }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <p class="my-0" title="{{  $user->email }}">{{ $user->email }}</p>
                                            </div>
                                            <div class="d-flex">
                                                @if (Route::has('password.request'))
                                                    <a class="btn p-0" href="{{ route('password.request') }}">
                                                        {{ __('Reset pass') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 notifications my-4">
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
                                        <table class="table table-borderless text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Coins</th>
                                                    <th scope="col">Method</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td >Larry the Bird</td>
                                                    <td>@twitter</td>
                                                    <td>@twitter</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center">
                                        <div class="col-md-2 account-lvl position-relative">
                                            <div class="my-4">
                                                <span class="lvl-count">{{ Auth::user()->level }}</span>
                                                <span class="lvl">LVL</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 account-info my-4">
                                            <div class="d-flex">
                                                <p class="my-0">XP:</p>
                                                <p class="my-0">{{ $user->levelXp() }} / {{ $user->nextLevelXp() }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <p class="my-0" title="{{  $user->email }}">{{ $user->email }}</p>
                                            </div>
                                            <div class="d-flex">
                                                @if (Route::has('password.request'))
                                                    <a class="btn p-0" href="{{ route('password.request') }}">
                                                        {{ __('Reset pass') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 notifications my-4">
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
                            </div>
                            <a class="carousel-control-prev carousel-icon" href="#carousel" role="button" data-slide="prev">
                                <i class="fas fa-caret-left"></i>
                            </a>
                            <a class="carousel-control-next carousel-icon" href="#carousel" role="button" data-slide="next">
                                <i class="fas fa-caret-right"></i>
                            </a>
                        </div>

                        <div class="row justify-content-center form-btn">
                            <p>{{ __('PROFILE') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#carousel').on('click', 'ol>li', function () {
            $('ol>li.active').removeClass('active');
            $(this).addClass('active');
        });
        $('a.carousel-icon').on('click', function () {
            const active = $('ol>li.active');
            let slide = active.data('slide-to');
            console.log(slide);
            active.removeClass('active');
            if ($(this).data('slide') === 'next') {
                slide = slide === 2 ? 0 : slide + 1;
                $('[data-slide-to="' + slide + '"]').addClass('active');
            } else {
                slide = slide === 0 ? 2 : slide - 1;
                $('[data-slide-to="' + slide + '"]').addClass('active');
            }
        });
    </script>
@endsection
