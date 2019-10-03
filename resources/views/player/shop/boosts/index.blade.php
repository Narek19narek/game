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
                                <div class="carousel-item active">
                                    <div class="formContent row justify-content-around">
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Switches</p>
                                                <p class="m-0">(Extra)</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Duration</p>
                                                <p class="m-0">(Hours)</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Coins</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="m-0 bg-danger">buy</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center transactions">
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Push</p>
                                                <p class="m-0">(Extra)</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Duration</p>
                                                <p class="m-0">(Hours)</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Coins</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="m-0 bg-danger">buy</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="formContent row justify-content-center">
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Teleport</p>
                                                <p class="m-0">(Extra)</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Duration</p>
                                                <p class="m-0">(Hours)</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 position-relative d-flex align-items-center h-100 overflow-hidden switches-content">
                                            <div>
                                                <p class="m-0">Coins</p>
                                            </div>
                                            <div class="boosts-count-slider h-100 px-3 position-relative">
                                                <div class="boosts-count h-100">
                                                    <div>3</div>
                                                    <div>10</div>
                                                    <div>25</div>
                                                    <div>100</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="h-100 slideBtn">
                                                    <div class="nextBtn">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                    <div class="prevBtn">
                                                        <i class="fas fa-caret-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="m-0 bg-danger">buy</p>
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
                            <p>{{ __('BOOSTS') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            const slider = new Slider();
            slider.initBoostsAmountSlider(".boosts-amount-slider")
        });

    </script>
@endsection
