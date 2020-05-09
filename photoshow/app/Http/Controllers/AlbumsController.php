<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsController extends Controller
{
    
    public function index() {
        return view('albums.index');
    }

    public function create() {
        return view('albums.create');
    }

    public function store(Request $request) {
        
        //validate the inputs
        $this->validate($request, 
            [
                'name' => 'required',
                'description' => 'required',
                'cover-image' => 'required|image'
            ]
        );

        //Get the original file name
        $filenameWithExtension = $request->file('cover-image')->getClientOriginalName();

        //Extract only file name 
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //Extract the extension
        $extension = pathinfo($filenameWithExtension, PATHINFO_EXTENSION);

        $fileNameToStore = $filename . '_' . time() . "." .$extension;

        //Save the image
        $request->file('cover-image')->storeAs('public/album_covers', $fileNameToStore);

        //Save the data
        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Album created successfully');

    }
}
