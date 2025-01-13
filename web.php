<?php

use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showAuthPage'])->name('auth.page');
Route::post('/signin', [AuthController::class, 'signIn'])->name('signin');
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
