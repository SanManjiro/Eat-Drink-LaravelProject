<!-- Entrepreneur Dashboard -->
<div class="space-y-8 animate-fade-in-up">
    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="package" class="w-6 h-6 text-blue-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $produits_count ?? 0 }}</div>
            <div class="text-white/60 text-sm">Produits</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="shopping-cart" class="w-6 h-6 text-green-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $commandes_count ?? 0 }}</div>
            <div class="text-white/60 text-sm">Commandes</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-yellow-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="euro" class="w-6 h-6 text-yellow-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ number_format($revenus ?? 0, 2) }}€</div>
            <div class="text-white/60 text-sm">Revenus</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="eye" class="w-6 h-6 text-purple-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $vues_stand ?? 0 }}</div>
            <div class="text-white/60 text-sm">Vues du Stand</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card p-8">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
            <i data-lucide="zap" class="w-6 h-6 mr-3"></i>
            Actions Rapides
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('produits.create') }}" class="bg-white/5 hover:bg-white/10 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 group">
                <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="plus" class="w-6 h-6 text-green-400"></i>
                </div>
                <h3 class="font-semibold text-white mb-2">Ajouter un Produit</h3>
                <p class="text-white/60 text-sm">Enrichissez votre catalogue avec de nouveaux produits</p>
            </a>

            <a href="{{ route('produits.index') }}" class="bg-white/5 hover:bg-white/10 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 group">
                <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="package" class="w-6 h-6 text-blue-400"></i>
                </div>
                <h3 class="font-semibold text-white mb-2">Gérer mes Produits</h3>
                <p class="text-white/60 text-sm">Modifiez ou supprimez vos produits existants</p>
            </a>

            <a href="{{ route('commandes.index') }}" class="bg-white/5 hover:bg-white/10 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 group">
                <div class="w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="list-checks" class="w-6 h-6 text-purple-400"></i>
                </div>
                <h3 class="font-semibold text-white mb-2">Mes Commandes</h3>
                <p class="text-white/60 text-sm">Consultez et gérez vos commandes reçues</p>
            </a>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="card p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i data-lucide="package" class="w-6 h-6 mr-3"></i>
                Produits Récents
            </h2>
            <a href="{{ route('produits.index') }}" class="text-white/60 hover:text-white transition-colors duration-300">
                Voir tout
                <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
            </a>
        </div>

        @if(isset($recent_produits) && $recent_produits->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($recent_produits as $produit)
                    <div class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition-all duration-300">
                        @if($produit->image_url)
                            <img src="{{ $produit->image_url }}" alt="{{ $produit->nom }}"
                                 class="w-full h-32 object-cover rounded-xl mb-4">
                        @else
                            <div class="w-full h-32 bg-white/10 rounded-xl flex items-center justify-center mb-4">
                                <i data-lucide="image" class="w-8 h-8 text-white/40"></i>
                            </div>
                        @endif

                        <h3 class="font-semibold text-white mb-2">{{ $produit->nom }}</h3>
                        <p class="text-white/60 text-sm mb-3 line-clamp-2">{{ $produit->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-white">{{ number_format($produit->prix, 2) }}€</span>
                            <a href="{{ route('produits.edit', $produit) }}"
                               class="text-blue-400 hover:text-blue-300 transition-colors duration-300">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i data-lucide="package" class="w-16 h-16 text-white/20 mx-auto mb-4"></i>
                <h3 class="text-xl font-semibold text-white/60 mb-2">Aucun produit pour le moment</h3>
                <p class="text-white/40 mb-6">Commencez par ajouter votre premier produit !</p>
                <a href="{{ route('produits.create') }}" class="btn-primary">
                    <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                    Ajouter un Produit
                </a>
            </div>
        @endif
    </div>

    <!-- Recent Orders -->
    <div class="card p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i data-lucide="shopping-cart" class="w-6 h-6 mr-3"></i>
                Commandes Récentes
            </h2>
            <a href="{{ route('commandes.index') }}" class="text-white/60 hover:text-white transition-colors duration-300">
                Voir tout
                <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
            </a>
        </div>

        @if(isset($recent_commandes) && $recent_commandes->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-white/10">
                            <th class="text-left py-3 text-white/60 font-medium">Date</th>
                            <th class="text-left py-3 text-white/60 font-medium">Produits</th>
                            <th class="text-left py-3 text-white/60 font-medium">Total</th>
                            <th class="text-left py-3 text-white/60 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent_commandes as $commande)
                            <tr class="border-b border-white/5">
                                <td class="py-4 text-white">{{ $commande->created_at->format('d/m/Y H:i') }}</td>
                                <td class="py-4 text-white/70">
                                    {{ count(json_decode($commande->details_commande, true)) }} produit(s)
                                </td>
                                <td class="py-4 text-white font-semibold">{{ number_format($commande->total ?? 0, 2) }}€</td>
                                <td class="py-4">
                                    <a href="{{ route('commandes.show', $commande) }}"
                                       class="text-blue-400 hover:text-blue-300 transition-colors duration-300">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <i data-lucide="shopping-cart" class="w-16 h-16 text-white/20 mx-auto mb-4"></i>
                <h3 class="text-xl font-semibold text-white/60 mb-2">Aucune commande pour le moment</h3>
                <p class="text-white/40">Les commandes apparaîtront ici une fois que les clients commenceront à acheter vos produits.</p>
            </div>
        @endif
    </div>
</div>
