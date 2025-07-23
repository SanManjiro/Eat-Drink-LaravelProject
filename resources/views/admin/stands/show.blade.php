<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la demande - {{ $stand->nom_stand }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.stands.index') }}" class="text-indigo-600 hover:text-indigo-900 mr-4">
                        ← Retour
                    </a>
                    <h1 class="text-xl font-semibold text-gray-900">
                        Détails de la demande
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
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

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <!-- Header du stand -->
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $stand->nom_stand }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Demande soumise le {{ $stand->created_at->format('d/m/Y à H:i') }}
                        </p>
                    </div>
                    <div class="flex items-center">
                        @if($stand->statut === 'en_attente')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    En attente
                                </span>
                        @elseif($stand->statut === 'approuve')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Approuvé
                                </span>
                        @elseif($stand->statut === 'rejete')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Rejeté
                                </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Détails du stand -->
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nom du stand
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->nom_stand }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Description
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->description }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Localisation souhaitée
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->localisation ?? 'Non spécifiée' }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Horaires prévus
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->horaires ?? 'Non spécifiés' }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Téléphone de contact
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->telephone ?? 'Non renseigné' }}
                        </dd>
                    </div>
                </dl>
            </div>

            <!-- Informations sur l'entrepreneur -->
            <div class="border-t border-gray-200">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Informations sur l'entrepreneur
                    </h3>
                </div>
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nom complet
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->utilisateur->name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->utilisateur->email }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nom de l'entreprise
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->utilisateur->nom_entreprise ?? 'Non renseigné' }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Téléphone
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->utilisateur->telephone ?? 'Non renseigné' }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Adresse
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $stand->utilisateur->adresse ?? 'Non renseignée' }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Statut du compte
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @if($stand->utilisateur->role === 'entrepreneur_en_attente')
                                <span class="text-yellow-600">En attente d'approbation</span>
                            @elseif($stand->utilisateur->role === 'entrepreneur_approuve')
                                <span class="text-green-600">Entrepreneur approuvé</span>
                            @else
                                {{ ucfirst($stand->utilisateur->role) }}
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>

            @if($stand->statut === 'rejete' && $stand->motif_rejet)
                <!-- Motif de rejet -->
                <div class="border-t border-gray-200">
                    <div class="bg-red-50 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-red-900">
                            Motif du rejet
                        </h3>
                        <p class="mt-2 text-sm text-red-700">
                            {{ $stand->motif_rejet }}
                        </p>
                    </div>
                </div>
            @endif

            <!-- Actions -->
            @if($stand->statut === 'en_attente')
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <div class="flex justify-end space-x-3">
                        <button onclick="openRejectModal({{ $stand->id }}, '{{ $stand->nom_stand }}')"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Rejeter la demande
                        </button>
                        <form method="POST" action="{{ route('admin.stands.approve', $stand) }}" class="inline">
                            @csrf
                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium"
                                    onclick="return confirm('Êtes-vous sûr de vouloir approuver ce stand ?')">
                                Approuver la demande
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
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
