<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoriesController;

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

Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);

Route::prefix('v1')->group(function () {
    Route::group(['middleware' => 'auth:api'], function() {
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
    
});