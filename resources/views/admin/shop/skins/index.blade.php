@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Skins</h2>
    <div class="text-right mr-5">
        <a href="{{ route('skins.create') }}" class="btn btn-success mr-auto">
            Create a skin
        </a>
    </div>

    <table class="table table-dark w-75 m-auto text-center">
        <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Coins</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($skins as $index => $skin)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $skin->skin }}</td>
                <td></td>
                <td>{{ $skin->coin }}</td>
                <td class="d-flex justify-content-center">
                    <form action="{{ route('skins.destroy', ['id' => $skin->id]) }}" onsubmit="checkSubmit(event)" method="post" class="mr-2">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    <a href="{{ route('skins.edit', ['id' => $skin->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        function checkSubmit(evt) {
            if(!confirm('Are you sure to delete skin')) evt.preventDefault()
        }
    </script>
@endsection
