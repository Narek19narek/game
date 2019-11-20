@extends('layouts.dashboard')
@section('content')
    <h2>Edit Skin</h2>
    <div class="row form-row">
        <div class="col-4 m-auto">
            <form action="{{ _route('skins.update', ['id' => $skin->id], $skin->type) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group @error('coins') has-error @enderror">
                    <label for="skin_name">Skin</label>
                    <input class="form-control" id="skin_name" type="text" placeholder="Please enter skin name" name="skin" value="{{ old('skin') ? old('skin') : $skin->skin }}">
                    @error('skin')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                @if(type_is('colors'))
                    <div class="form-group @error('color') has-error @enderror">
                        <label for="skin_color">Skin color</label>
                        <input class="form-control" id="skin_color" type="color" placeholder="Please enter skin color" name="color" value="{{ old('color')??  $skin->color}}">
                        @error('color')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                @endif
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
