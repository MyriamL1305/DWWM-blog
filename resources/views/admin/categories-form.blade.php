{{--
    Vue unique pour la création et l'édition d'une catégorie.
    $category doit toujours être défini par le contrôleur :
      - new Category() en création (category->exists === false)
      - Category résolu par route model binding en édition (category->exists === true)
    Même principe que articles-form.blade.php, en plus simple : une catégorie
    n'a qu'un champ à saisir (name), le slug est généré automatiquement.
--}}
@extends('layout.app')
@section('titre', 'Admin Formulaire catégorie')
@section('content')

<div class="max-w-lg mx-auto px-4 py-8">

    <p class="mb-4">
        <a href="{{ route('admin.categories.index') }}">&larr; Retour à la liste</a>
    </p>

    <h1 class="text-2xl font-bold mb-6">
        {{ $category->exists ? 'Modifier la catégorie' : 'Créer une catégorie' }}
    </h1>

    <form
        method="POST"
        action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
    >
        @csrf
        {{-- HTML ne connaît que GET/POST : @method('PUT') simule PUT pour update(). --}}
        @if ($category->exists)
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Nom <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $category->name) }}"
                maxlength="50"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('name') border-red-500 @enderror"
                required
                autofocus
            >
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 border rounded text-sm">Annuler</a>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded text-sm">Enregistrer</button>
        </div>
    </form>

</div>
@endsection