<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    //
    public function store(Request $request, $id)
    {
        //validamos aqui
        $this->validate(request(), [
            'photo' => 'required|image|max:2048',
        ]);

        Photo::create([
            'url'=> request()->file('photo')->store('posts','public'),
            'post_id'=> $id
        ]);

        // Storage::url($photoUrl);
    }

    public function destroy(Photo $photo){
        //Eliminamos la foto en la DB
        $photo->delete();
        //retornamos mensaje
        $mensaje = 'Foto eliminada';
        return back()->with(compact('mensaje'));
    }
}
