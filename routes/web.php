<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfessionalsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('patients', PatientController::class);
Route::resource('stocks', StockController::class);
Route::resource('catalogs', CatalogController::class);
Route::resource('professionals', ProfessionalsController::class);