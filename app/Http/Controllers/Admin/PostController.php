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

    public function store(Request $request){
        request()->validate(Post::$rules);
        //dd($request->has($request->published_at));
        $post = Post::create($request->all());
        $post->url = str_slug($request->title)."-{$post->id}";
        $post->user_id = auth()->id();
        $post->save();
        //Guardamos las etiquetas
        $post->attachTags($request->tags);
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
        $post->update($request->all());
        $post->syncTags($request->tags);
        //Retornamos al form
        $mensaje = 'Tu publicación ha sido actualizada';
        return back()->with(compact('mensaje'));
    }

    public function destroy($id){
        //Eliminar referencias
        //return $post;
        //$post->photos()->delete();
        $post = Post::find($id);
        $post->delete();
        $mensaje = 'Tu publicación ha sido eliminada';
        return back()->with(compact('mensaje'));
    }
}
