{{--
    Layout minimal pour les pages d'authentification (login/register) :
    pas de navbar, pas de footer, pas de logo, fond blanc fixe (jamais de
    mode sombre). @yield('titre') et @yield('content') sont remplis par les
    vues qui font @extends('layout.auth').
--}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre', 'DWWM Blog')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900">
    @yield('content')
</body>
</html>