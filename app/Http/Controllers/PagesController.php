<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PagesController extends Controller
{
    //
    public function index()
    {
        //Muestra los posts que tienen fecha de publicacion
        /*
             $posts = Post::whereNotNull('published_at')
        ->where('published_at', '<=', Carbon::now())
        ->latest('published_at')
        ->get();
        */
        $posts = Post::published()->get();
        return view('welcome', compact('posts'));
    }
}
