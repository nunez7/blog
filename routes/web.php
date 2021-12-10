<?php

use App\Models\Post;
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

Route::get('/', function () {
    $posts = Post::latest('published_at')->get();
    return view('welcome', compact('posts'));
});

Route::get('admin', function(){
    return view('admin.dashboard');
});
Auth::routes(['register'=>false]);
//Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
