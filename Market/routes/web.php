<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware(['auth'])->group( function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    });
    
});
