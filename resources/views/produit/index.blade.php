@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')
<div class="container container-white">
  <h1 class="mb-4">Produits</h1>
  <a href="{{ route('produits.create') }}" class="btn btn-success mb-3">➕ Ajouter produit</a>
  @if(session('success'))
    <div class="alert alert-info">{{ session('success') }}</div>
  @endif
  <table class="table table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th><th>Image</th><th>Nom</th><th>Catégorie</th><th>Prix</th><th>Stock</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($produits as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>
            @if($p->image)
              <img src="{{ asset($p->image) }}" width="60">
            @else
              <span class="text-muted">Aucune</span>
            @endif
          </td>
          <td>{{ $p->nom }}</td>
          <td>{{ $p->categorie ?? '—' }}</td>
          <td>{{ number_format($p->prix,2) }} €</td>
          <td>{{ $p->stock }}</td>
          <td>
            <a href="{{ route('produits.show', $p) }}" class="btn btn-sm btn-info">Voir</a>
            <a href="{{ route('produits.edit', $p) }}" class="btn btn-sm btn-warning">Modifier</a>
            <form action="{{ route('produits.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ?');">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Supprimer</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7">Aucun produit trouvé.</td></tr>
      @endforelse
    </tbody>
  </table>
  {{ $produits->links() }}
</div>
@endsection
