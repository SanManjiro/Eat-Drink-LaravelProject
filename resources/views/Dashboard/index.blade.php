@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="mb-8 animate-fade-in-up">
            <h1 class="text-3xl font-bold text-white mb-2">
                @if($dashboard_type === 'admin')
                    Dashboard Administrateur
                @elseif($dashboard_type === 'entrepreneur')
                    Dashboard Entrepreneur
                @else
                    Dashboard
                @endif
            </h1>
            <p class="text-white/60">
                @if($dashboard_type === 'admin')
                    Gérez l'ensemble de la plateforme Eat&Drink
                @elseif($dashboard_type === 'entrepreneur')
                    Gérez votre stand et vos produits
                @else
                    Bienvenue sur votre espace personnel
                @endif
            </p>
        </div>

        @if($dashboard_type === 'admin')
            @include('dashboard.admin-dashboard')
        @elseif($dashboard_type === 'entrepreneur')
            @include('dashboard.entrepreneur-dashboard')
        @else
            @include('dashboard.pending-approval')
        @endif
    </div>
@endsection
<div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center shadow-glow">
    <i data-lucide="layout-dashboard" class="w-8 h-8 text-black"></i>
</div>
<div>
    <h1 class="text-4xl font-black text-white">Tableau de Bord</h1>
    <p class="text-white/60">
        Bienvenue, {{ auth()->user()->nom_entreprise ?? 'Utilisateur' }}
    </p>
</div>
</div>

<!-- Status Badge -->
@if(auth()->user()->role == 'entrepreneur_en_attente')
    <div class="status-pending inline-flex items-center">
        <i data-lucide="clock" class="w-4 h-4 mr-2"></i>
        En attente d'approbation
    </div>
@elseif(auth()->user()->role == 'entrepreneur_approuve')
    <div class="status-approved inline-flex items-center">
        <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
        Entrepreneur Approuvé
    </div>
@elseif(auth()->user()->role == 'admin')
    <div class="status-approved inline-flex items-center">
        <i data-lucide="shield" class="w-4 h-4 mr-2"></i>
        Administrateur
    </div>
    @endif
    </div>

    <!-- Content based on role -->
    @if(auth()->user()->role == 'entrepreneur_en_attente')
        @include('dashboard.pending-approval')
    @elseif(auth()->user()->role == 'entrepreneur_approuve')
        @include('dashboard.entrepreneur')
    @elseif(auth()->user()->role == 'admin')
        @include('dashboard.admin')
    @else
        <div class="card p-8 text-center">
            <i data-lucide="alert-circle" class="w-16 h-16 text-yellow-400 mx-auto mb-4"></i>
            <h2 class="text-2xl font-bold text-white mb-2">Rôle Non Reconnu</h2>
            <p class="text-white/60">Contactez l'administrateur pour résoudre ce problème.</p>
        </div>
        @endif
        </div>
        </div>

