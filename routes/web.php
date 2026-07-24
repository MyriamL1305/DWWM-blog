<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Auth\LoginController as LoginController;

Route::get('/', function () {
    return view('home');
});

// Routes publiques
Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
//Route détail article
Route::get('/articles/{id}',[ArticleController::class, 'show'])->name('articles.show');

// Routes admin
    //Route::resource() génère à lui seul les
    // Génère automatiquement :
        // GET    /admin/articles              admin.articles.index
        // GET    /admin/articles/create        admin.articles.create
        // POST   /admin/articles               admin.articles.store
        // GET    /admin/articles/{article}/edit admin.articles.edit
        // PUT    /admin/articles/{article}      admin.articles.update
        // DELETE /admin/articles/{article}      admin.articles.destroy
// Routes admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('articles', AdminArticleController::class);

    Route::patch('/articles/{article}/publish', [AdminArticleController::class, 'publish'])
        ->name('articles.publish');

    Route::resource('categories', AdminCategoryController::class);
});

Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');


