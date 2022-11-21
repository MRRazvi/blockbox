@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $error }}
        </div>
    @endforeach

    <form action="/forgot-password" method="POST">
        @csrf

        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ @old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
        </div>
    </form>

    <p class="mt-3 mb-1">
        <a href="{{ @route('login') }}">I already have an account</a>
    </p>

    <p class="mb-0">
        <a href="{{ @route('register') }}" class="text-center">Register a new account</a>
    </p>
@endsection
