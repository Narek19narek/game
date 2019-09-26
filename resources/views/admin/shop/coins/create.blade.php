@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Coin</h2>
    <div class="row">
        <div class="col-4 m-auto">
            <form action="{{ route('coins.store') }}" method="post">
                @csrf
                <div class="form-group @error('coins') has-error @enderror">
                    <label for="coins_count">Coins</label>
                    <input class="form-control" id="coins_count" type="number" placeholder="Please enter coins count" name="coins" value="{{ old('coins') }}">
                    @error('coins')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group @error('price') has-error @enderror">
                    <label for="coins_cost">Price</label>
                    <input class="form-control" id="coins_cost" type="text" placeholder="Please enter coins price" name="price" value="{{ old('price') }}">
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
    </div>
@endsection
