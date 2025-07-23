<!-- Admin Dashboard -->
<div class="space-y-8">
    <!-- Admin Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 animate-fade-in-up">
        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="store" class="w-6 h-6 text-blue-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $stands_total ?? '28' }}</div>
            <div class="text-white/60 text-sm">Stands Totaux</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-yellow-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="clock" class="w-6 h-6 text-yellow-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $stands_pending ?? '5' }}</div>
            <div class="text-white/60 text-sm">En Attente</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="users" class="w-6 h-6 text-green-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $utilisateurs_count ?? '142' }}</div>
            <div class="text-white/60 text-sm">Utilisateurs</div>
        </div>

        <div class="card p-6 text-center">
            <div class="w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="shopping-cart" class="w-6 h-6 text-purple-400"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $commandes_total ?? '876' }}</div>
            <div class="text-white/60 text-sm">Commandes Totales</div>
        </div>
    </div>

    <!-- Admin Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-in-section">
        <a href="{{ route('admin.stands.pending') }}" class="card card-hover p-6 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-yellow-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="clock" class="w-6 h-6 text-black"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-1">Approuver des Stands</h3>
                    <p class="text-white/60 text-sm">{{ $stands_pending ?? '5' }} demandes en attente</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.stands.index') }}" class="card card-hover p-6 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-blue-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="store" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-1">Gérer les Stands</h3>
                    <p class="text-white/60 text-sm">Administrer tous les stands</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.users.index') }}" class="card card-hover p-6 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="users" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-1">Gérer les Utilisateurs</h3>
                    <p class="text-white/60 text-sm">{{ $utilisateurs_count ?? '142' }} utilisateurs actifs</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Pending Approvals -->
    <div class="fade-in-section">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i data-lucide="alert-circle" class="w-6 h-6 mr-3 text-yellow-400"></i>
                Demandes d'Approbation
            </h2>
            <a href="{{ route('admin.stands.pending') }}"
               class="text-white/60 hover:text-white transition-colors duration-300 flex items-center">
                Voir toutes
                <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
            </a>
        </div>

        <div class="space-y-4">
            @forelse($stands_pending_list ?? [] as $stand)
                <div class="card p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden">
                                @if($stand->logo_url ?? false)
                                    <img src="{{ $stand->logo_url }}"
                                         alt="{{ $stand->nom }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i data-lucide="store" class="w-8 h-8 text-white/40"></i>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-white">
                                    {{ $stand->nom ?? 'Stand Example' }}
                                </h3>
                                <p class="text-white/60">
                                    {{ $stand->description ?? 'Description du stand' }}
                                </p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span class="text-sm text-white/40">
                                        Demandé le {{ $stand->created_at?->format('d/m/Y') ?? '15/07/2025' }}
                                    </span>
                                    <span class="status-badge status-pending">
                                        En attente
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <button onclick="approveStand({{ $stand->id ?? 1 }})"
                                    class="btn btn-success btn-sm">
                                <i data-lucide="check" class="w-4 h-4 mr-2"></i>
                                Approuver
                            </button>
                            <button onclick="rejectStand({{ $stand->id ?? 1 }})"
                                    class="btn btn-danger btn-sm">
                                <i data-lucide="x" class="w-4 h-4 mr-2"></i>
                                Rejeter
                            </button>
                            <a href="{{ route('admin.stands.show', $stand->id ?? 1) }}"
                               class="btn btn-outline btn-sm">
                                <i data-lucide="eye" class="w-4 h-4 mr-2"></i>
                                Voir
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Demo pending stands -->
                @for($i = 1; $i <= 3; $i++)
                    <div class="card p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl flex items-center justify-center">
                                    <i data-lucide="store" class="w-8 h-8 text-white/40"></i>
                                </div>

                                <div>
                                    <h3 class="text-lg font-bold text-white">
                                        {{ $i == 1 ? 'La Ferme Bio' : ($i == 2 ? 'Artisan Boulanger' : 'Spécialités Italiennes') }}
                                    </h3>
                                    <p class="text-white/60">
                                        {{ $i == 1 ? 'Produits biologiques locaux' : ($i == 2 ? 'Pain et viennoiseries artisanaux' : 'Importation directe d\'Italie') }}
                                    </p>
                                    <div class="flex items-center space-x-4 mt-2">
                                        <span class="text-sm text-white/40">
                                            Demandé le {{ date('d/m/Y', strtotime("-{$i} days")) }}
                                        </span>
                                        <span class="status-badge status-pending">
                                            En attente
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex space-x-3">
                                <button onclick="approveStand({{ $i }})"
                                        class="btn btn-success btn-sm">
                                    <i data-lucide="check" class="w-4 h-4 mr-2"></i>
                                    Approuver
                                </button>
                                <button onclick="rejectStand({{ $i }})"
                                        class="btn btn-danger btn-sm">
                                    <i data-lucide="x" class="w-4 h-4 mr-2"></i>
                                    Rejeter
                                </button>
                                <a href="{{ route('admin.stands.show', $i) }}"
                                   class="btn btn-outline btn-sm">
                                    <i data-lucide="eye" class="w-4 h-4 mr-2"></i>
                                    Voir
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            @endforelse
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="fade-in-section">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
            <i data-lucide="activity" class="w-6 h-6 mr-3"></i>
            Activité Récente
        </h2>

        <div class="card p-6">
            <div class="space-y-4">
                @for($i = 1; $i <= 5; $i++)
                    <div class="flex items-center space-x-4 pb-4 border-b border-white/10 last:border-b-0 last:pb-0">
                        <div class="w-10 h-10 {{ $i % 3 == 0 ? 'bg-green-500/20' : ($i % 2 == 0 ? 'bg-blue-500/20' : 'bg-yellow-500/20') }} rounded-xl flex items-center justify-center">
                            <i data-lucide="{{ $i % 3 == 0 ? 'check-circle' : ($i % 2 == 0 ? 'user-plus' : 'store') }}"
                               class="w-5 h-5 {{ $i % 3 == 0 ? 'text-green-400' : ($i % 2 == 0 ? 'text-blue-400' : 'text-yellow-400') }}"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-white">
                                @if($i % 3 == 0)
                                    Stand "{{ $i == 3 ? 'Délices du Terroir' : 'Boulangerie Martin' }}" approuvé
                                @elseif($i % 2 == 0)
                                    Nouvel utilisateur inscrit: {{ $i == 2 ? 'marie.dubois@email.com' : 'pierre.martin@email.com' }}
                                @else
                                    Nouvelle demande de stand: "{{ $i == 1 ? 'Fromages de Savoie' : 'Épices du Monde' }}"
                                @endif
                            </p>
                            <p class="text-white/60 text-sm">
                                Il y a {{ rand(1, 24) }} {{ rand(1, 24) > 1 ? 'heures' : 'heure' }}
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<script>
function approveStand(standId) {
    if (confirm('Êtes-vous sûr de vouloir approuver ce stand ?')) {
        // Here you would normally make an AJAX call to approve the stand
        showNotification('Stand approuvé avec succès', 'success');
        // Remove the stand from pending list or refresh the page
    }
}

function rejectStand(standId) {
    const reason = prompt('Raison du rejet (optionnel):');
    if (reason !== null) {
        // Here you would normally make an AJAX call to reject the stand
        showNotification('Stand rejeté', 'error');
        // Remove the stand from pending list or refresh the page
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
