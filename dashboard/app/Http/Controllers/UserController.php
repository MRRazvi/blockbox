<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.app.users.index', [
            'users' => $users,
            'total_users' => $users->count(),
            'active_users' => $users->whereIn('status', ['active'])->count()
        ]);
    }

    public function create()
    {
        return view('pages.app.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'string', new Password, 'confirmed'],
            'role' => 'required|in:admin,admin_staff,user,user_staff',
            'status' => 'required|in:active,inactive,suspended',
        ]);

        $user = User::create([
            'uuid' => Str::uuid(),
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'status' => $request['status'],
            'email_verified_at' => null,
        ]);

        $user->sendEmailVerificationNotification();
    }

    public function edit(User $user)
    {
        return view('pages.app.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,admin_staff,user,user_staff',
            'status' => 'required|in:active,inactive,suspended',
        ]);

        $user = $user->update([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'role' => $request['role'],
            'status' => $request['status']
        ]);

        if (!$user) {
            return back()->with(['error' => __('app.error')]);
        }

        return back()->with(['success' => __('app.users.update')]);
    }

    public function password(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);

        $user = $user->update([
            'password' => Hash::make($request['password']),
        ]);

        if (!$user) {
            return back()->with(['error' => __('app.error')]);
        }

        return back()->with(['success' => __('app.users.password')]);
    }
}
