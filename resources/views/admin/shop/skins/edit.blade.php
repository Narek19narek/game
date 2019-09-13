@extends('layouts.dashboard')
@section('content')
    <h2>Edit Skin</h2>
    <div class="row">
        <div class="col-4 m-auto">
            <form action="{{ route('skins.update', ['id' => $skin->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group @error('coins') has-error @enderror">
                    <label for="skin_name">Skin</label>
                    <input class="form-control" id="skin_name" type="text" placeholder="Please enter skin name" name="skin" value="{{ old('skin') ? old('skin') : $skin->skin }}">
                    @error('skin')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group @error('price') has-error @enderror">
                    <label for="skin_cost">Coin</label>
                    <input class="form-control" id="skin_cost" type="number" placeholder="Please enter skin price" name="coin" value="{{ old('coin') ? old('coin') : $skin->coin }}">
                    @error('coin')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            </form>
        </div>
    </div>
@endsection
