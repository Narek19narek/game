@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 pt-4" id="boosts">
        <div class="menu-buttons row justify-content-between">
            <div class="col-auto back-btn">
                <a href="{{ route('home') }}" class="btn p-0"><i class="fas fa-angle-left"></i></a>
            </div>
            <div class="col-auto logo text-center">
                <a href="{{ route('home') }}" class="c-pointer">
                    <img src="{{ asset("images/menu/logo.svg") }}" alt="logo image">
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                            <ol class="row carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active col-3 order-1">
                                    <img src="{{ asset('images/boosts/switch.png') }}" alt="Switches">
                                    <p>Switches</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="1" class="col-3 order-3">
                                    <img src="{{ asset('images/boosts/push.png') }}" alt="Push players">
                                    <p>Push players</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="2" class="col-3 order-5">
                                    <img src="{{ asset('images/boosts/teleport.png') }}" alt="Teleport">
                                    <p>Teleport</p>
                                </li>
                                <li class="col-1 p-0 dot order-2"></li>
                                <li class="col-1 p-0 dot order-4"></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach($boosts as $index => $boost)
                                    <div class="carousel-item @if($index === 'switch'){{ 'active' }}@endif" data-name="{{$index}}">
                                        <div class="formContent row">
                                            <div class="col-12 position-relative h-100 show_boost"
                                                 style="display: flex">
                                                <div class="boost-element">
                                                    <img src="{{ asset('images/boosts/boost-element.svg') }}" alt="">
                                                </div>
                                                <div
                                                    class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                                    <div>
                                                        <p class="m-0 text-capitalize">{{$index }}@if($index === "switch"){{'es'}}@else{{'s'}}@endif</p>
                                                        <p class="m-0">(Extra)</p>
                                                    </div>
                                                    <div class="boosts-amount-slider swiper-container">
                                                        <div class="swiper-wrapper">
                                                            @foreach($boost->groupBy('duration')->first() as $item)
                                                                <div class="swiper-slide"
                                                                     data-boost="{{ $item->amount }}">{{ $item->amount }}</div>
                                                            @endforeach
                                                        </div>
                                                        <div class="swiper-button-prev">
                                                            <i class="fas fa-caret-up"></i>
                                                        </div>
                                                        <div class="swiper-button-next">
                                                            <i class="fas fa-caret-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content boosts-time">
                                                    <div>
                                                        <p class="m-0">Duration</p>
                                                        <p class="m-0">(Hours)</p>
                                                    </div>
                                                    <div class="boosts-time-slider swiper-container">
                                                        <div class="swiper-wrapper">
                                                            @foreach($boost->groupBy('amount')->first() as $item)
                                                                <div class="swiper-slide"
                                                                     data-time="{{ $item->duration }}">{{ $item->duration }}</div>
                                                            @endforeach
                                                        </div>
                                                        <div class="swiper-button-prev">
                                                            <i class="fas fa-caret-up"></i>
                                                        </div>
                                                        <div class="swiper-button-next">
                                                            <i class="fas fa-caret-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 pl-0 position-relative d-flex align-items-center h-100 switches-content boosts-coins">
                                                    <div>
                                                        <p class="m-0 ">Coins</p>
                                                    </div>
                                                    <div class="boosts-coins-slider swiper-container mx-3">
                                                        <div class="swiper-wrapper">
                                                            @foreach($boost as $item)
                                                                <div class="swiper-slide"
                                                                     data-coins="{{ $item->coin }}">
                                                                    <img src="{{ asset('images/coins/coin.svg') }}"
                                                                         alt="Coins" width="84">
                                                                    <p class="switch_coins"
                                                                       @if($item->coin > 9999) style="font-size: 24px"@endif>
                                                                        {{ $item->coin }}</p>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="m-0 get_boosts">BUY</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex align-items-center get_success">
                                                <div class="position-relative w-25 pl-4">
                                                    <img src="{{ asset('images/boosts/'.$index.'.png') }}"
                                                         alt="Switches" class="img-fluid" width="150">
                                                </div>
                                                <div class="col">
                                                    <h1 class="text-center"></h1>
                                                    <p class="text-center"></p>
                                                </div>
                                                <button type="button" class="btn close-btn" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev carousel-icon" href="#carousel" role="button"
                               data-slide="prev">
                                <i class="fas fa-caret-left"></i>
                            </a>
                            <a class="carousel-control-next carousel-icon" href="#carousel" role="button"
                               data-slide="next">
                                <i class="fas fa-caret-right"></i>
                            </a>
                        </div>

                        <div class="row justify-content-center form-btn">
                            <p>{{ __('BOOSTS') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        const coinsArr = ['31', '33', '324', '101', '103', '1024', '251', '253', '2524', '1001', '1003', '10024'];
        const slider = new Slider();

        function swiperSlider() {
            slider.initBoostAmountSlider(".boosts-amount-slider", 2, changeCoins);
            slider.initBoostAmountSlider(".active .boosts-time-slider", 1, changeCoins);
            slider.initBoostCoinSlider(".active .boosts-coins-slider", 7);
        }

        swiperSlider();

        $('#carousel').on('slid.bs.carousel', function () {
            swiperSlider();
            slider.boost_slider.update();
        });

        function changeCoins() {
            const boost = $('.active .boosts-amount-slider .swiper-slide-active').data('boost');
            const time = $('.active .boosts-time-slider .swiper-slide-active').data('time');
            const k = coinsArr.indexOf(boost + '' + time);
            if (slider.coins_slider) {
                slider.coins_slider.slideTo(k, 800, false)
            }
        }

        $(document).ready(function () {
            $('.get_boosts').on('click', function () {
                const name = $('.carousel-item.active').data('name');
                const coin = $('.active .boosts-coins-slider .swiper-slide-active').data('coins');
                const duration = $('.active .boosts-time-slider .swiper-slide-active').data('time');
                const amount = $('.active .boosts-amount-slider .swiper-slide-active').data('boost');
                $.ajax({
                    method: 'post',
                    url: `/get-boosts/switches`,
                    data: {
                        "_token": "{{csrf_token()}}",
                        name,
                        coin,
                        duration,
                        amount
                    },
                    success: (data) => {
                        $('.active .show_boost').fadeOut(200);
                        let str = '';
                        let link = '';
                        if (data.title === 'Oops') {
                            str = data.message.split(' ');
                            str.pop();
                            str = str.join(' ');
                            link = `<a href="{{ route('get-coin') }}">store</a>`;
                        } else {
                            str = data.message;
                        }
                        $('.active .get_success').find('h1').text(data.title).siblings().text(str + ' ').append(link);
                        $('.close-btn').on('click', function (e) {
                            $('.active .get_success').fadeOut(200);
                            $('.active .show_boost').fadeIn(300);
                        })
                    },
                    error: (err) => {
                        console.log(err);
                    }
                });
                // console.log(coin, duration, amount)
            });
        })
    </script>
@endsection
