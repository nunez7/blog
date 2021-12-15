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
        $posts = Post::published()->paginate(5);
        return view('pages.home', compact('posts'));
    }

    public function about(){
        return view('pages.about');
    }

    public function archive(){
        return view('pages.archive');
    }

    public function contact(){
        return view('pages.contact');
    }
}
