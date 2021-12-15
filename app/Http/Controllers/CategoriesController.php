<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //Mostramos los post de ciertas categorias, aqui se carga la relacion de categoria con posts
    public function show(Category $category){
        $posts = $category->posts()->paginate(5);
        $title = "Publicaciones de: {$category->name}";
        return view('pages.home', compact('posts', 'title'));
    }
    
}
