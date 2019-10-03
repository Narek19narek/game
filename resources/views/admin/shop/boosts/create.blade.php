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
                    <select class="custom-select" name="amount" id="amount">
                        <option></option>
                        <option value="3">3</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="form-group @error('duration') has-error @enderror">
                    <label for="duration">Duration</label>
                    <select class="custom-select" name="duration" id="duration">
                        <option></option>
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="24">24</option>
                    </select>
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
