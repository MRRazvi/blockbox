@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img
                            class="profile-user-img img-fluid img-circle"
                            src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                            alt="{{ auth()->user()->name }}" />
                    </div>
                    <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                    <p class="text-muted text-center">{{ auth()->user()->email }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Status</b>
                            <a class="float-right">{{ str()->title(auth()->user()->status) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Role</b>
                            <a class="float-right">{{ str()->title(auth()->user()->role) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Join Us</b>
                            <a class="float-right">{{ auth()->user()->created_at }}</a>
                        </li>
                    </ul>
                    <a
                        href="{{ route('logout') }}"
                        class="btn btn-primary btn-block"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <b>Logout</b>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#basic" data-toggle="tab">Basic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#password" data-toggle="tab">Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#two-factor-authentication" data-toggle="tab">2FA</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        @include('pages.app.profile._inc.basic')
                        @include('pages.app.profile._inc.password')
                        @include('pages.app.profile._inc.two-factor-authentication')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
