<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('/', DashboardController::class)->middleware('auth');

Route::resource('/user', UserController::class)->middleware('auth');
