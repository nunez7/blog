<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register'=>false]);

Route::get('/', [App\Http\Controllers\PagesController::class, 'index']);
Route::get('blog/{post}',[App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('categorias/{category}',[App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show');
Route::get('tags/{tag}',[App\Http\Controllers\TagsController::class, 'show'])->name('tags.show');
//Grupos de rutas
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.posts.create');
    Route::post('posts/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/edit/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.posts.destroy');
    
    Route::post('posts/{id}/photos', [App\Http\Controllers\Admin\PhotosController::class, 'store'])->name('admin.posts.photos.store');
    Route::delete('photos/{photo}', [App\Http\Controllers\Admin\PhotosController::class, 'destroy'])->name('admin.photos.destroy');
});