<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Booking\BookingController;

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->middleware('auth')->name('detail');
    Route::get('/success/{orderId}', [HomeController::class, 'success'])->middleware('auth')->name('success');
});

Route::group(['prefix' => ''], function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('login-process');
    Route::post('/register-process', [AuthController::class, 'registerProcess'])->name('register-process');
});

Route::group(['prefix' => 'booking', 'middleware' => 'auth'], function() {
    Route::get('/', [BookingController::class, 'index'])->name('booking');
    Route::post('/book-process', [BookingController::class, 'bookProcess'])->middleware('auth')->name('book-process');
});