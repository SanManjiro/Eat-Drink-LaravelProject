@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-black to-gray-900">
        <div class="max-w-md w-full space-y-8">
            <div class="card p-8 animate-fade-in-up">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center shadow-glow">
                            <i data-lucide="log-in" class="w-8 h-8 text-black"></i>
                        </div>
                    </div>
                    <h2 class="text-3xl font-black text-white mb-2">Connexion</h2>
                    <p class="text-white/60">Accédez à votre espace personnel</p>
                </div>

                <!-- Affichage des erreurs -->
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-2xl bg-red-500/20 border border-red-500/30">
                        <div class="flex items-center space-x-2 text-red-300">
                            <i data-lucide="alert-circle" class="w-5 h-5"></i>
                            <span class="font-medium">Erreurs de connexion</span>
                        </div>
                        <ul class="mt-2 text-red-300/80 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulaire -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="form-label">
                            <i data-lucide="mail" class="w-5 h-5 inline mr-2"></i>
                            Adresse Email
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autocomplete="email"
                               autofocus
                               class="form-input"
                               placeholder="votre@email.com">
                    </div>

                    <!-- Mot de passe -->
                    <div>
                        <label for="password" class="form-label">
                            <i data-lucide="lock" class="w-5 h-5 inline mr-2"></i>
                            Mot de Passe
                        </label>
                        <input type="password"
                               id="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               class="form-input"
                               placeholder="Votre mot de passe">
                    </div>

                    <!-- Se souvenir de moi -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox"
                                   name="remember"
                                   class="rounded border-white/20 bg-white/5 text-white focus:ring-white/30 focus:ring-offset-0">
                            <span class="ml-2 text-white/70">Se souvenir de moi</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-white/60 hover:text-white transition-colors duration-300">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <!-- Bouton de connexion -->
                    <button type="submit" class="w-full btn-primary justify-center py-4">
                        <i data-lucide="log-in" class="w-5 h-5 mr-2"></i>
                        Se Connecter
                    </button>
                </form>

                <!-- Lien d'inscription -->
                <div class="mt-8 text-center">
                    <p class="text-white/60">
                        Pas encore de compte ?
                        <a href="{{ route('register') }}"
                           class="text-white hover:text-gray-300 font-medium transition-colors duration-300">
                            Inscrivez-vous ici
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
