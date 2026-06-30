<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

<<<<<<< HEAD

//Routes Categories
Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/articles',[ArticleController::class, 'index']);
=======
Route::get('/articles', [ArticleController::class, 'index']);
>>>>>>> f0cb64b (feat: display articles list)
