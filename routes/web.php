<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AboutController;

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

Route::get('/main', [MainController::class, 'index']);
Route::get('/contacts', [ContactsController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);