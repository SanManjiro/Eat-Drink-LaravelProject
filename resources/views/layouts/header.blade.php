<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-glow">
                    <i data-lucide="chef-hat" class="w-7 h-7 text-black"></i>
                </div>
                <span class="font-black text-3xl text-white group-hover:text-gray-300 transition-colors duration-300">
                    Eat&Drink
                </span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('stands.index') }}"
                   class="text-white/80 hover:text-white font-medium transition-all duration-300 relative group py-2">
                    Nos Exposants
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></span>
                </a>

                @guest
                    <a href="{{ route('login') }}"
                       class="text-white/80 hover:text-white font-medium transition-all duration-300 relative group py-2">
                        Connexion
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary">
                        Inscription Stand
                    </a>
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="text-white/80 hover:text-white font-medium transition-all duration-300 flex items-center space-x-2 relative group py-2">
                        <i data-lucide="user" class="w-4 h-4"></i>
                        <span>Tableau de Bord</span>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="text-white/80 hover:text-red-400 font-medium transition-colors duration-300 flex items-center space-x-2">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span>Déconnexion</span>
                        </button>
                    </form>
                @endauth

                <!-- Cart -->
                <a href="{{ route('cart.index') }}"
                   class="relative text-white/80 hover:text-white transition-colors duration-300 group">
                    <div class="p-3 rounded-2xl glass group-hover:bg-white/10 transition-all duration-300">
                        <i data-lucide="shopping-cart" class="w-6 h-6"></i>
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="absolute -top-1 -right-1 bg-white text-black text-xs rounded-full h-6 w-6 flex items-center justify-center font-bold animate-pulse">
                                {{ array_sum(array_column(session('cart'), 'quantity')) }}
                            </span>
                        @endif
                    </div>
                </a>
            </nav>

            <!-- Mobile menu button -->
            <button class="md:hidden p-3 rounded-2xl glass text-white hover:bg-white/10 transition-all duration-300"
                    onclick="toggleMobileMenu()">
                <i data-lucide="menu" class="w-6 h-6" id="menu-icon"></i>
                <i data-lucide="x" class="w-6 h-6 hidden" id="close-icon"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden py-6 glass-dark rounded-b-3xl mt-2 animate-slide-in-bottom hidden">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('stands.index') }}"
                   class="text-white/80 hover:text-white font-medium transition-colors duration-300 py-3 px-4 rounded-xl hover:bg-white/10">
                    Nos Exposants
                </a>

                @guest
                    <a href="{{ route('login') }}"
                       class="text-white/80 hover:text-white font-medium transition-colors duration-300 py-3 px-4 rounded-xl hover:bg-white/10">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary mx-4">
                        Inscription Stand
                    </a>
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="text-white/80 hover:text-white font-medium transition-colors duration-300 flex items-center space-x-2 py-3 px-4 rounded-xl hover:bg-white/10">
                        <i data-lucide="user" class="w-4 h-4"></i>
                        <span>Tableau de Bord</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="px-4">
                        @csrf
                        <button type="submit"
                                class="text-white/80 hover:text-red-400 font-medium transition-colors duration-300 flex items-center space-x-2 w-full text-left py-3 rounded-xl hover:bg-white/10">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span>Déconnexion</span>
                        </button>
                    </form>
                @endauth

                <a href="{{ route('cart.index') }}"
                   class="text-white/80 hover:text-white font-medium transition-colors duration-300 flex items-center space-x-2 py-3 px-4 rounded-xl hover:bg-white/10">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                    <span>Panier @if(session('cart') && count(session('cart')) > 0)({{ array_sum(array_column(session('cart'), 'quantity')) }})@endif</span>
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        menu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }
</script>
