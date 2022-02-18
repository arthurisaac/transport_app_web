<?php

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

//Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'index'] );
Route::resource('/categories', \App\Http\Controllers\api\CategoriesController::class );
Route::resource('/articles', \App\Http\Controllers\api\ArticleController::class );
Route::resource('/orders', \App\Http\Controllers\api\OrderController::class );
