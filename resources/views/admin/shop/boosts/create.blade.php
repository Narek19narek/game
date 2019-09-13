@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Boost</h2>
    <div class="row">
        <div class="col-4 m-auto">
            <form action="{{ route('boosts.store') }}" method="post">
                @csrf
                <div class="form-group @error('boosts') has-error @enderror">
                    <label for="boosts_name">Boosts type</label>
                    <select class="custom-select" name="name" id="boosts_name">
                        <option></option>
                        <option value="switch">Switch</option>
                        <option value="teleport">Teleport</option>
                        <option value="push">Push</option>
                    </select>
                </div>
                <div class="form-group @error('amount') has-error @enderror">
                    <label for="amount">Amount</label>
                    <input class="form-control" id="amount" type="number" placeholder="Please enter boost count" name="amount" value="{{ old('amount') }}">
                    @error('amount')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group @error('duration') has-error @enderror">
                    <label for="duration">Duration</label>
                    <input class="form-control" id="duration" type="number" placeholder="Please enter boosts duration" name="duration" value="{{ old('duration') }}">
                    @error('duration')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group @error('coin') has-error @enderror">
                    <label for="coin">Coin</label>
                    <input class="form-control" id="coin" type="number" placeholder="Please enter coin" name="coin" value="{{ old('coin') }}">
                    @error('coin')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
    </div>
@endsection
