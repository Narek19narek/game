@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 pt-4" id="skin">
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
                        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                            <ol class="row carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active col-3 order-1">
                                    <img src="{{ asset('images/skins/color-1.svg') }}" alt="Colors">
                                    <p>Colors</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="1" class="col-3 order-3">
                                    <img src="{{ asset('images/skins/mask.png') }}" alt="Masks">
                                    <p>Masks</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="2" class="col-3 order-5">
                                    <img src="{{ asset('images/skins/flag.png') }}" alt="Flags">
                                    <p>Flags</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="3" class="col-3 order-7">
                                    <img src="{{ asset('images/skins/other.png') }}" alt="Other">
                                    <p>Other</p>
                                </li>
                                <li class="col-1 p-0 dot order-2"></li>
                                <li class="col-1 p-0 dot order-4"></li>
                                <li class="col-1 p-0 dot order-6"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="formContent row justify-content-around">
                                        <div class="row skin-slider swiper-container" id="select_skin">
                                            <div class="swiper-wrapper d-flex">

                                                @foreach($skins as $skin)

                                                    <div class="swiper-slide d-flex align-items-center bg-transparent">
                                                        <label for="color_{{$skin->id}}" class="c-pointer m-0">
                                                            @if(in_array($skin->id, $arrSkins, true))
                                                                <img
                                                                    src="{{ asset('images/skins/color-'.$skin->id.'.svg') }}"
                                                                    alt="Colors">
                                                            @else

                                                                <div class="getSkin">
                                                                    <div class="position-relative">
                                                                        <i class="fas fa-lock"></i>
                                                                        <img
                                                                            src="{{ asset('images/skins/color-'.$skin->id.'.svg') }}"
                                                                            alt="Colors">
                                                                    </div>
                                                                    <div class="img">
                                                                        <img
                                                                            src="{{ asset('images/skins/get-skin-bg.svg') }}"
                                                                            alt="Get SKin" height="135">
                                                                        <div class="coin-count">
                                                                            <img
                                                                                src="{{ asset('images/coins/coin.svg') }}"
                                                                                alt="Coin" width="70">
                                                                            <h1>BUY</h1>
                                                                            <span>{{ $skin->coin }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endif

                                                        </label>
                                                        <input type="radio" hidden value="{{$skin->id}}" name="color"
                                                               id="color_{{$skin->id}}"
                                                               @if(\Auth::user() && Auth::user()->skeen_id === $skin->id) checked @endif>

                                                        @if(\Auth::user() && Auth::user()->skeen_id === $skin->id)
                                                            <i class="fas fa-check" id="check"></i>

                                                        @endif

                                                    </div>

                                                @endforeach

                                            </div>

                                        </div>
                                        <div class="col-12 d-flex align-items-center " id="get_success">
                                            <div class="position-relative w-25 pl-4">
                                                <img src="" alt="Skin" class="img-fluid" width="150">
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
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center align-items-center">
                                        <h1 class="text-center">COMING SOON</h1>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center align-items-center">
                                        <h1 class="text-center">COMING SOON</h1>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center align-items-center">
                                        <h1 class="text-center">COMING SOON</h1>
                                    </div>
                                </div>
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
                            <p>{{ __('SKINS') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.swiper-slide:not(.swiper-slide-active)', function (e) {
                e.preventDefault();
            });
            const checkedInputs = [];
            checkedInputs[0] = $('input:checked').val();
            $('#select_skin input').on('change', function (e) {
                const id = $(this).val();
                if ($(this).parent().hasClass('swiper-slide-active')) {
                    $('.fas.fa-check').remove();
                    $.ajax({
                        method: 'post',
                        url: '/get-skin/'+ id,
                        data: {"_token": "{{csrf_token()}}"},
                        success: function(data) {
                            if (data.status === 1) {
                                $('#select_skin input[value="' + id + '"]').parent().append('<i class="fas fa-check" id="check"></i>');
                            } else {
                                $('#select_skin').fadeOut(200);
                                const url = "images/skins/color-" + data.id + ".svg";
                                let str = '';
                                let link = '';
                                if (data.title === 'Oops') {
                                    str = data.message.split(' ');
                                    str.pop();
                                    str = str.join(' ');
                                    link = '<a href="{{ route('get-coin') }}">store</a>';
                                } else {
                                    str = data.message;
                                }
                                $('#get_success').find('img').attr('src', '{{ asset('/')  }}' + url).parent().parent().find('h1').text(data.title).siblings().text(str + ' ').append(link);
                                if (data.status === 2) {
                                    checkedInputs[0] = id;
                                    $('#select_skin input[value="' + checkedInputs[0] + '"]').siblings().find('.fas.fa-lock').remove().end().find('.img').remove();
                                    $('.close-btn').on('click', function (e) {
                                        $('#select_skin input[value="' + checkedInputs[0] + '"]').prop('checked', true).parent().append('<i class="fas fa-check" id="check"></i>');
                                        $('#get_success').fadeOut(200);
                                        $('#select_skin').fadeIn(300);
                                    });
                                } else {
                                    $('.close-btn').on('click', function (e) {
                                        $('#select_skin input[value="' + checkedInputs[0] + '"]').prop('checked', true).parent().append('<i class="fas fa-check" id="check"></i>');
                                        $('#get_success').fadeOut(200);
                                        $('#select_skin').fadeIn(300);
                                    });
                                }

                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else {
                    e.stopPropagation();
                }
            });
        });
        const slider = new Slider();
        slider.initSkinSlider(".skin-slider");
    </script>
@endpush
