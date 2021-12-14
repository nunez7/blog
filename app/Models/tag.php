<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(){
        return 'url';
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
