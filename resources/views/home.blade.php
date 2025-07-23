@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <!-- Hero Section -->
    <section class="hero-bg min-h-screen flex items-center justify-center relative">
        <!-- Floating elements -->
        <div class="absolute top-20 left-10 w-4 h-4 bg-white/20 rounded-full float"></div>
        <div class="absolute top-40 right-20 w-6 h-6 bg-white/10 rounded-full float" style="animation-delay: 2s"></div>
        <div class="absolute bottom-40 left-20 w-3 h-3 bg-white/30 rounded-full float" style="animation-delay: 4s"></div>

        <div class="hero-content max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <div class="animate-fade-in-up">
                <div class="flex items-center justify-center mb-8">
                    <i data-lucide="sparkles" class="w-8 h-8 text-white/60 mr-4 animate-pulse"></i>
                    <span class="text-white/60 font-medium tracking-wider uppercase text-sm">Événement Culinaire Premium</span>
                    <i data-lucide="sparkles" class="w-8 h-8 text-white/60 ml-4 animate-pulse"></i>
                </div>

                <h1 class="text-7xl md:text-9xl font-black mb-8 leading-tight">
                    <span class="gradient-text-primary text-shimmer">Eat</span>
                    <span class="text-white/90">&</span>
                    <span class="gradient-text-primary text-shimmer">Drink</span>
                </h1>

                <p class="text-xl md:text-2xl text-white/70 mb-16 max-w-4xl mx-auto leading-relaxed font-light">
                    L'événement culinaire qui rassemble les meilleurs artisans et restaurateurs
                    pour vous offrir une expérience gastronomique <span class="text-white font-medium">exceptionnelle</span>.
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
{{--                    <a href="{{ route('stands.index') }}" class="btn-primary group text-lg px-10 py-5">--}}
                        Découvrir nos Exposants
                        <i data-lucide="arrow-right" class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('register') }}" class="btn-secondary group text-lg px-10 py-5">
                        Devenir Exposant
                        <i data-lucide="chef-hat" class="w-6 h-6 ml-3 group-hover:rotate-12 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="w-8 h-12 border-2 border-white/30 rounded-full flex justify-center">
                <div class="w-1 h-4 bg-white/50 rounded-full mt-3 animate-pulse"></div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="fade-in-section py-32 bg-gradient-to-b from-black to-gray-900 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-24">
                <h2 class="text-6xl md:text-7xl font-black mb-8 gradient-text-primary">
                    Pourquoi Eat&Drink ?
                </h2>
                <p class="text-xl text-white/60 max-w-3xl mx-auto leading-relaxed font-light">
                    Découvrez ce qui fait de notre événement une expérience unique et mémorable
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card card-hover text-center p-8 stagger-1">
                    <div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-glow">
                        <i data-lucide="chef-hat" class="w-8 h-8 text-black"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Artisans d'Exception</h3>
                    <p class="text-white/60 leading-relaxed">
                        Des chefs et artisans sélectionnés pour leur savoir-faire unique et leur passion culinaire.
                    </p>
                </div>

                <div class="card card-hover text-center p-8 stagger-2">
                    <div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-glow">
                        <i data-lucide="users" class="w-8 h-8 text-black"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Communauté Passionnée</h3>
                    <p class="text-white/60 leading-relaxed">
                        Rejoignez une communauté de gourmets et d'amateurs de gastronomie partageant vos valeurs.
                    </p>
                </div>

                <div class="card card-hover text-center p-8 stagger-3">
                    <div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-glow">
                        <i data-lucide="shopping-bag" class="w-8 h-8 text-black"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Commande Simplifiée</h3>
                    <p class="text-white/60 leading-relaxed">
                        Commandez facilement vos produits préférés directement depuis notre plateforme intuitive.
                    </p>
                </div>

                <div class="card card-hover text-center p-8 stagger-4">
                    <div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-glow">
                        <i data-lucide="calendar" class="w-8 h-8 text-black"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Événement Régulier</h3>
                    <p class="text-white/60 leading-relaxed">
                        Profitez d'événements réguliers pour découvrir de nouveaux talents et saveurs.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="fade-in-section py-32 bg-gradient-to-b from-gray-900 to-black">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-5xl md:text-6xl font-black mb-20 gradient-text-primary">
                Eat&Drink en Chiffres
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="stagger-1">
                    <div class="text-5xl md:text-6xl font-black text-white mb-4">50+</div>
                    <div class="text-white/60 text-lg font-medium">Exposants</div>
                </div>
                <div class="stagger-2">
                    <div class="text-5xl md:text-6xl font-black text-white mb-4">1000+</div>
                    <div class="text-white/60 text-lg font-medium">Produits</div>
                </div>
                <div class="stagger-3">
                    <div class="text-5xl md:text-6xl font-black text-white mb-4">5000+</div>
                    <div class="text-white/60 text-lg font-medium">Visiteurs</div>
                </div>
                <div class="stagger-4">
                    <div class="text-5xl md:text-6xl font-black text-white mb-4">4.9</div>
                    <div class="text-white/60 text-lg font-medium">Note Moyenne</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="fade-in-section py-32 bg-gradient-to-b from-black to-gray-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent transform rotate-12 scale-150"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-5xl md:text-6xl font-black mb-8 gradient-text-primary">
                Prêt à Rejoindre l'Aventure ?
            </h2>
            <p class="text-xl text-white/70 mb-12 max-w-3xl mx-auto leading-relaxed font-light">
                Que vous soyez un entrepreneur passionné ou un amateur de gastronomie,
                Eat&Drink vous ouvre ses portes pour une expérience inoubliable.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('register') }}" class="btn-primary text-lg px-12 py-6">
                    Devenir Exposant
                    <i data-lucide="arrow-right" class="w-6 h-6 ml-3"></i>
                </a>
{{--                <a href="{{ route('stands.index') }}" class="btn-secondary text-lg px-12 py-6">--}}
                    Explorer les Stands
                    <i data-lucide="search" class="w-6 h-6 ml-3"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
