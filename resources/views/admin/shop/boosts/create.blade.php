@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Boost</h2>
    <div class="row form-row">
        <div class="col-4 m-auto">
            <form action="{{ _route('boosts.store',[], old('name') ?? get_type('boost')) }}" method="post">
                @csrf
                <div class="form-group @error('boosts') has-error @enderror">
                    <label for="boosts_name">Boosts type</label>
                    <select class="custom-select" name="name" id="boosts_name">
                        <option value="switch" @if(get_type('boost') === "switch") selected @endif>Switch</option>
                        <option value="teleport" @if(get_type('boost') === "teleport") selected @endif>Teleport</option>
                        <option value="push" @if(get_type('boost') === "push") selected @endif>Push</option>
                    </select>
                </div>
                <div class="form-group @error('amount') has-error @enderror">
                    <label for="amount">Amount</label>
                       <select class="custom-select" name="amount" id="amount">
                           <option value="3">3</option>
                           <option value="10">10</option>
                           <option value="25">25</option>
                           <option value="100">100</option>
                       </select>
                    {{--   <input class="form-control" id="amount" type="number" placeholder="Please enter amount" name="amount"
                              value="{{ old('amount') }}">--}}
                    @error('amount')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group @error('duration') has-error @enderror">
                    <label for="duration">Duration</label>
                    {{--<input class="form-control" id="duration" type="number" placeholder="Please enter duration" name="duration"
                           value="{{ old('duration') }}">--}}
                    <select class="custom-select" name="duration" id="duration">
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="24">24</option>
                    </select>
                    @error('duration')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group @error('coin') has-error @enderror">
                    <label for="coin">Coin</label>
                    <input class="form-control" id="coin" type="number" placeholder="Please enter coin" name="coin"
                           value="{{ old('coin') }}">
                    @error('coin')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
    </div>
@endsection
