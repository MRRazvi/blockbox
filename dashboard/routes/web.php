<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/blocks', BlockController::class)->only(['index', 'create', 'store']);
        Route::get('/blocks/integrity', [BlockController::class, 'integrityIndex'])->name('blocks.integrity.index');
        Route::post('/blocks/integrity', [BlockController::class, 'integrity'])->name('blocks.integrity');

        Route::resource('/boxes', BoxController::class)->only(['index', 'create', 'show', 'store']);
        Route::post('/boxes/{box}/decrypt', [BoxController::class, 'showDecryptBox'])->name('boxes.show.decrypt');

        Route::group([
                'controller' => ToolsController::class,
                'prefix' => 'tools',
                'as' => 'tools.'
            ], function () {
                Route::group([
                    'prefix' => 'key',
                    'as' => 'key.'
                ], function () {
                        Route::get('/generate', 'keyGenerate')->name('generate');
                        Route::get('/verify', 'keyVerifyIndex')->name('verify.index');
                        Route::post('/verify', 'keyVerify')->name('verify');
                    });
            });

        Route::resource('/users', UserController::class);
        Route::put('/users/{user}/password', [UserController::class, 'password'])->name('users.password');

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
