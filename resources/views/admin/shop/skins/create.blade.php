@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Skin</h2>
    <div class="row form-row">
        <div class="col-4 m-auto">
            <form action="{{ _route('skins.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group @error('skins') has-error @enderror">
                    <label for="skin_name">Skin name</label>
                    <input class="form-control" id="skin_name" type="text" placeholder="Please enter skin name" name="skin" value="{{ old('skin') }}">
                    @error('skin')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                @if(type_is('colors'))
                <div class="form-group @error('color') has-error @enderror">
                    <label for="skin_color">Skin color</label>
                    <input class="form-control" id="skin_color" type="color" placeholder="Please enter skin color" name="color" value="{{ old('color')?? \App\Skin::DEF_COLOR}}">
                    @error('color')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                @else
                <div class="form-group @error('image') has-error @enderror">
                    <label>Skin image</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="file" name="image" id="skin_img" value="{{ old('skin') }}" onchange="readURL(this);" />
                            <img src="http://placehold.it/180" id="show_skin_img" alt="your image" />
                        </div>
                    </div>
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                @endif
                <div class="form-group @error('coin') has-error @enderror">
                    <label for="skin_cost">Coin</label>
                    <input class="form-control" id="skin_cost" type="number" placeholder="Please enter skin price" name="coin" value="{{ old('coin') }}">
                    @error('coin')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_skin_img')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
