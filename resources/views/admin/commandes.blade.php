@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Commandes (Admin)</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Stand</th>
                <th>Entreprise</th>
                <th>Détails</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->stand->nom_stand ?? '' }}</td>
                    <td>{{ $commande->stand->user->nom_entreprise ?? '' }}</td>
                    <td>
                        @php $details = json_decode($commande->details_commande, true); @endphp
                        @if(is_array($details))
                            <ul>
                                @foreach($details as $produitId => $quantite)
                                    @php $produit = \App\Models\Produit::find($produitId); @endphp
                                    @if($produit)
                                        <li>{{ $produit->nom }} x {{ $quantite }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            {{ $commande->details_commande }}
                        @endif
                    </td>
                    <td>{{ $commande->date_commande }}</td>
                </tr>
            @empty
                <tr><td colspan="5">Aucune commande trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
