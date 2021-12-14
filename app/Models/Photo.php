<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;
    //Desactivamos el guardado masivo
    protected $guarded = [];

    //metodo sobreescrito para eliminar una foto cuando se elimina el registro
    protected static function boot(){
        parent::boot();
        
        static::deleting(function($photo){
            Storage::disk('public')->delete($photo->url);
        });
    }
}
