{{--
    Vue de connexion, redessinée selon la maquette (carte centrée bordée,
    titre "Se connecter", champs Email/Mot de passe, bouton noir, lien vers
    l'inscription en bas).

    <x-guest-layout> est le composant Blade fourni par Breeze pour les pages
    non-authentifiées (login/register) — il gère juste le fond de page, tout
    le contenu visible est ici. Les noms des champs (email, password) et
    l'action du formulaire (route('login')) ne doivent pas changer : c'est
    ce que App\Http\Controllers\Auth\AuthenticatedSessionController attend
    pour traiter la connexion.
--}}
<x-guest-layout>
    <div class="w-full max-w-md mx-auto border border-gray-300 rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6">Se connecter</h1>

        {{-- Message de statut (ex: après une réinitialisation de mot de passe réussie) --}}
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('email') border-red-500 @enderror"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Mot de passe --}}
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('password') border-red-500 @enderror"
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{--
                "Se souvenir de moi" retiré pour coller exactement à la maquette.
                Le contrôleur Breeze le gère déjà si tu veux le remettre plus tard :
                <label class="inline-flex items-center text-sm mb-4">
                    <input type="checkbox" name="remember" class="mr-2">
                    Se souvenir de moi
                </label>
            --}}

            <button type="submit" class="w-full bg-black text-white py-2 rounded text-sm">
                Se connecter
            </button>

            <p class="mt-4 text-sm text-gray-600">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="underline">&rarr; S'inscrire</a>
            </p>
        </form>
    </div>
</x-guest-layout>