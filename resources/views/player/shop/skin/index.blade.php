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
                                                        <label for="color_{{$skin->id}}">
                                                            <img src="{{ asset('images/skins/color-'.$skin->id.'.svg') }}" alt="Colors">
{{--                                                            @foreach($user_skins as $userSkin)--}}
{{--                                                                @if($userSkin->id !== $skin->id)--}}
{{--                                                                    <div class="getSkin">--}}
{{--                                                                        <div class="position-relative">--}}
{{--                                                                            <i class="fas fa-lock"></i>--}}
{{--                                                                            <img src="{{ asset('images/skins/color-'.$skin->id.'.svg') }}" alt="Colors">--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="img">--}}
{{--                                                                            <img src="{{ asset('images/skins/get-skin-bg.svg') }}" alt="Get SKin" width="165">--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                @else <img src="{{ asset('images/skins/color-'.$skin->id.'.svg') }}" alt="Colors">--}}
{{--                                                                @endif--}}
{{--                                                            @endforeach--}}
                                                        </label>
                                                        <input type="radio" hidden value="{{$skin->id}}" name="color" id="color_{{$skin->id}}" @if(\Auth::user() && Auth::user()->skeen_id === $skin->id) checked @endif>
                                                        @if(\Auth::user() && Auth::user()->skeen_id === $skin->id)
                                                            <i class="fas fa-check" id="check"></i>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center transactions">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center">

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
            $('#select_skin input').on('change', function () {
                const id = $(this).val();
                $('.fas.fa-check').remove();
                $.ajax({
                    method: 'post',
                    url: `/get-skin/${id}`,
                    data: {"_token": "{{csrf_token()}}"},
                    success: (data) => {
                        $('#select_skin input[value="' + data.id + '"]').parent().append('<i class="fas fa-check" id="check"></i>');
                    },
                    error: (err) => {
                        console.log(err);
                    }
                });
            });
        });
        const slider = new Slider();
        slider.initSkinSlider(".skin-slider");
    </script>
@endpush
