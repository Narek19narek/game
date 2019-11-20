@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Edit Boost</h2>
    <div class="row form-row">
        <div class="col-4 m-auto">
            <form action="{{ _route('boosts.update', ['id' => $boost->id], old('name') ?? $boost->name) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group @error('boosts') has-error @enderror">
                    <label for="boosts_name">Boosts type</label>
                    <select class="custom-select" name="name" id="boosts_name">
                        <option></option>
                        <option value="switch" @if($boost->name === "switch") selected @endif> Switch</option>
                        <option value="teleport" @if($boost->name === "teleport") selected @endif>Teleport</option>
                        <option value="push" @if($boost->name === "push") selected @endif>Push</option>
                    </select>
                </div>
                <div class="form-group @error('amount') has-error @enderror">
                    <label for="amount">Amount</label>
                    <input class="form-control" id="amount" type="number" placeholder="Please enter boost count" name="amount" value="{{ old('amount') ? old('amount') : $boost->amount }}">
                    @error('amount')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group @error('duration') has-error @enderror">
                    <label for="duration">Duration</label>
                    <input class="form-control" id="duration" type="number" placeholder="Please enter boosts duration" name="duration" value="{{ old('duration') ? old('duration') : $boost->duration }}">
                    @error('duration')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group @error('coin') has-error @enderror">
                    <label for="coin">Coin</label>
                    <input class="form-control" id="coin" type="number" placeholder="Please enter coin" name="coin" value="{{ old('coin') ? old('coin') : $boost->coin }}">
                    @error('coin')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
    </div>
@endsection
