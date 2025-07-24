@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Passer la commande</h1>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('commande.envoyer', $stand->id) }}">
        @csrf
        <h4>Produits commandés :</h4>
        <ul>
            @foreach($panier as $produitId => $quantite)
                @php $produit = \App\Models\Produit::find($produitId); @endphp
                @if($produit)
                    <li>{{ $produit->nom }} x {{ $quantite }}</li>
                @endif
            @endforeach
        </ul>
        <button type="submit" class="btn btn-success">Valider la commande</button>
        <a href="{{ route('panier') }}" class="btn btn-secondary">Retour au panier</a>
    </form>
</div>
@endsection
