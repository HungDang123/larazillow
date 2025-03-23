<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('/', [\App\Http\Controllers\IndexController::class,'index']);
Route::get('/hello', [\App\Http\Controllers\IndexController::class,'show']);
Route::resource('listings', \App\Http\Controllers\ListingController::class);
Route::get('/login', [AuthController::class,'showLoginForm'])->name('login-form');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');