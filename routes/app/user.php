<?php

use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:user', 'prefix' => 'app'], function () {
  Route::redirect('/', '/dashboard')->name('index');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/new-order', [OrderController::class, 'new'])->name('new-order');
  Route::post('/new-order', [OrderController::class, 'store'])->name('new-order.store');

  Route::get('/orders', [OrderController::class, 'index'])->name('orders');
  Route::get('/orders/{order}', [OrderController::class, 'show'])->name('order.show');

  Route::get('/settings', [AccountController::class, 'index'])->name('settings');
  Route::put('/settings/account', [AccountController::class, 'updateAccount'])->name('settings.account');
  Route::put('/settings/password', [AccountController::class, 'updatePassword'])->name('settings.password');
});
