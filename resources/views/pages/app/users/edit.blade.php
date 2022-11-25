@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Basic Information</div>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-forms.input name="name" value="{{ $user->name }}" />
                <x-forms.input name="username" value="{{ $user->username }}" />
                <x-forms.input name="email" type="email" value="{{ $user->email }}" />
                <x-forms.dropdown name="status" :options="['active', 'inactive', 'suspended']" value="{{ $user->status }}" />
                <x-forms.dropdown name="role" :options="['admin', 'admin_staff', 'user', 'user_staff']" value="{{ $user->role }}" />
                <x-button name="Edit User" />
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Change Password</div>
        </div>
        <div class="card-body">
            <form action="{{ route('users.password', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-forms.input name="password" type="password" />
                <x-forms.input name="password_confirmation" type="password" />
                <x-button name="Change Password" />
            </form>
        </div>
    </div>
@endsection
