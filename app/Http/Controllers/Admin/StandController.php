<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stand;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StandController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Afficher le tableau de bord admin avec les demandes en attente
     */
    public function index()
    {
        $demandesEnAttente = Stand::enAttente()
            ->with('utilisateur')
            ->orderBy('created_at', 'desc')
            ->get();

        $standsApprouves = Stand::approuves()
            ->with('utilisateur')
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_demandes' => Stand::enAttente()->count(),
            'total_approuves' => Stand::approuves()->count(),
            'total_rejetes' => Stand::where('statut', 'rejete')->count(),
            'total_entrepreneurs' => User::where('role', 'like', 'entrepreneur%')->count(),
        ];

        return view('admin.stands.index', compact('demandesEnAttente', 'standsApprouves', 'stats'));
    }

    /**
     * Afficher les détails d'une demande de stand
     */
    public function show(Stand $stand)
    {
        $stand->load('utilisateur');
        return view('admin.stands.show', compact('stand'));
    }

    /**
     * Approuver une demande de stand
     */
    public function approve(Stand $stand)
    {
        // Vérifier que le stand est en attente
        if ($stand->statut !== 'en_attente') {
            return redirect()->back()->with('error', 'Cette demande a déjà été traitée');
        }

        // Mettre à jour le statut du stand
        $stand->update(['statut' => 'approuve']);

        // Mettre à jour le rôle de l'utilisateur
        $stand->utilisateur->update(['role' => 'entrepreneur_approuve']);

        return redirect()->route('admin.stands.index')->with('success',
            "Le stand '{$stand->nom_stand}' a été approuvé avec succès. L'entrepreneur peut maintenant accéder à son tableau de bord."
        );
    }

    /**
     * Rejeter une demande de stand
     */
    public function reject(Request $request, Stand $stand)
    {
        // Vérifier que le stand est en attente
        if ($stand->statut !== 'en_attente') {
            return redirect()->back()->with('error', 'Cette demande a déjà été traitée');
        }

        $request->validate([
            'motif_rejet' => 'nullable|string|max:500'
        ], [
            'motif_rejet.max' => 'Le motif de rejet ne peut pas dépasser 500 caractères'
        ]);

        // Mettre à jour le statut du stand avec le motif
        $stand->update([
            'statut' => 'rejete',
            'motif_rejet' => $request->motif_rejet
        ]);

        return redirect()->route('admin.stands.index')->with('success',
            "La demande de stand '{$stand->nom_stand}' a été rejetée."
        );
    }

    /**
     * Afficher uniquement les demandes en attente
     */
    public function pending()
    {
        $demandes = Stand::enAttente()
            ->with('utilisateur')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.stands.pending', compact('demandes'));
    }
}
