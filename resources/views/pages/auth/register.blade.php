@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <p class="login-box-msg">Register a new account</p>

    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $error }}
        </div>
    @endforeach

    <form action="/register" method="POST" class="mb-3">
        @csrf

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ @old('name') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" value="{{ @old('username') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-at"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ @old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="agree" name="agree">
                    <label for="agree">
                        I agree to the
                        <a href="{{ route('terms') }}" target="_blank">terms conditions</a>
                        and
                        <a href="{{ @route('privacy') }}" target="_blank">privacy policy</a>
                    </label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
    </form>

    <p class="mb-0">
        <a href="{{ @route('login') }}" class="text-center">I already have an account</a>
    </p>
@endsection
