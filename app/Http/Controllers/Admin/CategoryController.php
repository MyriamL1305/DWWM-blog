<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    //Liste des catégories hors vue création et édition catégorie néceaaire pour que la route
    // (lien retour à liste eiste et fonctionne)

    public function index(): View
    {
        $categories = Category::withCount('articles')->orderBy('name')->get();
        return view('admin.categories-list', compact('categories'));
    }
}