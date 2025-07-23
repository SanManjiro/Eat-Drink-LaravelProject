@extends('layouts.app')

@section('title', 'Détail du Stand')

@section('content')
<div class="min-h-screen pt-24 pb-12 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-8 animate-fade-in-up">
            <div class="flex items-center space-x-2 text-white/60">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors duration-300">Accueil</a>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                <a href="{{ route('stands.liste') }}" class="hover:text-white transition-colors duration-300">Exposants</a>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                <span class="text-white">{{ $stand->nom_stand ?? 'Stand' }}</span>
            </div>
        </nav>

        <!-- Stand Header -->
        <div class="card mb-12 overflow-hidden animate-fade-in-up">
            <div class="relative h-64 md:h-80 bg-gradient-to-br from-gray-800 to-gray-900">
                @if($stand->image_url ?? false)
                    <img src="{{ $stand->image_url }}"
                         alt="{{ $stand->nom_stand }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <i data-lucide="chef-hat" class="w-32 h-32 text-white/20"></i>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>

                <!-- Stand Info Overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-8">
                    <div class="flex items-end justify-between">
                        <div>
                            <h1 class="text-4xl md:text-5xl font-black text-white mb-4">
                                {{ $stand->nom_stand ?? 'La Petite France' }}
                            </h1>
                            <div class="flex items-center space-x-6 text-white/80">
                                <div class="flex items-center space-x-2">
                                    <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-current"></i>
                                    <span class="font-medium">4.8</span>
                                    <span class="text-white/60">(127 avis)</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i data-lucide="clock" class="w-5 h-5"></i>
                                    <span>Ouvert maintenant</span>
                                </div>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        <div class="status-approved">
                            <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                            Stand Vérifié
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Description -->
                <div class="card p-8 fade-in-section">
                    <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                        <i data-lucide="info" class="w-6 h-6 mr-3"></i>
                        À propos de ce stand
                    </h2>
                    <p class="text-white/70 leading-relaxed text-lg">
                        {{ $stand->description ?? 'Spécialités françaises traditionnelles préparées avec des ingrédients de première qualité. Notre équipe passionnée vous propose une sélection de produits authentiques dans le respect des traditions culinaires françaises. Découvrez nos terrines artisanales, nos fromages affinés et nos délicieuses pâtisseries faites maison.' }}
                    </p>
                </div>

                <!-- Products -->
                <div class="fade-in-section">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-3xl font-bold text-white flex items-center">
                            <i data-lucide="package" class="w-8 h-8 mr-3"></i>
                            Nos Produits
                        </h2>
                        <div class="text-white/60">
                            {{ count($produits ?? []) ?: '8' }} produits disponibles
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($produits ?? [] as $produit)
                            <div class="card card-hover group">
                                <div class="relative h-48 bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden">
                                    @if($produit->image_url ?? false)
                                        <img src="{{ $produit->image_url }}"
                                             alt="{{ $produit->nom }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i data-lucide="package" class="w-16 h-16 text-white/20"></i>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                                    <!-- Price Badge -->
                                    <div class="absolute top-4 right-4 bg-white text-black px-3 py-1 rounded-full font-bold">
                                        {{ number_format($produit->prix ?? 15.99, 2) }}€
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h3 class="text-lg font-bold text-white mb-2">
                                        {{ $produit->nom ?? 'Produit Artisanal' }}
                                    </h3>
                                    <p class="text-white/60 text-sm mb-4 line-clamp-2">
                                        {{ $produit->description ?? 'Description du produit avec ses caractéristiques et ses ingrédients de qualité.' }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <span class="text-xl font-bold text-white">
                                            {{ number_format($produit->prix ?? 15.99, 2) }}€
                                        </span>
                                        <button onclick="addToCart({{ $produit->id ?? 1 }})"
                                                class="btn-primary px-4 py-2">
                                            <i data-lucide="shopping-cart" class="w-4 h-4 mr-2"></i>
                                            Ajouter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- Demo products -->
                            @for($i = 1; $i <= 8; $i++)
                                <div class="card card-hover group">
                                    <div class="relative h-48 bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden">
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i data-lucide="package" class="w-16 h-16 text-white/20"></i>
                                        </div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                                        <div class="absolute top-4 right-4 bg-white text-black px-3 py-1 rounded-full font-bold">
                                            {{ number_format(rand(8, 25) + 0.99, 2) }}€
                                        </div>
                                    </div>

                                    <div class="p-6">
                                        <h3 class="text-lg font-bold text-white mb-2">
                                            {{ $i == 1 ? 'Terrine du Chef' : ($i == 2 ? 'Fromage Affiné' : ($i == 3 ? 'Pain Artisanal' : ($i == 4 ? 'Confiture Maison' : ($i == 5 ? 'Pâté de Campagne' : ($i == 6 ? 'Tarte Tatin' : ($i == 7 ? 'Miel de Lavande' : 'Saucisson Sec')))))) }}
                                        </h3>
                                        <p class="text-white/60 text-sm mb-4 line-clamp-2">
                                            {{ $i <= 4 ? 'Produit artisanal préparé selon les traditions françaises avec des ingrédients sélectionnés.' : 'Spécialité de la maison élaborée avec passion et savoir-faire traditionnel.' }}
                                        </p>

                                        <div class="flex items-center justify-between">
                                            <span class="text-xl font-bold text-white">
                                                {{ number_format(rand(8, 25) + 0.99, 2) }}€
                                            </span>
                                            <button onclick="addToCart({{ $i }})"
                                                    class="btn-primary px-4 py-2">
                                                <i data-lucide="shopping-cart" class="w-4 h-4 mr-2"></i>
                                                Ajouter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Stand Info -->
                <div class="card p-6 fade-in-section">
                    <h3 class="text-xl font-bold text-white mb-6">Informations</h3>

                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <i data-lucide="user" class="w-5 h-5 text-white/60"></i>
                            <div>
                                <div class="text-white font-medium">Propriétaire</div>
                                <div class="text-white/60 text-sm">{{ $stand->utilisateur->nom_entreprise ?? 'Jean Dupont' }}</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <i data-lucide="mail" class="w-5 h-5 text-white/60"></i>
                            <div>
                                <div class="text-white font-medium">Contact</div>
                                <div class="text-white/60 text-sm">{{ $stand->utilisateur->email ?? 'contact@lapetiteframe.fr' }}</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <i data-lucide="clock" class="w-5 h-5 text-white/60"></i>
                            <div>
                                <div class="text-white font-medium">Horaires</div>
                                <div class="text-white/60 text-sm">9h00 - 18h00</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <i data-lucide="package" class="w-5 h-5 text-white/60"></i>
                            <div>
                                <div class="text-white font-medium">Produits</div>
                                <div class="text-white/60 text-sm">{{ count($produits ?? []) ?: '8' }} articles</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card p-6 fade-in-section">
                    <h3 class="text-xl font-bold text-white mb-6">Actions</h3>

                    <div class="space-y-3">
                        <a href="{{ route('cart.index') }}" class="w-full btn-primary justify-center">
                            <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                            Voir mon Panier
                        </a>

                        <button class="w-full btn-secondary justify-center">
                            <i data-lucide="heart" class="w-5 h-5 mr-2"></i>
                            Ajouter aux Favoris
                        </button>

                        <button class="w-full btn-secondary justify-center">
                            <i data-lucide="share-2" class="w-5 h-5 mr-2"></i>
                            Partager
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function addToCart(productId) {
    // Show success notification
    showNotification('Produit ajouté au panier !', 'success');

    // Update cart counter if exists
    const cartCounter = document.querySelector('header .animate-pulse');
    if (cartCounter) {
        const currentCount = parseInt(cartCounter.textContent) || 0;
        cartCounter.textContent = currentCount + 1;
    }
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type} animate-slide-in-bottom`;
    notification.innerHTML = `
        <div class="flex items-center space-x-3">
            <i data-lucide="${type === 'success' ? 'check-circle' : 'alert-circle'}" class="w-6 h-6"></i>
            <span>${message}</span>
        </div>
    `;

    document.body.appendChild(notification);
    lucide.createIcons();

    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}
</script>
@endsection
