<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'home';
})->name('home');

Route::get('/dashboard', function () {
    return view('pages.app.dashboard');
})->name('dashboard')->middleware(['verified']);


Route::get('/terms', function () {})->name('terms');
Route::get('/privacy', function () {})->name('privacy');
