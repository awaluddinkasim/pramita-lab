<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliveryPersonController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::redirect('/', '/admin/dashboard')->name('index');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/division', [DivisionController::class, 'index'])->name('division.index');
  Route::post('/division', [DivisionController::class, 'store'])->name('division.store');
  Route::delete('/division/{division}', [DivisionController::class, 'destroy'])->name('division.destroy');


  Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{admin}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/delivery-person', [DeliveryPersonController::class, 'index'])->name('delivery-person.index');
    Route::get('/delivery-person/{deliveryPerson}', [DeliveryPersonController::class, 'edit'])->name('delivery-person.edit');
    Route::put('/delivery-person/{deliveryPerson}', [DeliveryPersonController::class, 'update'])->name('delivery-person.update');
    Route::post('/delivery-person', [DeliveryPersonController::class, 'store'])->name('delivery-person.store');
    Route::delete('/delivery-person/{deliveryPerson}', [DeliveryPersonController::class, 'destroy'])->name('delivery-person.destroy');
  });

  Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/pending', [UserController::class, 'pending'])->name('pending');

    Route::get('/verified', [UserController::class, 'verified'])->name('active');
    Route::get('/verified/{user}', [UserController::class, 'edit'])->name('edit');

    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');

    Route::post('/verify/{user}', [UserController::class, 'verify'])->name('verify');
    Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('destroy');
  });

  Route::get('/settings', [AccountController::class, 'index'])->name('settings');
  Route::put('/settings/account', [AccountController::class, 'updateAccount'])->name('settings.account');
  Route::put('/settings/password', [AccountController::class, 'updatePassword'])->name('settings.password');
});
