<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Illuminate\Http\Request;

class ExposantController extends Controller
{
    // Affiche la liste des stands approuvés
    public function index(Request $request)
    {
        $query = Stand::with('user')->whereHas('user', function($q) {
            $q->where('role', 'entrepreneur_approuve');
        });
        // Recherche par nom de stand ou d'entreprise
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nom_stand', 'like', "%$search%")
                  ->orWhereHas('user', function($q2) use ($search) {
                      $q2->where('nom_entreprise', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%") ;
                  });
            });
        }
        $stands = $query->get();
        return view('exposants.index', compact('stands'));
    }

    // Affiche la page d'un stand avec ses produits
    public function show($id)
    {
        $stand = Stand::with('user', 'produits')->findOrFail($id);
        return view('exposants.show', compact('stand'));
    }
}
