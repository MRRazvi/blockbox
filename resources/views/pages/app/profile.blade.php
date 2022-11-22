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
                            <a class="nav-link" href="#2fa" data-toggle="tab">Two Factor</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session()->has('status') && session('status') == 'profile-information-updated')
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    Your profile has been successfully updated.
                                </div>
                            @endif

                            <form action="{{ route('user-profile-information.update') }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            placeholder="Full Name"
                                            name="name"
                                            value="{{ auth()->user()->name }}"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="username"
                                            placeholder="Username"
                                            name="username"
                                            value="{{ auth()->user()->username }}"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            placeholder="Email"
                                            name="email"
                                            value="{{ auth()->user()->email }}"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="security"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
