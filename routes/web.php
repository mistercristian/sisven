<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/categorias',[CategorieController::class, 'index'])->name('categorias.index');
    Route::post('/categorias',[CategorieController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/create', [CategorieController::class, 'create'])->name('categorias.create');
    Route::delete('/categorias/{categoria}', [CategorieController::class, 'destroy'])->name('categorias.destroy');
    Route::put('/categorias/{categoria}', [CategorieController::class, 'update'])->name('categorias.update');
    Route::get('/categorias/{categoria}/edit', [CategorieController::class, 'edit'])->name('categorias.edit');


    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
