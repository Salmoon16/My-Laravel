<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
