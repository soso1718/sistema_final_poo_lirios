<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfessionalsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])
->middleware(['auth'])
->name('home');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('patients', PatientController::class);
    Route::resource('catalogs', CatalogController::class);
    Route::resource('professionals', ProfessionalsController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('schedulings', SchedulingController::class);
});

