<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/boxes', BoxController::class)->only(['index', 'create', 'show', 'store']);

        Route::resource('/users', UserController::class);
        Route::put('/users/{user}/password', [UserController::class, 'password'])->name('users.password');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/create-token', [ProfileController::class, 'createToken'])->name('profile.create-token');
    });

Route::get('/', function () {})->name('home');
Route::get('/terms', function () {})->name('terms');
Route::get('/privacy', function () {})->name('privacy');
