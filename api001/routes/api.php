<?php

use App\Http\Controllers\AnotherPostController;
use App\Http\Controllers\Api\V1\NewPostController;
use App\Http\Controllers\Api\V2\Postcontroller as V2Postcontroller;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/hello', function () {
    return ["message" => "hello laravel!"];
});

// Route::get('/posts', [PostController::class, 'index'])->name('post.index');

// Route::post('/posts', [PostController::class, 'store'])->name('post.store');

// Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');




// api endpoint supporting versioning EXAMPLE : v1 prefix with group
// Route::prefix('v1')->group(function () {
//     Route::apiResource('posts-new', AnotherPostController::class);
// });

// controller made under api/v1 folder 

Route::prefix('v1')->group(function () {
    Route::apiResource('hello', NewPostController::class);
});


// Route::prefix('v2')->group(function () {
//     Route::apiResource('posts', V2Postcontroller::class);
// });
