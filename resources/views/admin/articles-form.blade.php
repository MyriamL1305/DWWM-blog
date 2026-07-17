{{--
    Vue unique utilisée à la fois pour la création et l'édition (écran 5).
    $article est toujours défini par le contrôleur :
      - new Article() en création (article->exists === false)
      - Article résolu par route model binding en édition (article->exists === true)
    $categories est une collection de Category.

    Layout : ce projet utilise le composant Blade <x-app-layout> (Breeze),
    pas @extends/@section. Le layout sous-jacent (resources/views/layouts/app.blade.php)
    attend un slot par défaut ({{ $slot }}) et, optionnellement, un slot nommé
    "header" ({{ $header }}) — c'est pour ça qu'on écrit le contenu directement
    entre <x-app-layout> ... </x-app-layout> au lieu d'un @section('content').
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->exists ? "Modifier l'article" : 'Créer un article' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">

                <p class="mb-3">
                    <a href="{{ route('admin.articles.index') }}">&larr; Retour à la liste</a>
                </p>

                <form
                    method="POST"
                    action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
                >
                    @csrf
                    {{-- HTML ne connaît que GET/POST : @method('PUT') ajoute un champ
                         caché _method que Laravel lit pour router vers update(). --}}
                    @if ($article->exists)
                        @method('PUT')
                    @endif

                    {{-- Titre --}}
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Titre <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $article->title) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('title') border-red-500 @enderror"
                            required
                        >
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Catégorie --}}
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">
                            Catégorie <span class="text-red-500">*</span>
                        </label>
                        <select
                            id="category_id"
                            name="category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('category_id') border-red-500 @enderror"
                            required
                        >
                            <option value="" disabled {{ old('category_id', $article->category_id) ? '' : 'selected' }}>
                                Sélectionner une catégorie
                            </option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ (int) old('category_id', $article->category_id) === $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tags : UI présente mais désactivée, branchement à faire plus tard
                         (relation Article::tags(), table pivot articles_tags). --}}
                    <div class="mb-4">
                        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                        <select id="tags" name="tags[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" disabled>
                            {{-- @foreach ($tags as $tag) <option value="{{ $tag->id }}">{{ $tag->name }}</option> @endforeach --}}
                        </select>
                        <p class="mt-1 text-xs text-gray-400">Fonctionnalité à venir.</p>
                    </div>

                    {{-- Contenu --}}
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Contenu <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            id="content"
                            name="content"
                            rows="8"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('content') border-red-500 @enderror"
                            required
                        >{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Statut : "draft" par défaut en création, jamais présélectionné sur "published" --}}
                    @php
                        $status = old('status', $article->status ?? 'draft');
                    @endphp
                    <div class="mb-6">
                        <span class="block text-sm font-medium text-gray-700 mb-1">Statut</span>

                        <label class="inline-flex items-center mr-4">
                            <input
                                type="radio"
                                name="status"
                                value="draft"
                                class="mr-1"
                                {{ $status === 'draft' ? 'checked' : '' }}
                            >
                            Brouillon
                        </label>

                        <label class="inline-flex items-center">
                            <input
                                type="radio"
                                name="status"
                                value="published"
                                class="mr-1"
                                {{ $status === 'published' ? 'checked' : '' }}
                            >
                            Publié
                        </label>

                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 border rounded-md text-sm">Annuler</a>
                        <button type="submit" class="px-4 py-2  rounded-md text-sm">Enregistrer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>