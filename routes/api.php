<?php

use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BoxController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlockController;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::get('/blocks', [BlockController::class, 'index']);

        Route::get('/boxes', [BoxController::class, 'index'])->name('boxes.index');
        Route::get('/boxes/{uuid}', [BoxController::class, 'show'])->name('boxes.show');
        Route::post('/boxes', [BoxController::class, 'store'])->name('boxes.store');
        Route::put('/boxes/{uuid}', [BoxController::class, 'update'])->name('boxes.update');
        Route::delete('/boxes/{uuid}', [BoxController::class, 'destroy'])->name('boxes.destroy');
    });

Route::get('/playground', function () {
    return \Illuminate\Support\Str::random(32);
});
