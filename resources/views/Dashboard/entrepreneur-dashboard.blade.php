<!-- Entrepreneur Dashboard -->
<div class="space-y-8">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 animate-fade-in-up">
        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="package" class="w-6 h-6 text-blue-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $produits_count ?? '12' }}</div>
            <div class="text-white/60 text-sm">Produits</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="shopping-cart" class="w-6 h-6 text-green-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $commandes_count ?? '34' }}</div>
            <div class="text-white/60 text-sm">Commandes</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="euro" class="w-6 h-6 text-purple-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $revenus ?? '1,245' }}€</div>
            <div class="text-white/60 text-sm">Revenus</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-yellow-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="star" class="w-6 h-6 text-yellow-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">4.8</div>
            <div class="text-white/60 text-sm">Note Moyenne</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-in-section">
        <a href="{{ route('entrepreneur.produits.create') }}" class="card card-hover p-6 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="plus" class="w-6 h-6 text-black"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-1">Ajouter un Produit</h3>
                    <p class="text-white/60 text-sm">Enrichissez votre catalogue</p>
                </div>
            </div>
        </a>

        <a href="{{ route('entrepreneur.commandes.index') }}" class="card card-hover p-6 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="list" class="w-6 h-6 text-black"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-1">Voir les Commandes</h3>
                    <p class="text-white/60 text-sm">Gérez vos ventes</p>
                </div>
            </div>
        </a>

        <a href="{{ route('entrepreneur.stand.edit') }}" class="card card-hover p-6 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="settings" class="w-6 h-6 text-black"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-1">Modifier mon Stand</h3>
                    <p class="text-white/60 text-sm">Personnalisez votre profil</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Recent Products -->
    <div class="fade-in-section">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i data-lucide="package" class="w-6 h-6 mr-3"></i>
                Mes Produits Récents
            </h2>
            <a href="{{ route('entrepreneur.produits.index') }}"
               class="text-white/60 hover:text-white transition-colors duration-300 flex items-center">
                Voir tout
                <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($produits_recents ?? [] as $produit)
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

                        <div class="absolute top-4 right-4 bg-white text-black px-3 py-1 rounded-full font-bold">
                            {{ number_format($produit->prix ?? 15.99, 2) }}€
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white mb-2">
                            {{ $produit->nom ?? 'Produit' }}
                        </h3>
                        <p class="text-white/60 text-sm mb-4 line-clamp-2">
                            {{ $produit->description ?? 'Description du produit' }}
                        </p>

                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-white">
                                {{ number_format($produit->prix ?? 15.99, 2) }}€
                            </span>
                            <div class="flex space-x-2">
                                <a href="{{ route('entrepreneur.produits.edit', $produit->id ?? 1) }}"
                                   class="p-2 text-blue-400 hover:text-blue-300 hover:bg-blue-500/10 rounded-xl transition-all duration-300">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                </a>
                                <button onclick="deleteProduct({{ $produit->id ?? 1 }})"
                                        class="p-2 text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-xl transition-all duration-300">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Demo products -->
                @for($i = 1; $i <= 3; $i++)
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
                                {{ $i == 1 ? 'Terrine du Chef' : ($i == 2 ? 'Fromage Affiné' : 'Pain Artisanal') }}
                            </h3>
                            <p class="text-white/60 text-sm mb-4 line-clamp-2">
                                Produit artisanal de qualité préparé avec soin et passion.
                            </p>

                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-white">
                                    {{ number_format(rand(8, 25) + 0.99, 2) }}€
                                </span>
                                <div class="flex space-x-2">
                                    <a href="{{ route('entrepreneur.produits.edit', $i) }}"
                                       class="p-2 text-blue-400 hover:text-blue-300 hover:bg-blue-500/10 rounded-xl transition-all duration-300">
                                        <i data-lucide="edit" class="w-4 h-4"></i>
                                    </a>
                                    <button onclick="deleteProduct({{ $i }})"
                                            class="p-2 text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-xl transition-all duration-300">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @endforelse
        </div>
    </div>
</div>

<script>
function deleteProduct(productId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
        // Here you would normally make an AJAX call to delete the product
        showNotification('Produit supprimé avec succès', 'success');
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
