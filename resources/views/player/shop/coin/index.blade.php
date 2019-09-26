@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 py-4" id="coin">
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
                        <div class="formContent row">
                            @foreach( $coins as $index => $coin )
                                <div class="pt-4 align-self-center @if($index === 3) {{'popular'}} @elseif($index === 6) {{ 'best' }}  @endif">
                                    <div style="transform: scale({{ 1 + $index / 5 }})">
                                        @if($index === 3) <h4>MOST<br>POPULAR</h4> @elseif($index === 6) <h4>BEST DEAL</h4> @endif
                                        <div class="position-relative ">
                                            <p class="coin-count">{{ $coin->coin }}</p>
                                            <img src="{{ asset("images/menu/coin2.svg") }}" alt="Coin">
                                        </div>
                                        <p class="text-center pt-2">${{ $coin->price }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row justify-content-center form-btn mt-5">
                            <p>{{ __('COINS') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="container">--}}
{{--        <div class="col-md-4 col-12">--}}
{{--            <h3 class="bg-success py-4 text-center">Coins</h3>--}}
{{--            <table class="table">--}}
{{--                <thead class="thead-dark">--}}
{{--                <tr>--}}
{{--                    <th>#</th>--}}
{{--                    <th>Coins</th>--}}
{{--                    <th>Price</th>--}}
{{--                    <th>Buy</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($coins as $index => $coin)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $index + 1 }}</td>--}}
{{--                        <td>{{ $coin->coin }}</td>--}}
{{--                        <td>{{ $coin->price }}</td>--}}
{{--                        <td class="d-flex justify-content-center">--}}
{{--                            <button  onclick="getStripeSessionId(event)" type="button" class="btn btn-primary" data-id=" {{$coin->id}}" data-toggle="modal" data-target="#shopCoins">--}}
{{--                                <i class="fa fa-cart-arrow-down"></i>--}}
{{--                            </button>--}}
{{--                            <button onclick="getStripeSessionId(event)" data-id=" {{$coin->id}} " class="btn btn-info"></button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            <div class="modal fade" id="shopCoins" tabindex="-1" role="dialog" aria-labelledby="shopCoinsLabel" aria-hidden="true">--}}
{{--                <div class="modal-dialog modal-dialog-scrollable" role="document">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header justify-content-center">--}}
{{--                            <h5 class="modal-title position-absolute" id="shopCoinsLabel">Payment</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body d-flex justify-content-center">--}}
{{--                            <button class="btn btn-icon my-4 payment" id="paypal-button"></button>--}}
{{--                            <button onclick="stripePayment()" class="btn btn-icon my-4 payment">--}}
{{--                                <i class="fab fa-cc-stripe"></i>--}}
{{--                            </button>--}}
{{--                            <button class="btn btn-icon my-4 payment">--}}
{{--                                <i class="fab fa-bitcoin"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
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
            payment: function(data, actions) {
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
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Thank you for your purchase!');
                });
            }
        }, '#paypal-button');

    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        let COIN_ID;
        function getStripeSessionId(evt){
            COIN_ID = evt.currentTarget.dataset.id;
        }
        function stripePayment() {
            if(!COIN_ID) return false;
            $.ajax({
                method: 'get',
                url: `/payment/${COIN_ID}`,
                success: (data) => {
                    if(data) {
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
@endsection
