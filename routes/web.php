<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.app.dashboard');
})->name('home');

Route::get('/dashboard', function () {
    return view('pages.auth.login');
})->name('dashboard');
