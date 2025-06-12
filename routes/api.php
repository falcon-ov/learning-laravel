<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // добавь это
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DestroyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});


Route::middleware('jwt.auth')->group(function () {
    Route::get('/posts', [IndexController::class, '__invoke']);
    Route::get('/posts/create', [CreateController::class, '__invoke']);
    Route::post('/posts', [StoreController::class, '__invoke']);
    Route::get('/posts/{post}', [ShowController::class, '__invoke']);
    Route::get('/posts/{post}/edit', [EditController::class, '__invoke']);
    Route::patch('/posts/{post}', [UpdateController::class, '__invoke']);
    Route::delete('/posts/{post}', [DestroyController::class, '__invoke']);
});
