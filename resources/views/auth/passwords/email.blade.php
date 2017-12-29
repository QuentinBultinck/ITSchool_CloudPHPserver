@extends('layouts.app')

@section("pageTitle")
    Reset password
@endsection

@section('content')
    <div class="container">
        <h1>Reset password</h1>
        <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            @include("partials.errors")

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
