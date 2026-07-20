<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

Route::get('/', function () {
    return view('home');
});

// Routes publiques
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
//Route détail article
Route::get('/articles/{id}',[ArticleController::class, 'show'])->name('articles.show');

// Routes admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    //Route::resource() génère aà lui seuk les
    // Génère automatiquement :
        // GET    /admin/articles              admin.articles.index
        // GET    /admin/articles/create        admin.articles.create
        // POST   /admin/articles               admin.articles.store
        // GET    /admin/articles/{article}/edit admin.articles.edit
        // PUT    /admin/articles/{article}      admin.articles.update
        // DELETE /admin/articles/{article}      admin.articles.destroy
    Route::resource('articles', AdminArticleController::class);
    
Route::patch('/articles/{article}/publish', [AdminArticleController::class, 'publish'])
    ->name('articles.publish');

});;

// Routes générées par Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
    }); 


    
require __DIR__.'/auth.php';
