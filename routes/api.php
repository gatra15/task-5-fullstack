<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('posts', [ArticleController::class, 'index']);
    Route::get('posts/{id}', [ArticleController::class, 'show']);
    Route::post('posts', [ArticleController::class, 'store']);
    Route::put('posts/{id}', [ArticleController::class, 'update']);
    Route::delete('posts/{id}', [ArticleController::class, 'destroy']);

    Route::get('categories', [CategoriesController::class, 'index']);
    Route::get('categories/{id}', [CategoriesController::class, 'show']);
    Route::post('categories', [CategoriesController::class, 'store']);
    Route::put('categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('categories/{id}', [CategoriesController::class, 'destroy']);
});