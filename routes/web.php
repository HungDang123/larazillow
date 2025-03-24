<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;
Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);
Route::get('/hello', [\App\Http\Controllers\IndexController::class, 'show']);

Route::resource('listings', ListingController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('auth');

Route::resource('listings', ListingController::class)
    ->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [UserAccountController::class, 'create'])->name('register-form');
Route::post('/register', [UserAccountController::class, 'store'])->name('register');