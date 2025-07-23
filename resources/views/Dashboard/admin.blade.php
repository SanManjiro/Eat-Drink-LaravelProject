<!-- Admin Dashboard -->
<div class="space-y-8 animate-fade-in-up">
    <!-- Admin Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-yellow-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="clock" class="w-6 h-6 text-yellow-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $demandes_attente ?? 0 }}</div>
            <div class="text-white/60 text-sm">Demandes en Attente</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="users" class="w-6 h-6 text-green-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $entrepreneurs_approuves ?? 0 }}</div>
            <div class="text-white/60 text-sm">Entrepreneurs Approuvés</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="store" class="w-6 h-6 text-blue-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $stands_actifs ?? 0 }}</div>
            <div class="text-white/60 text-sm">Stands Actifs</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="shopping-cart" class="w-6 h-6 text-purple-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $commandes_totales ?? 0 }}</div>
            <div class="text-white/60 text-sm">Commandes Totales</div>
        </div>
    </div>

    <!-- Pending Approvals -->
    <div class="card p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i data-lucide="user-check" class="w-6 h-6 mr-3"></i>
                Demandes d'Approbation
                @if(isset($demandes_attente) && $demandes_attente > 0)
                    <span class="ml-3 bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $demandes_attente }}
                    </span>
                @endif
            </h2>
        </div>

        @if(isset($demandes_en_attente) && $demandes_en_attente->count() > 0)
            <div class="space-y-4">
                @foreach($demandes_en_attente as $demande)
                    <div class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center">
                                        <i data-lucide="building" class="w-6 h-6 text-white/70"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-white text-lg">{{ $demande->nom_entreprise }}</h3>
                                        <p class="text-white/60">{{ $demande->email }}</p>
                                        <p class="text-white/40 text-sm">Demande soumise le {{ $demande->created_at->format('d/m/Y à H:i') }}</p>
                                    </div>
                                </div>

                                @if($demande->description)
                                    <div class="mt-4 pl-16">
                                        <p class="text-white/70 line-clamp-2">{{ $demande->description }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center space-x-3">
                                <form method="POST" action="{{ route('admin.approve-user', $demande) }}" class="inline">
                                    @csrf
                                    <button type="submit"
                                            class="bg-green-500/20 hover:bg-green-500/30 text-green-400 px-4 py-2 rounded-xl font-medium transition-all duration-300 flex items-center space-x-2">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                        <span>Approuver</span>
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.reject-user', $demande) }}" class="inline">
                                    @csrf
                                    <button type="submit"
                                            class="bg-red-500/20 hover:bg-red-500/30 text-red-400 px-4 py-2 rounded-xl font-medium transition-all duration-300 flex items-center space-x-2"
                                            onclick="return confirm('Êtes-vous sûr de vouloir rejeter cette demande ?')">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                        <span>Rejeter</span>
                                    </button>
                                </form>

                                <a href="{{ route('admin.user-details', $demande) }}"
                                   class="bg-blue-500/20 hover:bg-blue-500/30 text-blue-400 px-4 py-2 rounded-xl font-medium transition-all duration-300 flex items-center space-x-2">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                    <span>Détails</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i data-lucide="check-circle" class="w-16 h-16 text-green-400 mx-auto mb-4"></i>
                <h3 class="text-xl font-semibold text-white/60 mb-2">Aucune demande en attente</h3>
                <p class="text-white/40">Toutes les demandes ont été traitées !</p>
            </div>
        @endif
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Entrepreneurs -->
        <div class="card p-8">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                <i data-lucide="users" class="w-5 h-5 mr-3"></i>
                Nouveaux Entrepreneurs
            </h3>

            @if(isset($recent_entrepreneurs) && $recent_entrepreneurs->count() > 0)
                <div class="space-y-4">
                    @foreach($recent_entrepreneurs as $entrepreneur)
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-green-500/20 rounded-xl flex items-center justify-center">
                                <i data-lucide="building" class="w-5 h-5 text-green-400"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-white">{{ $entrepreneur->nom_entreprise }}</h4>
                                <p class="text-white/60 text-sm">Approuvé le {{ $entrepreneur->updated_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="status-approved">Actif</div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-white/60 text-center py-8">Aucun nouvel entrepreneur récemment</p>
            @endif
        </div>

        <!-- Recent Orders -->
        <div class="card p-8">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
                Commandes Récentes
            </h3>

            @if(isset($recent_orders) && $recent_orders->count() > 0)
                <div class="space-y-4">
                    @foreach($recent_orders as $order)
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium text-white">Commande #{{ $order->id }}</h4>
                                <p class="text-white/60 text-sm">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="text-right">
                                <div class="font-semibold text-white">{{ number_format($order->total ?? 0, 2) }}€</div>
                                <div class="text-white/60 text-sm">{{ $order->stand->nom_stand ?? 'Stand inconnu' }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-white/60 text-center py-8">Aucune commande récente</p>
            @endif
        </div>
    </div>

    <!-- Quick Admin Actions -->
    <div class="card p-8">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
            <i data-lucide="settings" class="w-6 h-6 mr-3"></i>
            Actions Administrateur
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('admin.users') }}" class="bg-white/5 hover:bg-white/10 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 group">
                <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="users" class="w-6 h-6 text-blue-400"></i>
                </div>
                <h3 class="font-semibold text-white mb-2">Gérer les Utilisateurs</h3>
                <p class="text-white/60 text-sm">Voir et gérer tous les utilisateurs de la plateforme</p>
            </a>

            <a href="{{ route('admin.stands') }}" class="bg-white/5 hover:bg-white/10 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 group">
                <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="store" class="w-6 h-6 text-green-400"></i>
                </div>
                <h3 class="font-semibold text-white mb-2">Gérer les Stands</h3>
                <p class="text-white/60 text-sm">Superviser tous les stands et leurs produits</p>
            </a>

            <a href="{{ route('admin.orders') }}" class="bg-white/5 hover:bg-white/10 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 group">
                <div class="w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="list-checks" class="w-6 h-6 text-purple-400"></i>
                </div>
                <h3 class="font-semibold text-white mb-2">Toutes les Commandes</h3>
                <p class="text-white/60 text-sm">Consulter toutes les commandes de la plateforme</p>
            </a>
        </div>
    </div>
</div>
