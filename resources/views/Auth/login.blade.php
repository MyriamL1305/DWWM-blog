@extends('layout.app')
@section('titre', 'Connexion')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-white px-4">
    <div class="w-full max-w-sm">

        <h1 class="text-3xl font-bold text-center mb-8">Se connecter</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    placeholder="janesepa@email.com"
                    required
                    autofocus
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-black"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Mot de passe --}}
            <div class="mb-6">
                <label for="password" class="block text-sm text-gray-700 mb-1">Mot de passe</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-black"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Bouton --}}
            <button
                type="submit"
                class="w-full bg-black text-white text-sm font-medium py-2.5 rounded-md hover:bg-gray-800 transition"
            >
                Se connecter
            </button>
        </form>

        {{-- Lien inscription --}}
        <p class="text-sm text-gray-600 mt-6">
            Pas encore de compte ? <br>
            → <a href="#" class="underline hover:text-black">S'inscrire</a>
        </p>

    </div>
</div>
@endsection
