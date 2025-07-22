@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
<div class="container container-white">
  <h1>Modifier produit</h1>
  <form action="{{ route('produits.update', $produit) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('produits._form')
    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
  </form>
</div>
@endsection
