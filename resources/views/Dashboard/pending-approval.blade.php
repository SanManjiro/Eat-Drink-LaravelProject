<!-- Pending Approval Dashboard -->
<div class="space-y-8 animate-fade-in-up">
    <!-- Status Card -->
    <div class="card p-8 text-center">
        <div class="w-24 h-24 bg-yellow-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <i data-lucide="clock" class="w-12 h-12 text-yellow-400 animate-pulse"></i>
        </div>

        <h2 class="text-3xl font-bold text-white mb-4">Demande en Cours d'Examen</h2>
        <p class="text-white/70 text-lg mb-8 leading-relaxed">
            Votre demande de stand est actuellement en cours d'examen par notre équipe.
            Vous recevrez une notification par email dès qu'elle sera approuvée.
        </p>

        <!-- Timeline -->
        <div class="max-w-md mx-auto mb-8">
            <div class="flex items-center justify-between">
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mb-2">
                        <i data-lucide="check" class="w-4 h-4 text-white"></i>
                    </div>
                    <span class="text-sm text-green-400 font-medium">Demande Soumise</span>
                </div>

                <div class="flex-1 h-px bg-yellow-500/30 mx-4"></div>

                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center mb-2 animate-pulse">
                        <i data-lucide="eye" class="w-4 h-4 text-white"></i>
                    </div>
                    <span class="text-sm text-yellow-400 font-medium">En Examen</span>
                </div>

                <div class="flex-1 h-px bg-white/20 mx-4"></div>

                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mb-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-white/50"></i>
                    </div>
                    <span class="text-sm text-white/50 font-medium">Approuvé</span>
                </div>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white/5 rounded-2xl p-6">
                <i data-lucide="clock" class="w-8 h-8 text-blue-400 mb-3"></i>
                <h3 class="font-semibold text-white mb-2">Délai Moyen</h3>
                <p class="text-white/60 text-sm">24-48 heures</p>
            </div>

            <div class="bg-white/5 rounded-2xl p-6">
                <i data-lucide="mail" class="w-8 h-8 text-green-400 mb-3"></i>
                <h3 class="font-semibold text-white mb-2">Notification</h3>
                <p class="text-white/60 text-sm">Par email</p>
            </div>

            <div class="bg-white/5 rounded-2xl p-6">
                <i data-lucide="phone" class="w-8 h-8 text-purple-400 mb-3"></i>
                <h3 class="font-semibold text-white mb-2">Support</h3>
                <p class="text-white/60 text-sm">24h/7j</p>
            </div>
        </div>
    </div>

    <!-- What's Next -->
    <div class="card p-8">
        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
            <i data-lucide="arrow-right" class="w-6 h-6 mr-3"></i>
            Que se passe-t-il ensuite ?
        </h3>

        <div class="space-y-4">
            <div class="flex items-start space-x-4">
                <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center mt-1">
                    <span class="text-blue-400 font-bold text-sm">1</span>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-1">Examen de votre profil</h4>
                    <p class="text-white/60 text-sm">Notre équipe vérifie les informations fournies et évalue votre candidature.</p>
                </div>
            </div>

            <div class="flex items-start space-x-4">
                <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center mt-1">
                    <span class="text-blue-400 font-bold text-sm">2</span>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-1">Validation et approbation</h4>
                    <p class="text-white/60 text-sm">Si votre profil correspond à nos critères, votre compte sera approuvé.</p>
                </div>
            </div>

            <div class="flex items-start space-x-4">
                <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center mt-1">
                    <span class="text-blue-400 font-bold text-sm">3</span>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-1">Accès à votre tableau de bord</h4>
                    <p class="text-white/60 text-sm">Vous pourrez alors ajouter vos produits et gérer votre stand.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('home') }}" class="btn-secondary justify-center py-4">
            <i data-lucide="home" class="w-5 h-5 mr-2"></i>
            Retour à l'Accueil
        </a>

        <a href="{{ route('stands.index') }}" class="btn-primary justify-center py-4">
            <i data-lucide="eye" class="w-5 h-5 mr-2"></i>
            Découvrir les Stands
        </a>
    </div>
</div>
