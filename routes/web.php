<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VitrineController;

Route::get('/', [VitrineController::class, 'accueil'])->name('accueil');
Route::get('/exposants', [VitrineController::class, 'listeExposants'])->name('exposants.index');
Route::get('/exposants/{id}', [VitrineController::class, 'voirStand'])->name('exposants.show');
Route::post('/commande', [VitrineController::class, 'passerCommande'])->name('commande.store');

// Panier (optionnel, si tu veux garder l'ancien système)
Route::get('/panier', [App\Http\Controllers\CommandeController::class, 'panier'])->name('panier');
Route::post('/panier/ajouter', [App\Http\Controllers\CommandeController::class, 'ajouterAuPanier'])->name('panier.ajouter');
Route::delete('/panier/retirer/{id}', [App\Http\Controllers\CommandeController::class, 'retirerDuPanier'])->name('panier.retirer');

// Commander (optionnel, si tu veux garder l'ancien système)
Route::get('/commande/{standId}', [App\Http\Controllers\CommandeController::class, 'commanderForm'])->name('commande.form');
Route::post('/commande/{standId}', [App\Http\Controllers\CommandeController::class, 'commander'])->name('commande.envoyer');

// Admin : voir toutes les commandes
Route::get('/admin/commandes', [App\Http\Controllers\AdminCommandeController::class, 'index'])->name('admin.commandes');
