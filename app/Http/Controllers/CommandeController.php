<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class CommandeController extends Controller
{
    // Affiche le panier
    public function panier()
    {
        $panier = Session::get('panier', []);
        return view('commande.panier', compact('panier'));
    }

    // Ajoute un produit au panier
    public function ajouterAuPanier(Request $request)
    {
        $produitId = $request->input('produit_id');
        $quantite = $request->input('quantite', 1);
        $panier = Session::get('panier', []);
        if(isset($panier[$produitId])) {
            $panier[$produitId] += $quantite;
        } else {
            $panier[$produitId] = $quantite;
        }
        Session::put('panier', $panier);
        return redirect()->back()->with('success', 'Produit ajouté au panier.');
    }

    // Retire un produit du panier
    public function retirerDuPanier($id)
    {
        $panier = Session::get('panier', []);
        unset($panier[$id]);
        Session::put('panier', $panier);
        return redirect()->route('panier')->with('success', 'Produit retiré du panier.');
    }

    // Affiche le formulaire de commande
    public function commanderForm($standId)
    {
        $stand = Stand::with('produits')->findOrFail($standId);
        $panier = Session::get('panier', []);
        return view('commande.form', compact('stand', 'panier'));
    }

    // Soumet la commande
    public function commander(Request $request, $standId)
    {
        $stand = Stand::findOrFail($standId);
        $panier = Session::get('panier', []);
        if(empty($panier)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }
        $commande = new Commande();
        $commande->stand_id = $stand->id;
        $commande->details_commande = json_encode($panier);
        $commande->date_commande = now();
        $commande->save();
        // (Bonus) Notifier l'entrepreneur par email
        if($stand->user && $stand->user->email) {
            Mail::raw('Vous avez reçu une nouvelle commande sur votre stand.', function($message) use ($stand) {
                $message->to($stand->user->email)
                        ->subject('Nouvelle commande sur votre stand');
            });
        }
        Session::forget('panier');
        return redirect()->route('exposants.index')->with('success', 'Commande passée avec succès !');
    }
}
