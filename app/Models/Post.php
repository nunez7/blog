<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Atributos a considerarse cuando se actualizan los datos
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id'
    ];

    protected $dates = ['published_at'];

    static $rules = [
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
        'category_id' => 'required',
        'tags' => 'required',
    ];

    //Cuando se elimine un post se eliminan sus etiquetas primero, las fotos
    //y al final su registro
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->tags()->detach();
            $post->photos->each(function ($photo) {
                $photo->delete();
            });
        });
    }

    //renombrando el campo de busqueda
    public function getRouteKeyName()
    {
        return 'url';
    }

    //Mutators
    /*public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $url = str_slug($title);
        $duplicateUrl = Post::where('url', 'LIKE', "{$url}%")->count();
        if($duplicateUrl){
            $url .= "-".++$duplicateUrl;
        }
        $this->attributes['url'] = $url;
    }*/

    public function setPublishAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : NULL;
    }

    public function setCategoryIdAttribute($category_id)
    {
        $this->attributes['category_id'] = Category::find($category_id)
            ? $category_id : Category::create(['name' => $category_id])->id;
    }

    public function attachTags($tags)
    {
        $tagIds = collect($tags)->map(function ($tag) {
            return Tag::find($tag) ?
                $tag :
                Tag::create(
                    ['name' => $tag]
                )->id;
        });
        //Guardamos las etiquetas
        return $this->tags()->attach($tagIds);
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function ($tag) {
            return Tag::find($tag) ?
                $tag :
                Tag::create(
                    ['name' => $tag]
                )->id;
        });
        //Guardamos las etiquetas
        return $this->tags()->sync($tagIds);
    }

    //post->category->name
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /** Query scopes */
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function isPublished(){
        return ! is_null($this->published_at) && $this->published_at<today() ;
    }
}
