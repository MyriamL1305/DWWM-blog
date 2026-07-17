<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Article as ModelsArticle;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    // Liste des articles hors vue création et édition article nécessaire pour que la route "admin.articles.index"
    // (lien "retour à la liste " existe et fonctionne)
    public function index(): View
    {
        $articles = Article::with('category')->latest()->paginate(10);

        return view('admin.articles-list', compact('articles'));
    }

    // Formulaire de création d'un article
    // On instancie un article vide newArticle()
    public function create(): View
    {
        $article = new Article();
        $categories = Category::orderBy('name')->get();

        return view('admin.articles-form', compact('article', 'categories'));
    }

    // enregistrement de l'article
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = $request->user()->id;
        $validated['published_at'] = $validated['status'] === 'published' ? now() : null;

        Article::create($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article créé avec succès.');
    }

    /**
     * Formulaire d'édition. */

    public function edit(Article $article): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.articles.form', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $this->validatedData($request);

        $validated['slug'] = Str::slug($validated['title']);

        // On ne pose published_at que lors du premier passage en "published".
        // Si on repasse en brouillon, on l'efface (choix métier à discuter/ajuster).
        if ($validated['status'] === 'published' && $article->status !== 'published') {
            $validated['published_at'] = now();
        } elseif ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        $article->update($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        // Si la contrainte de clé étrangère "id_article" côté "comments" est
        // définie avec onDelete('cascade'), les commentaires liés partent avec.
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article supprimé.');
    }

    /**
     * Validation commune à store() et update().
     * "tags" n'est pas validé pour l'instant : le select est désactivé côté vue,
     * donc rien n'est soumis (à activer quand le branchement sera fait).
     */
    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}
