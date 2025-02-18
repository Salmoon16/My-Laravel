<?php

use App\Http\Controllers\TestWa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sendWa{$message}', [TestWa::class, 'sendWa'])->name('api.sendWa');
