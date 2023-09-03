<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('Pages.Login');
});

Route::get('/Pages.welcome', function () {
    return view('Pages.welcome');
});

Route::get('/Pages.Invalid', function () {
    return view('Pages.Invalid');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/check', [LoginController::class, 'index'])->name('LoginController');
