<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/posts', [PostController::class, 'index']);

Route::get('posts/create', [PostController::class, 'create']);

Route::get('posts/update', [PostController::class, 'update']);

Route::get('posts/delete', [PostController::class, 'delete']);

Route::get('posts/restore', [PostController::class, 'restore']);

Route::get('posts/first_or_create', [PostController::class, 'firstOrCreate']);

Route::get('posts/update_or_create', [PostController::class, 'updateOrCreate']);
