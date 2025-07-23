<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Gestion des Stands</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-900">
                        Administration Eat&Drink
                    </h1>
                </div>
                <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-700">
                            Connecté en tant qu'admin
                        </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-900">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Messages de succès/erreur -->
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">!</span>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Demandes en attente
                                </dt>
                                <dd class="text-lg font-medium text-gray-900">
                                    {{ $stats['total_demandes'] }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">✓</span>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Stands approuvés
                                </dt>
                                <dd class="text-lg font-medium text-gray-900">
                                    {{ $stats['total_approuves'] }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">✗</span>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Stands rejetés
                                </dt>
                                <dd class="text-lg font-medium text-gray-900">
                                    {{ $stats['total_rejetes'] }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">👥</span>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Entrepreneurs
                                </dt>
                                <dd class="text-lg font-medium text-gray-900">
                                    {{ $stats['total_entrepreneurs'] }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Demandes en attente -->
        @if($demandesEnAttente->count() > 0)
            <div class="bg-white shadow overflow-hidden sm:rounded-md mb-8">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Demandes de stands en attente d'approbation
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Les nouvelles demandes nécessitent votre validation.
                    </p>
                </div>
                <ul class="divide-y divide-gray-200">
                    @foreach($demandesEnAttente as $demande)
                        <li>
                            <div class="px-4 py-4 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                        <span class="text-sm font-medium text-gray-700">
                                            {{ substr($demande->utilisateur->name, 0, 2) }}
                                        </span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $demande->nom_stand }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Par {{ $demande->utilisateur->name }} ({{ $demande->utilisateur->nom_entreprise }})
                                        </div>
                                        <div class="text-xs text-gray-400">
                                            Demandé le {{ $demande->created_at->format('d/m/Y à H:i') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.stands.show', $demande) }}"
                                       class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                        Voir détails
                                    </a>
                                    <form method="POST" action="{{ route('admin.stands.approve', $demande) }}"
                                          class="inline">
                                        @csrf
                                        <button type="submit"
                                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm"
                                                onclick="return confirm('Êtes-vous sûr de vouloir approuver ce stand ?')">
                                            Approuver
                                        </button>
                                    </form>
                                    <button onclick="openRejectModal({{ $demande->id }}, '{{ $demande->nom_stand }}')"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                        Rejeter
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="bg-white shadow sm:rounded-lg mb-8">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Aucune demande en attente
                    </h3>
                    <div class="mt-2 max-w-xl text-sm text-gray-500">
                        <p>Toutes les demandes de stands ont été traitées.</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Stands approuvés -->
        @if($standsApprouves->count() > 0)
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Stands approuvés récents
                    </h3>
                </div>
                <ul class="divide-y divide-gray-200">
                    @foreach($standsApprouves->take(5) as $stand)
                        <li>
                            <div class="px-4 py-4 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                        <span class="text-sm font-medium text-green-800">
                                            ✓
                                        </span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $stand->nom_stand }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $stand->utilisateur->name }} - {{ $stand->localisation }}
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-green-600 font-medium">
                                    Approuvé
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>
</div>

<!-- Modal de rejet -->
<div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg max-w-md w-full p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">
                Rejeter la demande
            </h3>
            <p class="text-sm text-gray-500 mb-4">
                Vous êtes sur le point de rejeter la demande de stand "<span id="standName"></span>".
            </p>
            <form id="rejectForm" method="POST" action="">
                @csrf
                <div class="mb-4">
                    <label for="motif_rejet" class="block text-sm font-medium text-gray-700 mb-2">
                        Motif du rejet (optionnel)
                    </label>
                    <textarea name="motif_rejet" id="motif_rejet" rows="3"
                              class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                              placeholder="Expliquez pourquoi cette demande est rejetée..."></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeRejectModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                        Rejeter la demande
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openRejectModal(standId, standName) {
        document.getElementById('standName').textContent = standName;
        document.getElementById('rejectForm').action = `/admin/stands/${standId}/reject`;
        document.getElementById('rejectModal').classList.remove('hidden');
    }

    function closeRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
        document.getElementById('motif_rejet').value = '';
    }
</script>
</body>
</html>
