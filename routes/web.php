<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('index');

Route::group(['middleware' => 'guest:admin,delivery,user'], function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('authenticate');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:admin,delivery,user')->name('logout');

require __DIR__ . '/app/admin.php';
require __DIR__ . '/app/delivery.php';
require __DIR__ . '/app/user.php';
