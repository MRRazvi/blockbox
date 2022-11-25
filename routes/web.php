<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/blocks', [BlockController::class, 'index'])->name('blocks.index');
        Route::get('/blocks/integrity', [BlockController::class, 'integrity'])->name('blocks.integrity');
        Route::get('/blocks/key', [BlockController::class, 'key'])->name('blocks.key');

        Route::resource('/boxes', BoxController::class);

        Route::resource('/users', UserController::class);

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/create-token', [ProfileController::class, 'createToken'])->name('profile.create-token');
    });

Route::get('/', function () {})->name('home');
Route::get('/terms', function () {})->name('terms');
Route::get('/privacy', function () {})->name('privacy');

Route::get('playground', function () {
    foreach (auth()->user()->tokens as $token) {
        dump($token);
    }
});
