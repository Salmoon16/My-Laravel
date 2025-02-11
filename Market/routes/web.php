<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserWebController;

Route::middleware(['auth'])->group( function () {
    Route::get('/home', [HomeController::class, 'tokoName']);
    Route::get('/', [HomeController::class, 'tokoName']);
    Route::resource('userWeb', UserWebController::class);
});

