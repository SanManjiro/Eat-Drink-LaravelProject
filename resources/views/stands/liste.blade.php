@extends('layouts.app')

@section('title', 'Nos Exposants')

@section('content')
<div class="min-h-screen pt-24 pb-12 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center mb-16 animate-fade-in-up">
            <h1 class="text-5xl md:text-6xl font-black mb-6 gradient-text-primary">
                Nos Exposants
            </h1>
            <p class="text-xl text-white/70 max-w-3xl mx-auto leading-relaxed">
                Découvrez nos artisans et restaurateurs passionnés qui vous proposent
                des produits d'exception pour une expérience culinaire unique.
            </p>
        </div>

        <!-- Search and Filters -->
        <div class="mb-12 fade-in-section">
            <div class="card p-6">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Search -->
                    <div class="flex-1">
                        <div class="relative">
                            <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-white/50"></i>
                            <input type="text"
                                   placeholder="Rechercher un stand ou un produit..."
                                   class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/30 focus:border-white/50">
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <button class="btn-secondary px-6 py-3">
                        <i data-lucide="filter" class="w-5 h-5 mr-2"></i>
                        Filtres
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16 fade-in-section">
            <div class="card p-6 text-center">
                <div class="text-3xl font-black text-white mb-2">{{ $stands->count() ?? '12' }}</div>
                <div class="text-white/60">Exposants</div>
            </div>
            <div class="card p-6 text-center">
                <div class="text-3xl font-black text-white mb-2">150+</div>
                <div class="text-white/60">Produits</div>
            </div>
            <div class="card p-6 text-center">
                <div class="text-3xl font-black text-white mb-2">4.8</div>
                <div class="text-white/60">Note Moyenne</div>
            </div>
            <div class="card p-6 text-center">
                <div class="text-3xl font-black text-white mb-2">24h</div>
                <div class="text-white/60">Support</div>
            </div>
        </div>

        <!-- Stands Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 fade-in-section">
            @forelse($stands ?? [] as $stand)
                <div class="card card-hover group">
                    <!-- Image -->
                    <div class="relative h-48 bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden">
                        @if($stand->image_url ?? false)
                            <img src="{{ $stand->image_url }}"
                                 alt="{{ $stand->nom_stand }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i data-lucide="chef-hat" class="w-16 h-16 text-white/20"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                        <!-- Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="status-approved">
                                <i data-lucide="check-circle" class="w-4 h-4 mr-1"></i>
                                Vérifié
                            </span>
                        </div>

                        <!-- Rating -->
                        <div class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm px-3 py-1 rounded-full">
                            <div class="flex items-center space-x-1">
                                <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                <span class="text-white text-sm font-medium">4.8</span>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-gray-300 transition-colors duration-300">
                            {{ $stand->nom_stand ?? 'Stand Example' }}
                        </h3>
                        <p class="text-white/60 mb-4 line-clamp-2">
                            {{ $stand->description ?? 'Description du stand avec des spécialités culinaires uniques et des produits artisanaux de qualité.' }}
                        </p>

                        <!-- Info -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2 text-white/50 text-sm">
                                <i data-lucide="package" class="w-4 h-4"></i>
                                <span>{{ $stand->produits_count ?? '8' }} produits</span>
                            </div>
                            <div class="flex items-center space-x-2 text-white/50 text-sm">
                                <i data-lucide="clock" class="w-4 h-4"></i>
                                <span>Ouvert</span>
                            </div>
                        </div>

                        <!-- Action -->
                        <a href="{{ route('stands.show', $stand->id ?? 1) }}"
                           class="w-full btn-primary justify-center group">
                            Découvrir
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                </div>
            @empty
                <!-- Demo stands when no data -->
                @for($i = 1; $i <= 6; $i++)
                    <div class="card card-hover group">
                        <div class="relative h-48 bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden">
                            <div class="w-full h-full flex items-center justify-center">
                                <i data-lucide="chef-hat" class="w-16 h-16 text-white/20"></i>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                            <div class="absolute top-4 left-4">
                                <span class="status-approved">
                                    <i data-lucide="check-circle" class="w-4 h-4 mr-1"></i>
                                    Vérifié
                                </span>
                            </div>

                            <div class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm px-3 py-1 rounded-full">
                                <div class="flex items-center space-x-1">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <span class="text-white text-sm font-medium">4.{{ $i + 2 }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white mb-2 group-hover:text-gray-300 transition-colors duration-300">
                                Stand {{ $i == 1 ? 'La Petite France' : ($i == 2 ? 'Saveurs du Monde' : ($i == 3 ? 'Artisan Boulanger' : ($i == 4 ? 'Bio & Local' : ($i == 5 ? 'Sweet Delights' : 'Café Gourmand')))) }}
                            </h3>
                            <p class="text-white/60 mb-4 line-clamp-2">
                                {{ $i == 1 ? 'Spécialités françaises traditionnelles préparées avec des ingrédients de première qualité.' : ($i == 2 ? 'Un voyage culinaire à travers le monde avec des saveurs authentiques et exotiques.' : ($i == 3 ? 'Boulangerie artisanale proposant pains, viennoiseries et pâtisseries faites maison.' : ($i == 4 ? 'Produits biologiques et locaux pour une alimentation saine et responsable.' : ($i == 5 ? 'Desserts et confiseries artisanales pour les amateurs de douceurs.' : 'Café de spécialité et boissons chaudes accompagnées de petites douceurs.')))) }}
                            </p>

                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2 text-white/50 text-sm">
                                    <i data-lucide="package" class="w-4 h-4"></i>
                                    <span>{{ rand(5, 15) }} produits</span>
                                </div>
                                <div class="flex items-center space-x-2 text-white/50 text-sm">
                                    <i data-lucide="clock" class="w-4 h-4"></i>
                                    <span>Ouvert</span>
                                </div>
                            </div>

                            <a href="{{ route('stands.show', $i) }}"
                               class="w-full btn-primary justify-center group">
                                Découvrir
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                            </a>
                        </div>
                    </div>
                @endfor
            @endforelse
        </div>

        <!-- Load More -->
        <div class="text-center mt-12 fade-in-section">
            <button class="btn-secondary px-8 py-4">
                <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                Charger Plus d'Exposants
            </button>
        </div>
    </div>
</div>
@endsection
