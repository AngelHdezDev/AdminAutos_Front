<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/autos', function () {
    return view('autos.autos');
});

Route::get('/autos-detail', function () {
    return view('autos.autoDetail');
});