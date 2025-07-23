<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{
    /**
     * Afficher la liste publique des stands approuvés
     */
    public function index(Request $request)
    {
        $query = Stand::approuves()
            ->with(['utilisateur', 'produits']);

        // Recherche par nom de stand ou description
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('nom_stand', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('utilisateur', function ($userQuery) use ($search) {
                        $userQuery->where('nom_entreprise', 'like', "%{$search}%");
                    });
            });
        }

        $stands = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('stands.index', compact('stands'));
    }

    /**
     * Afficher les détails d'un stand spécifique
     */
    public function show(Stand $stand)
    {
        // Vérifier que le stand est approuvé
        if (!$stand->isApprouve()) {
            abort(404, 'Ce stand n\'est pas disponible.');
        }

        $stand->load(['utilisateur', 'produits']);

        return view('stands.show', compact('stand'));
    }
}
