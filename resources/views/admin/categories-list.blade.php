{{--
    Liste des catégories côté admin.
    $categories doit être chargé avec le nombre d'articles liés, via :
        Category::withCount('articles')->orderBy('name')->get();
    withCount('articles') ajoute automatiquement un attribut "articles_count"
    sur chaque Category, calculé à partir de la relation articles() du modèle.
--}}
@extends('layout.app')
@section('titre', 'Admin Liste des catégories')
@section('content')

<div class="max-w-3xl mx-auto px-4 py-8">

    {{-- Titre + bouton nouvelle catégorie --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Catégories</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-black text-white px-4 py-2 rounded text-sm">
            + Nouvelle catégorie
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded text-sm">
            {{ session('success') }}
        </div>
    @endif
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded text-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="border border-gray-200 rounded-lg overflow-hidden">
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-gray-50">
                <tr class="border-b border-gray-200 text-gray-500">
                    <th class="py-3 px-4 w-60">Nom</th>
                    <th class="py-3 px-4 border-l border-gray-200 w-40">Nombre d'articles</th>
                    <th class="py-3 px-4 border-l border-gray-200 w-24">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-b border-gray-100 last:border-b-0 hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $category->name }}</td>
                        <td class="py-3 px-4 border-l border-gray-100">{{ $category->articles_count }}</td>
                        <td class="py-3 px-4 border-l border-gray-100">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" title="Modifier">✏️</a>

                                {{-- Le blocage réel (catégorie encore utilisée) est vérifié côté
                                     serveur dans destroy() ; ici on grise juste le bouton pour
                                     éviter à l'utilisateur un clic qui échouera à coup sûr. --}}
                                @if ($category->articles_count === 0)
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Supprimer">🗑️</button>
                                    </form>
                                @else
                                    <span title="Impossible de supprimer : catégorie encore utilisée" class="opacity-30 cursor-not-allowed">🗑️</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 px-4 text-gray-500">Aucune catégorie pour le moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection