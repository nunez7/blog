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
        $photo =  request()->file('photo');
    }
}
