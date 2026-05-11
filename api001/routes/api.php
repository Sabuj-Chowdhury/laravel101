<?php

use App\Http\Controllers\Api\V1\PostController as V1PostController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// default route created
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//just a test route
Route::get('/hello', function () {
    return ["message" => "hello laravel!"];
});

// route prefixing to v1 and newly created Controller
Route::prefix('v1')->group(function () {
    Route::apiResource('post', V1PostController::class);
});


// Route::get('/posts', [PostController::class, 'index'])->name('post.index');

// Route::post('/posts', [PostController::class, 'store'])->name('post.store');

// Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');




// api endpoint supporting versioning EXAMPLE : v1 prefix with group
// Route::prefix('v1')->group(function () {
//     Route::apiResource('posts-new', AnotherPostController::class);
// });

// controller made under api/v1 folder 

// Route::prefix('v1')->group(function () {
//     Route::apiResource('hello', NewPostController::class);
// });


// Route::prefix('v2')->group(function () {
//     Route::apiResource('posts', V2Postcontroller::class);
// });
