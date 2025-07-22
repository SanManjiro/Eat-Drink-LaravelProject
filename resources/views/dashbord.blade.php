{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    {{-- Menu latéral gauche --}}
    <div class="col-md-2 sidebar">
      <h4 class="text-white text-center mt-3">Menu</h4>
      <a href="{{ route('produits.index') }}">📦 Produits</a>
      <a href="{{ route('produits.create') }}">➕ Nouveau produit</a>
      <a href="{{ route('dashboard') }}">📊 Dashboard</a>
    </div>

    {{-- Contenu principal --}}
    <div class="col-md-10 p-4">
      <h1 class="mb-4">Bienvenue sur le Dashboard</h1>
      
      {{-- Exemple : liste rapide des produits --}}
      <div class="card">
        <div class="card-header bg-primary text-white">Derniers produits</div>
        <div class="card-body">
          @if($produits->count())
            <ul class="list-group">
              @foreach($produits->take(5) as $produit)
                <li class="list-group-item d-flex justify-content-between">
                  {{ $produit->nom }}
                  <span>{{ number_format($produit->prix, 2) }} €</span>
                </li>
              @endforeach
            </ul>
          @else
            <p class="text-muted">Aucun produit pour l’instant.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
