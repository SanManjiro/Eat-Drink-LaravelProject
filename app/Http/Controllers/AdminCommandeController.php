<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class AdminCommandeController extends Controller
{
    // Affiche toutes les commandes pour l'admin
    public function index()
    {
        $commandes = Commande::with('stand.user')->orderByDesc('date_commande')->get();
        return view('admin.commandes', compact('commandes'));
    }
}
