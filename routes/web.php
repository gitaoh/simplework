<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use \App\Http\Controllers\ArticlesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', ['articles'=> Article::take(3)->latest()->get()]);
});


Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::get('/articles/{article}', [ArticlesController::class, 'show']) ->name('articles.show');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);
