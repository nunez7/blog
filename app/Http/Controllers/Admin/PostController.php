<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index',  compact('posts'));
    }
}
