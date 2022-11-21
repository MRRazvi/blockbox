@extends('layouts.auth')

@section('title', 'Verify Email')

@section('content')
    <p class="login-box-msg">
        Please <strong>verify your email</strong> to access your account.
        If you didn't receive your email <strong>after 1 minute</strong> then resend the email.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            A new email verification link has been emailed to you!
        </div>
    @endif

    <form action="/email/verification-notification" method="POST">
        @csrf

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Resend Email</button>
            </div>
        </div>
    </form>

    <p class="mt-3 mb-1">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    </p>
@endsection
