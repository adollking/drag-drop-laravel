<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DropZoneController extends Controller
{
    //create view drop zone
    public function dropzone(){
        return view('dropzone');
    }
    
    public function dropzoneStore(Request $request){
        $image = $request->file('file');
        $imageName =time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        return response()->json(['success'=>$imageName]);
    }
    public function dropzoneGetAll()
    {
        $directory = public_path('images');
        $files = Storage::disk($directory)->allFiles();

        dd($files);
    }

}
