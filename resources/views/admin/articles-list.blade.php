 @extends('layout.app')
 @section('titre', 'Admin Liste des articles')
 @section('content')

 {{--Titre + bouton nouvel article--}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2x1 font-bold">Articles</h1>
        <a href="#" class="bg-black text-white px-4 py-2 rounded texy-sm">+ Nouvel article</a>
    </div>

    {{--tableau des articles --}}
    <table class="w-full text-left text-sm border-collapse">
        <thead>
            <tr class="border-b text-gray-500">
                <th class="py-2">Titre</th>
                <th class="py-2">Catégorie</th>
                <th class="py-2">Statut</th>
                <th class="py-2">Date</th>
                <th class="py-2">Actions</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article) 
                <tr>
                    <td class="py-3">{{ $article->title }}</td>
                    <td class="py-3">{{ $article->category->name }}</td>
                    <td class="py-3">
                        @if($article->status === 'published')
                            <span class="inline-block w-2 h-2 rounded-full bg-green-500 mr-1"></span> Publié
                        @else
                            <span class="inline-block w-2 h-2 rounded-full bg-gray-400 mr-1"></span> Brouillon
                        @endif
                    </td>
                    <td class="py-3">{{ $article->created_at->format('d/m/Y') }}</td>
                    <td class="py-3 space-x-2">
                        <a href="#" title="Modifier">✏️</a>
                        <a href="#" title="Supprimer">🗑️</a>
                        <a href="#" title="Publierr">➤</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-4 text-gray-500">Aucun article pour le moment.</td>
                </tr>
                @endforelse
            
        </tbody>
    </table>

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
@endsection