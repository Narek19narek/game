@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Boosts</h2>
    <div class="text-right mr-5">
        <a href="{{ _route('boosts.create', [], get_type('boost') ) }}" class="btn btn-success mr-auto">
            Create a boost
        </a>
    </div>
    <div class="w-75 m-auto text-center">
        <div class="et-hero-tabs-container">
            <a class="et-hero-tab" href="{{ _route('boosts.index', [], 'switch') }}">Switch</a>
            <a class="et-hero-tab" href="{{ _route('boosts.index', [], 'teleport') }}">Teleport</a>
            <a class="et-hero-tab" href="{{ _route('boosts.index', [], 'push') }}">Push</a>
            <span class="et-hero-tab-slider" style="width:{{100/3}}%; left: {{(get_boost_type_value(get_type('boost'))-1)*(100/3)}}%;"></span>
        </div>
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
                    <form action="{{ _route('boosts.destroy', ['id' => $boost->id], $boost->name) }}" onsubmit="checkSubmit(event)" method="post" class="mr-2">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    <a href="{{ _route('boosts.edit', ['id' => $boost->id], $boost->name) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
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
