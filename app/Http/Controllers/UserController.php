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
            'password' => ['required', 'string', new Password, 'confirmed']
        ]);

        $user = User::create([
            'uuid' => Str::uuid(),
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['password'],
            'status' => $request['password'],
            'email_verified_at' => null,
        ]);

        $user->sendEmailVerificationNotification();

    }
}
