@extends('layouts.app')

@section('title', 'Nos Exposants')

@section('content')
<div class="min-h-screen pt-24 pb-12 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16 animate-fade-in-up">
            <div class="flex items-center justify-center mb-6">
                <i data-lucide="sparkles" class="w-8 h-8 text-white/60 mr-4 animate-pulse"></i>
                <span class="text-white/60 font-medium tracking-wider uppercase text-sm">Découvrez nos Talents</span>
                <i data-lucide="sparkles" class="w-8 h-8 text-white/60 ml-4 animate-pulse"></i>
            </div>

            <h1 class="text-6xl md:text-7xl font-black mb-8 gradient-text-primary">
                Nos Exposants
            </h1>
            <p class="text-xl text-white/70 max-w-3xl mx-auto leading-relaxed font-light">
                Découvrez les artisans passionnés qui font la richesse de notre événement culinaire.
            </p>
        </div>

        <!-- Search and Filters -->
        <div class="card p-6 mb-12 animate-fade-in-up">
            <form method="GET" action="{{ route('stands.index') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Rechercher un stand ou une spécialité..."
                               class="form-input pl-12">
                        <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-white/50"></i>
                    </div>
                </div>
                <button type="submit" class="btn-primary px-8">
                    <i data-lucide="search" class="w-5 h-5 mr-2"></i>
                    Rechercher
                </button>
            </form>
        </div>

        <!-- Stands Grid -->
        @if(isset($stands) && $stands->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($stands as $stand)
                    <div class="card card-hover animate-fade-in-up stagger-{{ $loop->index % 6 + 1 }}">
                        <!-- Stand Header -->
                        <div class="p-6 border-b border-white/10">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="w-16 h-16 bg-white/10 rounded-3xl flex items-center justify-center">
                                    <i data-lucide="chef-hat" class="w-8 h-8 text-white/70"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-white mb-1">{{ $stand->nom_stand }}</h3>
                                    <p class="text-white/60 text-sm">{{ $stand->utilisateur->nom_entreprise }}</p>
                                </div>
                            </div>

                            @if($stand->description)
                                <p class="text-white/70 line-clamp-3">{{ $stand->description }}</p>
                            @endif
                        </div>

                        <!-- Products Preview -->
                        <div class="p-6">
                            @if($stand->produits && $stand->produits->count() > 0)
                                <div class="mb-4">
                                    <h4 class="text-white font-medium mb-3 flex items-center">
                                        <i data-lucide="package" class="w-4 h-4 mr-2"></i>
                                        Produits ({{ $stand->produits->count() }})
                                    </h4>
                                    <div class="grid grid-cols-2 gap-3">
                                        @foreach($stand->produits->take(4) as $produit)
                                            <div class="bg-white/5 rounded-xl p-3">
                                                @if($produit->image_url)
                                                    <img src="{{ $produit->image_url }}"
                                                         alt="{{ $produit->nom }}"
                                                         class="w-full h-20 object-cover rounded-lg mb-2">
                                                @else
                                                    <div class="w-full h-20 bg-white/10 rounded-lg flex items-center justify-center mb-2">
                                                        <i data-lucide="image" class="w-6 h-6 text-white/40"></i>
                                                    </div>
                                                @endif
                                                <h5 class="text-white text-sm font-medium line-clamp-1">{{ $produit->nom }}</h5>
                                                <p class="text-white/80 text-xs font-semibold">{{ number_format($produit->prix, 2) }}€</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($stand->produits->count() > 4)
                                        <p class="text-white/60 text-sm mt-3 text-center">
                                            +{{ $stand->produits->count() - 4 }} autre(s) produit(s)
                                        </p>
                                    @endif
                                </div>
                            @else
                                <div class="text-center py-6">
                                    <i data-lucide="package" class="w-12 h-12 text-white/20 mx-auto mb-3"></i>
                                    <p class="text-white/60 text-sm">Aucun produit pour le moment</p>
                                </div>
                            @endif

                            <!-- Visit Stand Button -->
                            <a href="{{ route('stands.show', $stand) }}"
                               class="w-full btn-primary justify-center">
                                <i data-lucide="eye" class="w-5 h-5 mr-2"></i>
                                Visiter le Stand
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(method_exists($stands, 'links'))
                <div class="flex justify-center">
                    {{ $stands->appends(request()->query())->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="card p-12 text-center animate-fade-in-up">
                <i data-lucide="search-x" class="w-24 h-24 text-white/20 mx-auto mb-6"></i>
                <h2 class="text-3xl font-bold text-white/60 mb-4">
                    @if(request('search'))
                        Aucun résultat trouvé
                    @else
                        Aucun stand disponible
                    @endif
                </h2>
                <p class="text-white/40 mb-8 max-w-md mx-auto">
                    @if(request('search'))
                        Essayez de modifier vos critères de recherche ou explorez tous nos exposants.
                    @else
                        Les stands apparaîtront ici une fois que les entrepreneurs seront approuvés.
                    @endif
                </p>

                @if(request('search'))
                    <div class="space-y-4">
                        <a href="{{ route('stands.index') }}" class="btn-primary">
                            <i data-lucide="eye" class="w-5 h-5 mr-2"></i>
                            Voir Tous les Stands
                        </a>
                    </div>
                @else
                    <a href="{{ route('register') }}" class="btn-primary">
                        <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                        Devenir Exposant
                    </a>
                @endif
            </div>
        @endif

        <!-- CTA Section -->
        <div class="card p-8 text-center mt-16 animate-fade-in-up">
            <h2 class="text-3xl font-bold text-white mb-4">Vous aussi, rejoignez-nous !</h2>
            <p class="text-white/70 mb-8 max-w-2xl mx-auto">
                Partagez votre passion culinaire avec notre communauté et développez votre activité.
            </p>
            <a href="{{ route('register') }}" class="btn-primary text-lg px-10 py-5">
                <i data-lucide="chef-hat" class="w-6 h-6 mr-3"></i>
                Devenir Exposant
            </a>
        </div>
    </div>
</div>
@endsection
