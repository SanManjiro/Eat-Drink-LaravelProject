@extends('layouts.app')

@section('title', $stand->nom_stand)

@section('content')
<div class="min-h-screen pt-24 pb-12 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-8 animate-fade-in-up">
            <div class="flex items-center space-x-2 text-white/60">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors duration-300">Accueil</a>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                <a href="{{ route('stands.index') }}" class="hover:text-white transition-colors duration-300">Exposants</a>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                <span class="text-white">{{ $stand->nom_stand }}</span>
            </div>
        </nav>

        <!-- Stand Header -->
        <div class="card p-8 mb-12 animate-fade-in-up">
            <div class="flex flex-col lg:flex-row items-start lg:items-center space-y-6 lg:space-y-0 lg:space-x-8">
                <div class="w-32 h-32 bg-white/10 rounded-3xl flex items-center justify-center shadow-glow">
                    <i data-lucide="chef-hat" class="w-16 h-16 text-white/70"></i>
                </div>

                <div class="flex-1">
                    <h1 class="text-5xl font-black text-white mb-4">{{ $stand->nom_stand }}</h1>
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="flex items-center space-x-2 text-white/70">
                            <i data-lucide="building" class="w-5 h-5"></i>
                            <span>{{ $stand->utilisateur->nom_entreprise }}</span>
                        </div>
                        <div class="flex items-center space-x-2 text-white/70">
                            <i data-lucide="package" class="w-5 h-5"></i>
                            <span>{{ $stand->produits->count() }} produit(s)</span>
                        </div>
                    </div>

                    @if($stand->description)
                        <p class="text-white/80 text-lg leading-relaxed">{{ $stand->description }}</p>
                    @endif
                </div>

                <!-- Quick Actions -->
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('cart.index') }}" class="btn-secondary">
                        <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                        Voir Panier
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="ml-2 bg-white/20 text-white px-2 py-1 rounded-full text-xs">
                                {{ array_sum(array_column(session('cart'), 'quantity')) }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="animate-fade-in-up">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-white flex items-center">
                    <i data-lucide="package" class="w-8 h-8 mr-3"></i>
                    Nos Produits
                </h2>

                <!-- Search Products -->
                <div class="relative">
                    <input type="text"
                           id="product-search"
                           placeholder="Rechercher un produit..."
                           class="form-input pl-10 w-64">
                    <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-white/50"></i>
                </div>
            </div>

            @if($stand->produits && $stand->produits->count() > 0)
                <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($stand->produits as $produit)
                        <div class="product-card card card-hover" data-product-name="{{ strtolower($produit->nom) }}" data-product-description="{{ strtolower($produit->description) }}">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden">
                                @if($produit->image_url)
                                    <img src="{{ $produit->image_url }}"
                                         alt="{{ $produit->nom }}"
                                         class="w-full h-64 object-cover">
                                @else
                                    <div class="w-full h-64 bg-white/10 flex items-center justify-center">
                                        <i data-lucide="image" class="w-16 h-16 text-white/40"></i>
                                    </div>
                                @endif

                                <!-- Price Badge -->
                                <div class="absolute top-4 right-4 bg-white text-black px-4 py-2 rounded-2xl font-bold shadow-lg">
                                    {{ number_format($produit->prix, 2) }}€
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-white mb-3">{{ $produit->nom }}</h3>

                                @if($produit->description)
                                    <p class="text-white/70 mb-6 line-clamp-3">{{ $produit->description }}</p>
                                @endif

                                <!-- Add to Cart Form -->
                                <form method="POST" action="{{ route('cart.add', $produit) }}" class="space-y-4">
                                    @csrf
                                    <div class="flex items-center space-x-4">
                                        <label for="quantity-{{ $produit->id }}" class="text-white/80 font-medium">Quantité :</label>
                                        <div class="flex items-center space-x-2">
                                            <button type="button"
                                                    onclick="decreaseQuantity({{ $produit->id }})"
                                                    class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center hover:bg-white/20 transition-colors duration-300">
                                                <i data-lucide="minus" class="w-4 h-4 text-white"></i>
                                            </button>
                                            <input type="number"
                                                   id="quantity-{{ $produit->id }}"
                                                   name="quantity"
                                                   value="1"
                                                   min="1"
                                                   max="10"
                                                   class="w-16 px-3 py-2 bg-white/5 border border-white/20 rounded-lg text-white text-center">
                                            <button type="button"
                                                    onclick="increaseQuantity({{ $produit->id }})"
                                                    class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center hover:bg-white/20 transition-colors duration-300">
                                                <i data-lucide="plus" class="w-4 h-4 text-white"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button type="submit" class="w-full btn-primary justify-center">
                                        <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                                        Ajouter au Panier
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="card p-12 text-center">
                    <i data-lucide="package-x" class="w-24 h-24 text-white/20 mx-auto mb-6"></i>
                    <h3 class="text-2xl font-bold text-white/60 mb-4">Aucun produit disponible</h3>
                    <p class="text-white/40">Ce stand n'a pas encore ajouté de produits.</p>
                </div>
            @endif
        </div>

        <!-- Back to Stands -->
        <div class="mt-16 text-center">
            <a href="{{ route('stands.index') }}" class="btn-secondary">
                <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                Retour aux Exposants
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Product search functionality
document.getElementById('product-search').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const productCards = document.querySelectorAll('.product-card');

    productCards.forEach(card => {
        const productName = card.dataset.productName;
        const productDescription = card.dataset.productDescription;

        if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
            card.style.display = 'block';
            card.classList.add('animate-fade-in-up');
        } else {
            card.style.display = 'none';
        }
    });
});

// Quantity controls
function increaseQuantity(productId) {
    const input = document.getElementById('quantity-' + productId);
    const currentValue = parseInt(input.value);
    const maxValue = parseInt(input.max);

    if (currentValue < maxValue) {
        input.value = currentValue + 1;
    }
}

function decreaseQuantity(productId) {
    const input = document.getElementById('quantity-' + productId);
    const currentValue = parseInt(input.value);
    const minValue = parseInt(input.min);

    if (currentValue > minValue) {
        input.value = currentValue - 1;
    }
}

// Add to cart success notification
@if(session('cart_success'))
    // Create notification
    const notification = document.createElement('div');
    notification.className = 'notification notification-success';
    notification.innerHTML = `
        <div class="flex items-center space-x-3">
            <i data-lucide="check-circle" class="w-6 h-6"></i>
            <div>
                <h4 class="font-semibold">Produit ajouté !</h4>
                <p class="text-sm opacity-90">{{ session('cart_success') }}</p>
            </div>
        </div>
    `;

    document.body.appendChild(notification);

    // Initialize lucide icons for the notification
    lucide.createIcons();

    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
@endif
</script>
@endpush
@endsection
