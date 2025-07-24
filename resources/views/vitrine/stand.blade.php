@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{ $stand->nom_stand }}</h2>
    <p>{{ $stand->description }}</p>
    <p><strong>Entreprise :</strong> {{ $stand->user->nom_entreprise ?? '' }}</p>
    <form method="POST" action="{{ route('commande.store') }}">
        @csrf
        <input type="hidden" name="stand_id" value="{{ $stand->id }}">
        <h3>Produits</h3>
        @foreach($stand->produits as $produit)
            <div>
                <input type="checkbox" name="produits[]" value="{{ $produit->id }}">
                {{ $produit->nom }} - {{ $produit->prix }} €
            </div>
        @endforeach
        <button type="submit" class="btn btn-success mt-3">Commander</button>
    </form>
</div>
@endsection
