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
Route::get('home', [App\Http\Controllers\PagesController::class, 'index']);
//Grupos de rutas
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
});

Route::get('admin', [App\Http\Controllers\HomeController::class, 'index']);
