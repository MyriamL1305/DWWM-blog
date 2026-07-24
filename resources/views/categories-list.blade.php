@extends('layout.app')
@section('titre', 'Liste de catégories')
@section('content')
     <h1>Categories List</h1>
    @foreach($categories as $category)
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>{{ $category->name }}</h2>
                <span>{{ $category->articles->count() }} articles</span>

            </div>
            
        </div>

    @endforeach 

    {{-- Pagination--}}
    <div class="flex items-center justify-center gap-4 mt-8">
        @if ($categories->onFirstPage()) {{--si on est à la page 1 préccedent sera en gris clair et non cliquable--}}
            <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded">← Précédent</span>
        @else
            <a href="{{ $categories->previousPageUrl() }}" class="px-4 py-2 bg-black text-white rounded">← Précédent</a> {{-- à partir de la page 2 prédédent devient cliquable --}}
        @endif

        {{--Affiche page courante/page total--}}
        <span class="text-sm">Page {{ $categories->currentPage() }}/{{ $categories->lastPage() }}</span>

        @if ($categories->hasMorePages())
            <a href="{{ $categories->nextPageUrl() }}" class="px-4 py-2 bg-black text-white rounded">Suivant →</a> {{--Affiche suivant s'il y a au moins une page après la page courante--}}
        @else
            <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded">Suivant →</span> {{--Affiche suivante mais n'est pas cliquable car c'est la derniere page--}}
        @endif
        
@endsection