<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\PostController;

Route::apiResource('posts', PostController::class);

Route::delete('/posts/{id}', [PostController::class, 'destroy']);
Route::get('/posts/{id}', [PostController::class, 'show']);