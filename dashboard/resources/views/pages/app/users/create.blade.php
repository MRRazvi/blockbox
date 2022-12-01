@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Create User</div>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <x-forms.input name="name" />
                <x-forms.input name="username" />
                <x-forms.input name="email" type="email" />
                <x-forms.input name="password" type="password" />
                <x-forms.input name="password_confirmation" type="password" />
                <x-forms.dropdown name="status" :options="['active', 'inactive', 'suspended']" />
                <x-forms.dropdown name="role" :options="['admin', 'admin_staff', 'user', 'user_staff']" />
                <x-button name="Create User" />
            </form>
        </div>
    </div>
@endsection
