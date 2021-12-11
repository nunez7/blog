<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $dates = ['published_at'];

    static $rules = [
		'title' => 'required',
		'excerpt' => 'required',
		'body' => 'required',
		'published_at' => 'required',
		'category_id' => 'required',
		'tags' => 'required',
    ];

    //post->category->name
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
