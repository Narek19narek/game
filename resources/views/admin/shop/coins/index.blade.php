@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Coins</h2>
    <div class="text-right mr-5">
        <a href="{{ route('coins.create') }}" class="btn btn-success mr-auto">
            Create a coin
        </a>
    </div>

    <table class="table table-dark w-75 m-auto text-center">
        <thead>
            <tr>
                <td>#</td>
                <td>Coins</td>
                <td>Price</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($coins as $index => $coin)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $coin->coin }}</td>
                    <td>{{ $coin->price }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{ route('coins.destroy', ['id' => $coin->id]) }}" onsubmit="checkSubmit(event)" method="post" class="mr-2">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        <a href="{{ route('coins.edit', ['id' => $coin->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        function checkSubmit(evt) {
            if(!confirm('Are you sure to delete coin')) evt.preventDefault()
        }
    </script>
@endsection
