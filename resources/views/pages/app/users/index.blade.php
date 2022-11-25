@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1">
                    <i class="fas fa-users"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Users</span>
                    <span class="info-box-number">{{ $total_users }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1">
                    <i class="fas fa-thumbs-up"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Active Status</span>
                    <span class="info-box-number">{{ $active_users }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users Management</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UUID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" target="_blank">{{ $user->uuid }}</a>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ '@' . $user->username }}</td>
                            <td>
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </td>
                            <td>
                                @if($user->role == 'admin')
                                    <span class="badge badge-success">Admin</span>
                                @elseif($user->role == 'user')
                                    <span class="badge badge-success">Staff</span>
                                @elseif($user->role == 'admin_staff')
                                    <span class="badge badge-primary">User</span>
                                @elseif($user->role == 'user_staff')
                                    <span class="badge badge-primary">Sub User</span>
                                @else
                                    <span class="badge badge-info">{{ str()->title($user->role) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->status == 'active')
                                    <span class="badge badge-success">Active</span>
                                @elseif($user->status == 'inactive')
                                    <span class="badge badge-warning">Inactive</span>
                                @elseif($user->status == 'suspended')
                                    <span class="badge badge-danger">Suspended</span>
                                @else
                                    <span class="badge badge-info">{{ str()->title($user->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" target="_blank">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="#">
                                    <span class="fa fa-cross"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
