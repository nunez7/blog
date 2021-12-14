<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.index',  compact('posts', 'categories', 'tags'));
    }

    /*public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }*/

    public function store(Request $request){
        request()->validate(Post::$rules);
        //dd($request->has($request->published_at));
        $post = new Post();
        $post->title = $request->title;
        //$post->url = Str::slug($request->title);
        $post->body = $request->body;
        $post->iframe = $request->iframe;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->published_at): NULL;
        $post->category_id = $request->category_id;
        $post->save();
        //Guardamos las etiquetas
        $post->tags()->attach($request->tags);
        //Retornamos al form
        $mensaje = 'Tu publicación ha sido creada';
        return back()->with(compact('mensaje'));
    }

    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories', 'tags'));
    }

    public function update(Post $post, Request $request){
        request()->validate(Post::$rules);
        $post->title = $request->title;
        //Se comento porque el mutator sustituye todo
        //$post->url = Str::slug($request->title);
        $post->iframe = $request->iframe;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->published_at): NULL;
        $post->category_id = $request->category_id;
        $post->save();
        //Guardamos las etiquetas
        $post->tags()->sync($request->tags);
        //Retornamos al form
        $mensaje = 'Tu publicación ha sido actualizada';
        return back()->with(compact('mensaje'));
    }
}
