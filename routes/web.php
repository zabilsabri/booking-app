<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});