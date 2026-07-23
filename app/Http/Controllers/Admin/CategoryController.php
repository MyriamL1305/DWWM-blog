<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //Liste des catégories hors vue création et édition catégorie néceaaire pour que la route
    // (lien retour à liste eiste et fonctionne)

    public function index(): View
    {
        $categories = Category::withCount('articles')->orderBy('name')->get();
        return view('admin.categories-list', compact('categories'));
    }

    public function create():View
    {
        $category = new Category();
        return view('admin.categories-form', compact('category'));

    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);

        $validated['slug'] = Str::slug($validated['name']);

        Category::create($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Catégorie créée avec succès');
    }

    public function edit(Category $category): View
    {
    return view('admin.categories-form', compact('category'));
    }   

    public function update(Request $request, Category $category): RedirectResponse
    {
        
        $validated = $this->validatedData($request);

        $validated['slug'] = Str::slug($validated['name']);

        $category->update($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Catégorie modifiée avec succès');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->articles()->count() === 0) {
            $category->delete();
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Catégorie supprimée');
        }
        
        else {
            return redirect()
            ->route('admin.categories.index')
            ->with('error', 'Vous ne pouvez pas supprimer une catégories ayant des articles');
        }
        
    }

    private function validatedData(Request $request): array
    {
    return $request->validate([
        'name' => ['required', 'string', 'max:50'],
    ]);
    }
}
    
