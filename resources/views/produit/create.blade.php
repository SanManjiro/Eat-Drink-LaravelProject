@extends('layouts.app')

@section('title', 'Créer un produit')

@section('content')
<div class="container container-white">
  <h1>Créer un produit</h1>
  <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
    @include('produits._form')
    <button class="btn btn-primary">Sauvegarder</button>
    <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
  </form>
</div>
@endsection
