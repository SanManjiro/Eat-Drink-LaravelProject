@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Mon Panier</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(empty($panier))
        <p>Votre panier est vide.</p>
    @else
        @php $total = 0; @endphp
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($panier as $produitId => $quantite)
                    @php $produit = \App\Models\Produit::find($produitId); @endphp
                    @if($produit)
                        @php $sousTotal = $produit->prix * $quantite; $total += $sousTotal; @endphp
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->prix }} €</td>
                            <td>{{ $quantite }}</td>
                            <td>{{ $sousTotal }} €</td>
                            <td>
                                <form method="POST" action="{{ route('panier.retirer', $produitId) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Retirer</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="mb-3"><strong>Total : {{ $total }} €</strong></div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Continuer mes achats</a>
        @php
            $standId = null;
            foreach($panier as $produitId => $q) {
                $produit = \App\Models\Produit::find($produitId);
                if($produit) { $standId = $produit->stand_id; break; }
            }
        @endphp
        @if($standId)
            <a href="{{ route('commande.form', $standId) }}" class="btn btn-primary">Commander</a>
        @endif
    @endif
</div>
@endsection
