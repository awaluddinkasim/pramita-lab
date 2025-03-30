<?php

use App\Http\Controllers\Delivery\AccountController;
use App\Http\Controllers\Delivery\DashboardController;
use App\Http\Controllers\Delivery\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:delivery', 'prefix' => 'delivery', 'as' => 'delivery.'], function () {
  Route::redirect('/', '/delivery/dashboard')->name('index');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/active-order', [OrderController::class, 'active'])->name('active-order');
  Route::put('/active-order', [OrderController::class, 'selesai'])->name('active-order.selesai');

  Route::get('/orders', [OrderController::class, 'list'])->name('orders');
  Route::post('/orders/{order}', [OrderController::class, 'take'])->name('order.take');

  Route::get('/history', [OrderController::class, 'history'])->name('history');
  Route::get('/history/{order}', [OrderController::class, 'show'])->name('history.show');

  Route::get('/settings', [AccountController::class, 'index'])->name('settings');
  Route::put('/settings/account', [AccountController::class, 'updateAccount'])->name('settings.account');
  Route::put('/settings/password', [AccountController::class, 'updatePassword'])->name('settings.password');
});
