<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //
    public function store(Request $request, $id)
    {
        //validamos aqui
        $this->validate(request(), [
            'photo' => 'required|image|max:2048',
        ]);

        //Subimos los archivos
        $photo =  request()->file('photo')->store('public');
        //en storage
        $photoUrl = Storage::url($photo);

        Photo::create([
            'url'=> $photoUrl,
            'post_id'=> $id
        ]);

        return Storage::url($photoUrl);
    }
}
