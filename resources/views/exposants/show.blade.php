@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $stand->nom_stand }}</h1>
    <p>{{ $stand->description }}</p>
    <p><strong>Entreprise :</strong> {{ $stand->user->nom_entreprise ?? '' }}</p>
    <h3>Produits</h3>
    <div class="row">
        @forelse($stand->produits as $produit)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($produit->image_url)
                        <img src="{{ $produit->image_url }}" class="card-img-top" alt="{{ $produit->nom }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->nom }}</h5>
                        <p class="card-text">{{ $produit->description }}</p>
                        <p class="card-text"><strong>Prix :</strong> {{ $produit->prix }} €</p>
                        <form method="POST" action="{{ route('panier.ajouter') }}">
                            @csrf
                            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                            <input type="number" name="quantite" value="1" min="1" class="form-control mb-2" style="width: 80px; display: inline-block;">
                            <button type="submit" class="btn btn-success">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun produit pour ce stand.</p>
        @endforelse
    </div>
    <a href="{{ route('panier') }}" class="btn btn-primary mt-3">Voir mon panier</a>
</div>
@endsection
