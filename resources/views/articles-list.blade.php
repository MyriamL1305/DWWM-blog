{{-- resources/views/articles-list.blade.php --}}
@extends('layout.app')

@section('titre', 'liste des articles')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Articles List</h1>

    @forelse($articles as $article)
        <x-article-card :article="$article" />
    @empty
        <p class="text-gray-500">Aucun article pour le moment.</p>
    @endforelse

    <div class="flex items-center justify-center gap-4 mt-8">
        @if ($articles->onFirstPage()) {{--si on est à la page 1 préccedent sera en gris clair et non cliquable--}}
            <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded">← Précédent</span>
        @else
            <a href="{{ $articles->previousPageUrl() }}" class="px-4 py-2 bg-black text-white rounded">← Précédent</a> {{-- à partir de la page 2 prédédent devient cliquable --}}
        @endif

        {{--Affiche page courante/page total--}}
        <span class="text-sm">Page {{ $articles->currentPage() }}/{{ $articles->lastPage() }}</span>

        @if ($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}" class="px-4 py-2 bg-black text-white rounded">Suivant →</a> {{--Affiche suivant s'il y a au moins une page après la page courante--}}
        @else
            <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded">Suivant →</span> {{--Affiche suivante mais n'est pas cliquable car c'est la derniere page--}}
        @endif

</div>

@endsection
