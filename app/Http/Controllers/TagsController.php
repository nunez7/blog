<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    //
    public function show(Tag $tag){
        $posts = $tag->posts()->paginate(5);
        $title = "Publicaciones del #{$tag->name}";
        return view('welcome', compact('posts', 'title'));
    }
}
