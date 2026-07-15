<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() : View {
        $articles = Article::with('category')->latest()->paginate(5);
        $categories = Category::all();

        return view('articles-list', ['articles' => $articles, 'categories'=>$categories,]);
    }
    // Afficher le détail d'un seul article
    public function show(int $id): View {
    $article = Article::with(['category'])->findOrFail($id);
    return view('article-detail', compact('article'));
}
}