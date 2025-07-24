@extends('layouts.app')
@section('content')
<div class="container text-center">
    <h1>Bienvenue sur Eat&Drink !</h1>
    <p>Découvrez les exposants, stands et produits de l'événement culinaire.</p>
    <a href="{{ route('exposants.index') }}" class="btn btn-primary">Voir la vitrine des exposants</a>
</div>
@endsection
