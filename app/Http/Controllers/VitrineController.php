<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VitrineController extends Controller
{
    public function accueil() {
        return view('vitrine.accueil');
    }

    public function listeExposants(Request $request) {
        $query = Stand::with('user');
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nom_stand', 'like', "%$search%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('nom_entreprise', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%") ;
                  });
        }
        $stands = $query->get();
        return view('vitrine.exposants', compact('stands'));
    }

    public function voirStand($id) {
        $stand = Stand::with('produits', 'user')->findOrFail($id);
        return view('vitrine.stand', compact('stand'));
    }

    public function passerCommande(Request $request) {
        $request->validate([
            'stand_id' => 'required|exists:stands,id',
            'produits' => 'required|array|min:1',
        ]);
        $commande = Commande::create([
            'stand_id' => $request->stand_id,
            'details_commande' => json_encode($request->produits),
            'date_commande' => now(),
        ]);
        // Bonus : notifier l'entrepreneur par email
        $stand = Stand::with('user')->find($request->stand_id);
        if($stand && $stand->user && $stand->user->email) {
            Mail::raw('Vous avez reçu une nouvelle commande sur votre stand.', function($message) use ($stand) {
                $message->to($stand->user->email)
                        ->subject('Nouvelle commande sur votre stand');
            });
        }
        return redirect()->route('exposants.index')->with('success', 'Commande passée avec succès !');
    }
}
