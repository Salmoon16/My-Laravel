<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PabrikController;
use App\Http\Controllers\TokoController;

Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('pabrik', PabrikController::class);
    Route::apiResource('toko', TokoController::class);
    Route::apiResource('user', UserController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
});
