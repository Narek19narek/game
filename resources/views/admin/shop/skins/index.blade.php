@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Skins</h2>
    <!-- Hero -->
    <div class="text-right mr-5">
        <a href="{{ _route('skins.create') }}" class="btn btn-success mr-auto">
            Create a skin
        </a>
    </div>
    <div class="w-75 m-auto text-center">
        <div class="et-hero-tabs-container">
            <a class="et-hero-tab" href="{{ _route('skins.index', [], get_skin_type('colors')) }}">Colors</a>
            <a class="et-hero-tab" href="{{ _route('skins.index', [], get_skin_type('masks')) }}">Masks</a>
            <a class="et-hero-tab" href="{{ _route('skins.index', [], get_skin_type('flags')) }}">Flags</a>
            <a class="et-hero-tab" href="{{ _route('skins.index', [], get_skin_type('other')) }}">Other</a>
            <span class="et-hero-tab-slider" style="width:25%; left: {{(get_type()-1)*25}}%;"></span>
        </div>
    </div>
    <table class="table table-dark w-75 m-auto text-center">
        <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            @if(type_is('colors'))
                <td>Color</td>
            @else
                <td>Image</td>
            @endif
            <td>Coins</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($skins as $index => $skin)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $skin->skin }}</td>
                @if(type_is('colors'))
                    <td><div style="
                            width: 50%;
                            margin: 0 auto;
                            height: 10px;
                            background-color: {{$skin->color}};
                            border: 1px solid;
                            "></div></td>
                @else
                    <td><img src="{{$skin->imageUrl}}" width="50"/></td>
                @endif
                <td>{{ $skin->coin }}</td>
                <td class="d-flex justify-content-center">
                    <form action="{{ _route('skins.destroy', ['id' => $skin->id], $skin->type) }}"
                          onsubmit="checkSubmit(event)"
                          method="post" class="mr-2">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    <a href="{{ _route('skins.edit', ['id' => $skin->id], $skin->type) }}" class="btn btn-info"><i
                            class="fa fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        function checkSubmit(evt) {
            if (!confirm('Are you sure to delete skin')) evt.preventDefault()
        }
    </script>
@endsection
