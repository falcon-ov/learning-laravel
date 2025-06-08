<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Post\IndexController as PostIndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('posts')->name('post.')->group(function () {
    Route::get('/', PostIndexController::class)->name('index');
    Route::get('/create', CreateController::class)->name('create');
    Route::post('/', StoreController::class)->name('store');
    Route::get('/{post}', ShowController::class)->name('show');
    Route::get('/{post}/edit', EditController::class)->name('edit');
    Route::patch('/{post}', UpdateController::class)->name('update');
    Route::delete('/{post}', DestroyController::class)->name('delete');
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {  
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', AdminPostIndexController::class)->name('index');
    });
});

Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/restore', [PostController::class, 'restore']);
Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
