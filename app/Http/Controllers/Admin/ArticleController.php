<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('category')->latest()->paginate(10);

        return view('admin.articles-list', compact('articles'));
    }
}
