<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Catalog\AutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/autos', [AutoController::class, 'index'])->name('autos.index');

// Usamos un nombre de ruta para referenciarlo fácilmente en la vista
Route::get('/auto/{id}', [AutoController::class, 'show'])->name('autos.show');

// Route::get('/autos-detail', function () {
//     return view('autos.autoDetail');
// });

