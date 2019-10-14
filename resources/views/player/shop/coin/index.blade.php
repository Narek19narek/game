@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 pt-4" id="coin">
        <div class="menu-buttons row justify-content-between">
            <div class="col-auto back-btn">
                <a href="{{ route('home') }}" class="btn p-0" id="back_btn"><i class="fas fa-angle-left"></i></a>
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
                    <div class="col-md-12" id="coin_page">
                        <div class="row justify-content-center your-coins">
                            <div class="col-12 d-flex justify-content-center p-0">
                                <div class="position-relative">
                                    <p class="coin-count">{{ Auth::user()->coins }}</p>
                                    <img src="{{ asset("images/coins/coin.svg") }}" alt="Coin" class="img-fluid">
                                </div>
                            </div>
                            <p class="text-center">YOUR COINS</p>
                        </div>
                        <div class="formContent row overflow-hidden">
                            @foreach( $coins as $index => $coin )
                                <div class="align-self-center h-100 d-flex" data-id="{{ $coin->id }}" data-coin="{{ $coin->coin }}" data-price="{{ $coin->price }}">
                                    <img src="{{ asset("images/coins/".$coin->coin."-coin.svg") }}" alt="Coin" class="w-100">
                                </div>
                            @endforeach
                        </div>
                        <div class="row justify-content-center form-btn">
                            <p class="m-0">{{ __('COINS') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-12" id="payment_page">
                        <div class="row justify-content-center your-coins">
                            <div class="col-12 d-flex justify-content-center p-0">
                                <div class="position-relative">
                                    <p class="coin-count"></p>
                                    <img src="{{ asset("images/coins/coin.svg") }}" alt="Coin" class="img-fluid w-100" width="150">
                                </div>
                            </div>
                            <p class="text-center"></p>
                        </div>
                        <div class="formContent row justify-content-center">
                            <div class="col-12">
                                <p class="text-center pt-4">Please choose a payment method</p>
                            </div>
                            <div class="col-auto">
                                <button onclick="stripePayment()" class="btn btn-icon payment stripeBtn">
                                    <i class="fab fa-cc-stripe"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-icon payment paypalBtn" id="paypal-button"></button>
                            </div>
{{--                            <div class="col-auto">--}}
{{--                                <button class="btn btn-icon payment bitcoinBtn">--}}
{{--                                    <i class="fab fa-btc"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
                        </div>
                        <div class="row justify-content-center form-btn">
                            <p class="m-0">{{ __('COINS') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')

        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
            $('div[data-id]').on('click', function () {
                const coin = $(this).data('coin');
                const price = $(this).data('price');

                $('#payment_page .your-coins>p').text('$' + price);
                const paymentCoins =  $('#payment_page p.coin-count');
                paymentCoins.text(coin);
                if (paymentCoins.text().length > 5) {
                    paymentCoins.css('font-size', '35px');
                }
                $('#coin_page').hide();
                $('#payment_page').show();
                $('#back_btn').on('click', function () {
                    event.preventDefault();
                    $('#payment_page').hide();
                    $('#coin_page').show();
                    $('#back_btn').unbind('click');
                })
            })
        </script>
        <script>
            paypal.Button.render({
                // Configure environment
                env: 'sandbox',
                client: {
                    sandbox: 'demo_sandbox_client_id',
                    production: 'demo_production_client_id'
                },
                // Customize button (optional)
                locale: 'en_US',
                style: {
                    size: 'small',
                    color: 'gold',
                    shape: 'pill',
                },

                // Enable Pay Now checkout flow (optional)
                commit: true,

                // Set up a payment
                payment: function (data, actions) {
                    return actions.payment.create({
                        transactions: [{
                            amount: {
                                total: '0.01',
                                currency: 'USD'
                            }
                        }]
                    });
                },
                // Execute the payment
                onAuthorize: function (data, actions) {
                    return actions.payment.execute().then(function () {
                        // Show a confirmation message to the buyer
                        window.alert('Thank you for your purchase!');
                    });
                }
            }, '#paypal-button');

        </script>
        <script src="https://js.stripe.com/v3/"></script>
        <script type="text/javascript">
            let COIN_ID;
            $('div[data-id]').on('click', function () {
                COIN_ID = $(this).data('id');
            });
            function stripePayment() {
                console.log(COIN_ID);
                if (!COIN_ID) return false;
                $.ajax({
                    method: 'get',
                    url: `/payment/${COIN_ID}`,
                    success: (data) => {
                        if (data) {
                            const stripe = Stripe('pk_test_imFlmPN9PjHUlOz4pI35Pdq300ywJX7Les');
                            stripe.redirectToCheckout({
                                // Make the id field from the Checkout Session creation API response
                                // available to this file, so you can provide it as parameter here
                                // instead of the placeholder.
                                sessionId: data
                            }).then(function (result) {
                                // If `redirectToCheckout` fails due to a browser or network
                                // error, display the localized error message to your customer
                                // using `result.error.message`.
                            });
                        }
                    },
                    error: (err) => {
                        console.log(err)
                    }
                })
            }
        </script>
    @endpush

@endsection
