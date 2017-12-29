@extends('layouts.app')

@section("pageTitle")
    Register
@endsection

@section('content')
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            @include("partials.errors")

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="text" class="form-control" name="email"
                           value="{{ old('email') }}" required>
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
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           value="{{ old('password_confirmation') }}" required>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
@endsection
