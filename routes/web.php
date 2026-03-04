<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('Dashboard.Dashboard');
});

Route::get('/autos', function () {
    return view('autos.autos');
});

Route::get('/autos-detail', function () {
    return view('autos.autoDetail');
});