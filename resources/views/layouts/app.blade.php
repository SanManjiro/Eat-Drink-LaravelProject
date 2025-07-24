<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Mon Application')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> {{-- Ajout du CSS personnalisé --}}
  <style>
    body { background-color: #f8f9fa; padding-top:20px; }
    .container-white { background: #fff; padding:20px; border-radius:6px; }
    .sidebar { background-color: #343a40; height:100vh; }
    .sidebar a { color: white; padding:12px; display:block; text-decoration:none; }
    .sidebar a:hover { background-color: #495057; }
  </style>
</head>
<body>
  @yield('content')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
