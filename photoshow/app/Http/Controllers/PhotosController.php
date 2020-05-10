<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create(int $albumId) {
        return view('photos.create')->with('albumId', $albumId);
    }

    public function store(Request $request) {
        
        //validate the inputs
        $this->validate($request, 
            [
                'title' => 'required',
                'description' => 'required',
                'photo' => 'required|image'
            ]
        );

        //Get the original file name
        $filenameWithExtension = $request->file('photo')->getClientOriginalName();

        //Extract only file name 
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //Extract the extension
        $extension = pathinfo($filenameWithExtension, PATHINFO_EXTENSION);

        
        $fileNameToStore = $filename . '_' . time() . "." .$extension;

        //Save the image
        $request->file('photo')->storeAs("public/albums/".$request->input('album_id'), $fileNameToStore);

        //Save the data
        $photo = new Photo(); 
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $fileNameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo uploaded successfully');

    }

    public function show($id) {

        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id) {

        $photo = Photo::find($id);
        
        if(Storage::delete('public/albums/'.$photo->album_id.'/'.$photo->photo)) {
            $photo->delete();
            return redirect('/')->with('success', 'Photo deleted successfully');
        }
        

        

    }
}
