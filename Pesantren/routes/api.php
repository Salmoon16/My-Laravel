<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\KawasanController;
use App\Http\Controllers\PesantrenController;

Route::post('login',[AuthController::class, 'login'] );
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('user', UserController::class);
Route::resource('pesantren', PesantrenController::class);
Route::resource('negara', NegaraController::class);
Route::resource('kota', KotaController::class);
Route::resource('kawasan', KawasanController::class);
Route::resource('alamat', AlamatController::class);
Route::post('logout',[AuthController::class, 'logout'] );
});


