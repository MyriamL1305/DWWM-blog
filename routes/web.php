<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

// Routes Articles
Route::get('/articles', [ArticleController::class, 'index']);

//Routes Categories
Route::get('/categories', [CategoryController::class, 'index']);