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
                                <li data-target="#carousel" data-slide-to="0"
                                    class="@if(user_is_selected('colors')) active @endif col-3 order-1">
                                    <img src="{{ asset('images/skins/color-1.svg') }}" alt="Colors">
                                    <p>Colors</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="1"
                                    class="@if(user_is_selected('masks')) active @endif  col-3 order-3">
                                    <img src="{{ asset('images/skins/mask.png') }}" alt="Masks">
                                    <p>Masks</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="2"
                                    class="@if(user_is_selected('flags')) active @endif col-3 order-5">
                                    <img src="{{ asset('images/skins/flag.png') }}" alt="Flags">
                                    <p>Flags</p>
                                </li>
                                <li data-target="#carousel" data-slide-to="3"
                                    class="@if(user_is_selected('other')) active @endif col-3 order-7">
                                    <img src="{{ asset('images/skins/other.png') }}" alt="Other">
                                    <p>Other</p>
                                </li>
                                <li class="col-1 p-0 dot order-2"></li>
                                <li class="col-1 p-0 dot order-4"></li>
                                <li class="col-1 p-0 dot order-6"></li>
                            </ol>
                            @php
                                $_index = 0;
                            @endphp
                            <div class="carousel-inner">
                                <div class="carousel-item @if(user_is_selected('colors')) active @endif">
                                    <div class="formContent row justify-content-around">
                                        <div class="row skin-slider swiper-container select_skin" id="select_skin">
                                            <div class="swiper-wrapper d-flex">
                                                @if($_skins = $skins[get_skin_type('colors')]??null)
                                                    @foreach($_skins as $index => $skin)
                                                        @php
                                                            $_index = user_is_selected_skin($skin->id) ?$index : $_index;
                                                        @endphp
                                                        <div
                                                            class="swiper-slide d-flex align-items-center bg-transparent">
                                                            <label for="color_{{$skin->id}}" class="c-pointer m-0">
                                                                @if(in_array($skin->id, $arrSkins, true))
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100"
                                                                         height="100" viewBox="0 0 175 175">
                                                                        <g id="Path_104" data-name="Path 104"
                                                                           fill="none">
                                                                            <path
                                                                                d="M87.5,0A87.5,87.5,0,1,1,0,87.5,87.5,87.5,0,0,1,87.5,0Z"
                                                                                stroke="none"/>
                                                                            <path
                                                                                d="M 87.50009155273438 11 C 45.31779479980469 11 10.99998474121094 45.31776428222656 10.99998474121094 87.5 C 10.99998474121094 129.6822357177734 45.31779479980469 164 87.50009155273438 164 C 129.6823883056641 164 164.0001983642578 129.6822357177734 164.0001983642578 87.5 C 164.0001983642578 45.31776428222656 129.6823883056641 11 87.50009155273438 11 M 87.50009155273438 0 C 135.8250579833984 0 175.0001983642578 39.17509460449219 175.0001983642578 87.5 C 175.0001983642578 135.8249053955078 135.8250579833984 175 87.50009155273438 175 C 39.17512512207031 175 -1.52587890625e-05 135.8249053955078 -1.52587890625e-05 87.5 C -1.52587890625e-05 39.17509460449219 39.17512512207031 0 87.50009155273438 0 Z"
                                                                                stroke="none" fill="{{$skin->color}}"/>
                                                                        </g>
                                                                    </svg>
                                                                @else

                                                                    <div class="getSkin">
                                                                        <div class="position-relative">
                                                                            <i class="fas fa-lock"></i>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="100" height="100"
                                                                                 viewBox="0 0 175 175">
                                                                                <g id="Path_104" data-name="Path 104"
                                                                                   fill="none">
                                                                                    <path
                                                                                        d="M87.5,0A87.5,87.5,0,1,1,0,87.5,87.5,87.5,0,0,1,87.5,0Z"
                                                                                        stroke="none"/>
                                                                                    <path
                                                                                        d="M 87.50009155273438 11 C 45.31779479980469 11 10.99998474121094 45.31776428222656 10.99998474121094 87.5 C 10.99998474121094 129.6822357177734 45.31779479980469 164 87.50009155273438 164 C 129.6823883056641 164 164.0001983642578 129.6822357177734 164.0001983642578 87.5 C 164.0001983642578 45.31776428222656 129.6823883056641 11 87.50009155273438 11 M 87.50009155273438 0 C 135.8250579833984 0 175.0001983642578 39.17509460449219 175.0001983642578 87.5 C 175.0001983642578 135.8249053955078 135.8250579833984 175 87.50009155273438 175 C 39.17512512207031 175 -1.52587890625e-05 135.8249053955078 -1.52587890625e-05 87.5 C -1.52587890625e-05 39.17509460449219 39.17512512207031 0 87.50009155273438 0 Z"
                                                                                        stroke="none"
                                                                                        fill="{{$skin->color}}"/>
                                                                                </g>
                                                                            </svg>
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
                                                            <input type="radio" hidden value="{{$skin->id}}"
                                                                   name="color"
                                                                   id="color_{{$skin->id}}"
                                                                   data-skin-color="{{$skin->color}}"
                                                                   @if(\Auth::user() && Auth::user()->skeen_id === $skin->id) checked @endif>

                                                            @if(\Auth::user() && Auth::user()->skeen_id === $skin->id)
                                                                <i class="fas fa-check" id="check"></i>

                                                            @endif

                                                        </div>

                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-12 d-flex align-items-center get_success" id="get_success">
                                            <div class="position-relative w-25 pl-4" id="add_svg">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     width="100" height="100"
                                                     viewBox="0 0 175 175">
                                                    <g id="Path_104" data-name="Path 104"
                                                       fill="none">
                                                        <path
                                                            d="M87.5,0A87.5,87.5,0,1,1,0,87.5,87.5,87.5,0,0,1,87.5,0Z"
                                                            stroke="none"/>
                                                        <path
                                                            d="M 87.50009155273438 11 C 45.31779479980469 11 10.99998474121094 45.31776428222656 10.99998474121094 87.5 C 10.99998474121094 129.6822357177734 45.31779479980469 164 87.50009155273438 164 C 129.6823883056641 164 164.0001983642578 129.6822357177734 164.0001983642578 87.5 C 164.0001983642578 45.31776428222656 129.6823883056641 11 87.50009155273438 11 M 87.50009155273438 0 C 135.8250579833984 0 175.0001983642578 39.17509460449219 175.0001983642578 87.5 C 175.0001983642578 135.8249053955078 135.8250579833984 175 87.50009155273438 175 C 39.17512512207031 175 -1.52587890625e-05 135.8249053955078 -1.52587890625e-05 87.5 C -1.52587890625e-05 39.17509460449219 39.17512512207031 0 87.50009155273438 0 Z"
                                                            stroke="none"
                                                            id="skin_svg_fill"
                                                            fill=""/>
                                                    </g>
                                                </svg>
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
                                @foreach($typesValues as $typeValue)
                                    @continue($typeValue==get_skin_type('colors'))

                                    <div class="carousel-item @if(user_is_selected($typeValue)) active @endif">
                                        <div class="formContent row justify-content-around">
                                            <div class="row skin-image skin-slider swiper-container select_skin"
                                                 id="select_skin">
                                                <div class="swiper-wrapper d-flex">
                                                    @if($_skins = $skins[$typeValue]??null)
                                                        @foreach($_skins as $index => $skin)
                                                            @php
                                                                $_index = user_is_selected_skin($skin->id) ? $index : $_index;
                                                            @endphp
                                                            <div
                                                                class="swiper-slide d-flex align-items-center bg-transparent">
                                                                <label for="color_{{$skin->id}}" class="c-pointer m-0">
                                                                    @if(in_array($skin->id, $arrSkins, true))
                                                                        <img src="{{$skin->imageUrl}}"
                                                                             class="skin-image" height="100"
                                                                             width="100">
                                                                    @else

                                                                        <div class="getSkin">
                                                                            <div class="position-relative">
                                                                                <i class="fas fa-lock"></i>
                                                                                <img src="{{$skin->imageUrl}}"
                                                                                     class="skin-image" height="100"
                                                                                     width="100">
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
                                                                <input type="radio" hidden value="{{$skin->id}}"
                                                                       name="color"
                                                                       id="color_{{$skin->id}}"
                                                                       data-skin-image="{{$skin->imageUrl}}"
                                                                       @if(\Auth::user() && Auth::user()->skeen_id === $skin->id) checked @endif>

                                                                @if(\Auth::user() && Auth::user()->skeen_id === $skin->id)
                                                                    <i class="fas fa-check" id="check"></i>

                                                                @endif

                                                            </div>

                                                        @endforeach
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-12 d-flex align-items-center get_success" id="get_success">
                                                <div class="position-relative w-25 pl-4">
                                                    <img src="" alt="Skin" class="img-fluid " width="150">
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
            $('.select_skin input').on('change', function (e) {
                const color = $(this).data('skin-color');
                const image = $(this).data('skin-image');
                const id = $(this).val();
                if ($(this).parent().hasClass('swiper-slide-active')) {
                    $.ajax({
                        method: 'post',
                        url: '/get-skin/' + id,
                        data: {"_token": "{{csrf_token()}}"},
                        success: function (data) {
                            if (data.status === 1) {
                                $('.fas.fa-check').remove();
                                $('input[value="' + id + '"]').parent().append('<i class="fas fa-check" id="check"></i>');
                            } else {
                               let activeSlide =  $('.active .skin-slider');
                               activeSlide.fadeOut(200);
                                // const url = "images/skins/color-" + data.id + ".svg";
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
                                let get_success =  $('.carousel-item.active .get_success')
                                get_success.find('#skin_svg_fill').attr('fill', color).end().find('h1').text(data.title).siblings().text(str + ' ').append(link);
                                get_success.find('.img-fluid').attr('src', image).end().find('h1').text(data.title).siblings().text(str + ' ').append(link);
                                if (data.status === 2) {
                                    checkedInputs[0] = id;
                                    $('.select_skin input[value="' + checkedInputs[0] + '"]').siblings().find('.fas.fa-lock').remove().end().find('.img').remove();
                                    $('.close-btn').on('click', function (e) {

                                        $('.carousel-item.active .select_skin input[value="' + checkedInputs[0] + '"]').prop('checked', true).parent().append('<i class="fas fa-check" id="check"></i>');
                                        get_success.fadeOut(200);
                                        activeSlide.fadeIn(300);
                                    });
                                } else {
                                    $('.close-btn').on('click', function (e) {
                                        $('.carousel-item.active .select_skin input[value="' + checkedInputs[0] + '"]').prop('checked', true).parent().append('<i class="fas fa-check" id="check"></i>');
                                        get_success.fadeOut(200);
                                        activeSlide.fadeIn(300);
                                    });
                                }

                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                } else {
                    e.stopPropagation();
                }
            });
        });
        const slider = new Slider();
        slider.initSkinSlider(".carousel-item.active .skin-slider", {{$_index}});

        $('#carousel').on('slid.bs.carousel',  function (e) {
            slider.initSkinSlider('.carousel-item.active .skin-slider');
        });
    </script>
@endpush
