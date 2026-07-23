@extends('layout.auth')
@section('titre', 'Créer un compte')
@section('content')

<div class="max-w-2xl mx-auto mt-10 border border-gray-300 rounded-lg p-10">
    <h1 class="text-3xl font-bold text-center mb-2">Créer un nouveau compte</h1>
    <p class="text-center text-sm text-gray-600 mb-8">
        Vous êtes déjà inscrit ?
        <a href="{{ route('login') }}" class="underline">&rarr; Se connecter</a>
    </p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="grid grid-cols-2 gap-4 mb-4">
            {{-- Prénom --}}
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                <input
                    id="firstname"
                    type="text"
                    name="firstname"
                    value="{{ old('firstname') }}"
                    required
                    autofocus
                    autocomplete="given-name"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('firstname') border-red-500 @enderror"
                >
                @error('firstname')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nom --}}
            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input
                    id="lastname"
                    type="text"
                    name="lastname"
                    value="{{ old('lastname') }}"
                    required
                    autocomplete="family-name"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('lastname') border-red-500 @enderror"
                >
                @error('lastname')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('email') border-red-500 @enderror"
            >
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mb-8">
            {{-- Mot de passe --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('password') border-red-500 @enderror"
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmer le mot de passe --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('password_confirmation') border-red-500 @enderror"
                >
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="w-full bg-black text-white py-2 rounded text-sm">
            S'inscrire
        </button>
    </form>
</div>

@endsection