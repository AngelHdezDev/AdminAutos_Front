<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Catalog\AutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/autos', [AutoController::class, 'index'])->name('autos.index');

Route::get('/autos-detail', function () {
    return view('autos.autoDetail');
});

