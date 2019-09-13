@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Boosts</h2>
    <div class="text-right mr-5">
        <a href="{{ route('boosts.create') }}" class="btn btn-success mr-auto">
            Create a boost
        </a>
    </div>

    <table class="table table-dark w-75 m-auto text-center">
        <thead>
        <tr>
            <td>#</td>
            <td>Boosts type</td>
            <td>Amount</td>
            <td>Duration(hr)</td>
            <td>Coin</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($boosts as $index => $boost)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $boost->name }}</td>
                <td>{{ $boost->amount }}</td>
                <td>{{ $boost->duration }}</td>
                <td>{{ $boost->coin }}</td>
                <td class="d-flex justify-content-center">
                    <form action="{{ route('boosts.destroy', ['id' => $boost->id]) }}" onsubmit="checkSubmit(event)" method="post" class="mr-2">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    <a href="{{ route('boosts.edit', ['id' => $boost->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        function checkSubmit(evt) {
            if(!confirm('Are you sure to delete boost')) evt.preventDefault()
        }
    </script>
@endsection
