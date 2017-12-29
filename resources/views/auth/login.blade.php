@extends('layouts.app')

@section("pageTitle")
    Login
@endsection

@section('content')
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            @include("partials.errors")

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password"
                           value="{{ old('password') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection