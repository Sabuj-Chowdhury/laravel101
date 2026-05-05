<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/hello', function () {
    return ["message" => "hello laravel!"];
});

Route::get('/posts', [PostController::class, 'index'])->name('post.index');

Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
