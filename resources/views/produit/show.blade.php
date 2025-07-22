@extends('layouts.app')

@section('title', 'Détail du produit')

@section('content')
<div class="container container-white">
  <h1>Détail : {{ $produit->nom }}</h1>
  <div class="row">
    <div class="col-md-4">
      @if($produit->image)
        <img src="{{ asset($produit->image) }}" class="img-fluid">
      @else
        <p class="text-muted">Pas d’image.</p>
      @endif
    </div>
    <div class="col-md-8">
      <ul class="list-group">
        <li class="list-group-item"><strong>Catégorie:</strong> {{ $produit->categorie ?? '—' }}</li>
        <li class="list-group-item"><strong>Description:</strong> {{ $produit->description }}</li>
        <li class="list-group-item"><strong>Prix:</strong> {{ number_format($produit->prix,2) }} €</li>
        <li class="list-group-item"><strong>Stock:</strong> {{ $produit->stock }}</li>
      </ul>
      <a href="{{ route('produits.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </div>
  </div>
</div>
@endsection
