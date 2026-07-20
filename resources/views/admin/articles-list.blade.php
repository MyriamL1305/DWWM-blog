@extends('layout.app')
@section('titre', 'Admin Liste des articles')
@section('content')

<div class="max-w-5xl mx-auto px-4 py-8">

    {{-- Titre + bouton nouvel article --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Articles</h1>
        <a href="{{ route('admin.articles.create') }}" class="bg-black text-white px-4 py-2 rounded text-sm">
            + Nouvel article
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- tableau des articles : cadre + traits entre colonnes/lignes, contenu dans max-w-5xl --}}
    <div class="border border-gray-200 rounded-lg overflow-hidden">
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-gray-50">
                <tr class="border-b border-gray-200 text-gray-500">
                    <th class="py-3 px-4">Titre</th>
                    <th class="py-3 px-4 border-l border-gray-200">Catégorie</th>
                    <th class="py-3 px-4 border-l border-gray-200 w-28">Statut</th>
                    <th class="py-3 px-4 border-l border-gray-200 w-32">Date</th>
                    <th class="py-3 px-4 border-l border-gray-200 w-24">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr class="border-b border-gray-100 last:border-b-0 hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $article->title }}</td>
                        <td class="py-3 px-4 border-l border-gray-100">{{ $article->category->name ?? '—' }}</td>
                        <td class="py-3 px-4 border-l border-gray-100">
                            @if($article->status === 'published')
                                <span class="inline-block w-2 h-2 rounded-full bg-green-500 mr-1"></span> Publié
                            @else
                                <span class="inline-block w-2 h-2 rounded-full bg-gray-400 mr-1"></span> Brouillon
                            @endif
                        </td>
                        <td class="py-3 px-4 border-l border-gray-100">{{ $article->created_at->format('d/m/Y') }}</td>
                        <td class="py-3 px-4 border-l border-gray-100">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.articles.edit', $article) }}" title="Modifier">✏️</a>
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Supprimer">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-4 text-gray-500">Aucun article pour le moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex items-center justify-center gap-4 mt-8">

        @if ($articles->onFirstPage())
            <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded">← Précédent</span>
        @else
            <a href="{{ $articles->previousPageUrl() }}" class="px-4 py-2 bg-black text-white rounded">← Précédent</a>
        @endif

        <span class="text-sm">Page {{ $articles->currentPage() }}/{{ $articles->lastPage() }}</span>

        @if ($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}" class="px-4 py-2 bg-black text-white rounded">Suivant →</a>
        @else
            <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded">Suivant →</span>
        @endif

    </div>
</div>
@endsection