<footer class="bg-gradient-to-b from-gray-900 to-black border-t border-white/10 pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <!-- Logo et description -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center">
                        <i data-lucide="chef-hat" class="w-7 h-7 text-black"></i>
                    </div>
                    <span class="font-black text-3xl text-white">Eat&Drink</span>
                </div>
                <p class="text-white/60 text-lg leading-relaxed mb-8 max-w-md">
                    L'événement culinaire qui rassemble les meilleurs artisans et restaurateurs
                    pour vous offrir une expérience gastronomique exceptionnelle.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="p-3 rounded-full glass hover:bg-white/10 transition-all duration-300">
                        <i data-lucide="facebook" class="w-5 h-5 text-white/60 hover:text-white"></i>
                    </a>
                    <a href="#" class="p-3 rounded-full glass hover:bg-white/10 transition-all duration-300">
                        <i data-lucide="instagram" class="w-5 h-5 text-white/60 hover:text-white"></i>
                    </a>
                    <a href="#" class="p-3 rounded-full glass hover:bg-white/10 transition-all duration-300">
                        <i data-lucide="twitter" class="w-5 h-5 text-white/60 hover:text-white"></i>
                    </a>
                </div>
            </div>

            <!-- Navigation -->
            <div>
                <h3 class="text-white font-bold text-lg mb-6">Navigation</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="text-white/60 hover:text-white transition-colors duration-300">Accueil</a></li>
                    <li><a href="{{ route('stands.index') }}" class="text-white/60 hover:text-white transition-colors duration-300">Nos Exposants</a></li>
                    <li><a href="{{ route('cart.index') }}" class="text-white/60 hover:text-white transition-colors duration-300">Panier</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="text-white/60 hover:text-white transition-colors duration-300">Connexion</a></li>
                        <li><a href="{{ route('register') }}" class="text-white/60 hover:text-white transition-colors duration-300">Inscription</a></li>
                    @endguest
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-white font-bold text-lg mb-6">Contact</h3>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-3 text-white/60">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                        <span>contact@eatdrink.com</span>
                    </li>
                    <li class="flex items-center space-x-3 text-white/60">
                        <i data-lucide="phone" class="w-4 h-4"></i>
                        <span>+33 1 23 45 67 89</span>
                    </li>
                    <li class="flex items-center space-x-3 text-white/60">
                        <i data-lucide="map-pin" class="w-4 h-4"></i>
                        <span>Paris, France</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Ligne de séparation -->
        <div class="border-t border-white/10 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-white/40">
                <p>&copy; {{ date('Y') }} Eat&Drink. Tous droits réservés.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors duration-300">Conditions d'utilisation</a>
                    <a href="#" class="hover:text-white transition-colors duration-300">Politique de confidentialité</a>
                </div>
            </div>
        </div>
    </div>
</footer>
