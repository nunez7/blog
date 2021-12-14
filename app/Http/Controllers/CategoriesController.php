<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //Mostramos los post de ciertas categorias, aqui se carga la relacion de categoria con posts
    public function show(Category $category){
        $posts = $category->posts()->paginate(5);
        return view('welcome', compact('posts', 'category'));
    }
    
}
