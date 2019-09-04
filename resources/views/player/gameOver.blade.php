@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Match Results</h2>
                        </div>
                        <div class="card-body">
                            <h4>Time: <span>{{ $params['time'] }} second</span></h4>
                            <h4>Kill: <span>{{ $params['kill'] }}</span></h4>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('home') }}" class="btn btn-primary">Continue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
