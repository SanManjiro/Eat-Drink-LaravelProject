@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Nos Exposants</h1>
    <form method="GET" action="{{ route('exposants.index') }}" class="mb-3">
        <input type="text" name="search" placeholder="Rechercher un stand ou une entreprise" value="{{ request('search') }}">
        <button type="submit">Rechercher</button>
    </form>
    <div class="row">
        @forelse($stands as $stand)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $stand->nom_stand }}</h5>
                        <p class="card-text">{{ $stand->description }}</p>
                        <p class="card-text"><strong>Entreprise :</strong> {{ $stand->user->nom_entreprise ?? '' }}</p>
                        <a href="{{ route('exposants.show', $stand->id) }}" class="btn btn-primary">Voir le stand</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun exposant trouvé.</p>
        @endforelse
    </div>
</div>
@endsection
