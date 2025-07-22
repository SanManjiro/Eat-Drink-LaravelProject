<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::get('/', function () {
    return redirect()->route('produits.index');
});

Route::resource('produits', ProduitController::class);
Route::get('/dashboard', [ProduitController::class, 'dashboard'])->name('dashboard');



