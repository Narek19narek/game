@extends('layouts.dashboard')
@section('content')
    {{--  add class wraper for 100vh height  --}}
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
            <th scope="col">Switch</th>
            <th scope="col">Teleport</th>
            <th scope="col">Push</th>
            <th scope="col">Coins</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->level}}</td>
                <td>{{$user->switch}}</td>
                <td>{{$user->teleport}}</td>
                <td>{{$user->push}}</td>
                <td>{{$user->coins}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @push('footer-pre-scripts')

    @endpush
@endsection
