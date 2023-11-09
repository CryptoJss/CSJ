<?php

use App\Http\Controllers\AutoresController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/autores', [AutoresController::class, 'index'])->name('autores.index');
    // Route::post('/autores', [AutoresController::class, 'store'])->name('autores.store');
    // Route::get('/autores/create', [AutoresController::class, 'create'])->name('autores.create');
    // Route::put('/autores/{autorid}', [AutoresController::class, 'update'])->name('autores.update');
    // Route::patch('/autores/{autorid}', [AutoresController::class, 'update'])->name('autores.update');
    // Route::delete('/autores', [AutoresController::class, 'destroy'])->name('autores.destroy');
    // Route::get('/autores/edit', [AutoresController::class, 'edit'])->name('autores.edit');
    Route::resource('/autores',AutoresController::class)->except(['show']);
    Route::post('/autores/search', [AutoresController::class, 'search'])->name('autores.search');
});

require __DIR__.'/auth.php';
