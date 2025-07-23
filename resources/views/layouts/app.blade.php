<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eat&Drink') }} - @yield('title', 'Événement Culinaire Premium')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="min-h-screen bg-black text-white overflow-x-hidden">
<!-- Header -->
@include('layouts.header')

<!-- Main Content -->
<main class="flex-1">
    @yield('content')
</main>

<!-- Footer -->
@include('layouts.footer')

<!-- Scripts -->
@stack('scripts')

<script>
    // Initialize Lucide icons
    lucide.createIcons();

    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, observerOptions);

    document.addEventListener('DOMContentLoaded', function() {
        // Observe elements with fade-in-section class
        document.querySelectorAll('.fade-in-section').forEach(el => {
            observer.observe(el);
        });

        // Header scroll effect
        const header = document.querySelector('header');
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;

            if (currentScrollY > 50) {
                header.classList.add('glass-dark', 'shadow-glow');
                header.classList.remove('bg-transparent');
            } else {
                header.classList.remove('glass-dark', 'shadow-glow');
                header.classList.add('bg-transparent');
            }

            lastScrollY = currentScrollY;
        });
    });
</script>
</body>
</html>
