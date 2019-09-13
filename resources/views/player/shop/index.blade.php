@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-12">
                <h3 class="bg-danger">Skins</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shopSkins">
                    Buy
                </button>
                <div class="modal fade" id="shopSkins" tabindex="-1" role="dialog" aria-labelledby="shopSkinsLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center">
                                <h5 class="modal-title position-absolute" id="shopSkinsLabel">Skins</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Coins</th>
                                        <th>Price</th>
                                        <th>Buy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coins as $index => $coin)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $coin->coin }}</td>
                                            <td>{{ $coin->price }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('coins.edit', ['id' => $coin->id]) }}" class="btn btn-info"><i class="fa fa-cart-arrow-down"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <h3 class="bg-danger">Boosts</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shopBoosts">
                    Buy
                </button>
                <div class="modal fade" id="shopBoosts" tabindex="-1" role="dialog" aria-labelledby="shopBoostsLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center">
                                <h5 class="modal-title position-absolute" id="shopBoostsLabel">Boosts</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Boosts type</th>
                                        <th>Amount</th>
                                        <th>Duration</th>
                                        <th>Coin</th>
                                        <th>Buy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($boosts as $index => $boost)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $boost->name }}</td>
                                            <td>{{ $boost->amount }}</td>
                                            <td>{{ $boost->duration }}</td>
                                            <td>{{ $boost->coin }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('boosts.edit', ['id' => $boost->id]) }}" class="btn btn-info"><i class="fa fa-cart-arrow-down"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <h3 class="bg-danger">Coins</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shopCoins">
                    Buy
                </button>
                <div class="modal fade" id="shopCoins" tabindex="-1" role="dialog" aria-labelledby="shopCoinsLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center">
                                <h5 class="modal-title position-absolute" id="shopCoinsLabel">Coins</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Coins</th>
                                        <th>Price</th>
                                        <th>Buy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coins as $index => $coin)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $coin->coin }}</td>
                                            <td>{{ $coin->price }}</td>
                                            <td class="d-flex justify-content-center">
                                                <button onclick="getStripeSessionId(event)" data-id=" {{$coin->id}} " class="btn btn-info"><i class="fa fa-cart-arrow-down"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
