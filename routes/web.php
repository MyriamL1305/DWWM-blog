<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


//Routes Categories
Route::get('/categories', [CategoryController::class, 'index']);
