@extends('layouts.game')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="d-flex justify-content-around tab-content">
                        <button class="w-100 active" onclick="toggleForm('login')">Login</button>
                        <button class="w-100" onclick="toggleForm('register')">Register</button>
                    </div>
                    <div id="loginForm">
                        <form>
                            <div class="form-group">
                                <label for="player_email">Email address</label>
                                <input type="email" class="form-control" id="player_email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="player_password">Password</label>
                                <input type="password" class="form-control" id="player_password" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                    <div id="registerForm">
                        <form>
                            <div class="form-group">
                                <label for="player_name">Username</label>
                                <input type="texy" class="form-control" id="player_name" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="player_email">Email address</label>
                                <input type="email" class="form-control" id="player_email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="player_password">Password</label>
                                <input type="password" class="form-control" id="player_password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="player_password">Confirm Password</label>
                                <input type="password" class="form-control" id="player_confirm_password" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
            </div>
            <div class="col-md-4 col-sm-6 col-12">
            </div>
        </div>
    </div>
    <script>
        document.getElementById('registerForm').style.display = 'none';
        function toggleForm(form) {
            if (form === 'login') {
                document.getElementById('loginForm').style.display = 'block';
                document.getElementById('registerForm').style.display = 'none';
            } else {
                document.getElementById('registerForm').style.display = 'block';
                document.getElementById('loginForm').style.display = 'none';
            }
        }
    </script>
@endsection
