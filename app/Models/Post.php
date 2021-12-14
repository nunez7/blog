<?php

namespace App\Models;

use Carbon\Carbon;
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
		'category_id' => 'required',
		'tags' => 'required',
    ];
    
    //renombrando el campo de busqueda
    public function getRouteKeyName(){
        return 'url';
    }

    //Mutators
    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }

    //post->category->name
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    /** Query scopes */
    public function scopePublished($query){
        $query->whereNotNull('published_at')
        ->where('published_at', '<=', Carbon::now())
        ->latest('published_at');
    }
}
