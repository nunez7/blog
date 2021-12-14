<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function getRouteKeyName(){
        return 'url';
    }
    //relacion a posts
    public function posts(){
        return $this->hasMany(Post::class);
    }
    //Accesors
    /*public function getNameAttribute($name){
        return str_slug($name);
    }*/

    //Mutators (se ejecutan antes de guardar o actualizar el modelo)
    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }

}
