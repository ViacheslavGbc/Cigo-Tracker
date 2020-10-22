<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use File;

class UploadFileController extends Controller
{

    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
      /*  $this->validate($request,[
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'  //what formats should we validate?
        ]); */
        $image = $request->file('select_file');
        $folder_name = $request->input('event_id'); //this is current event_id !!!
        //$new_name = rand().'.'.$image->getClientOriginalExtension(); // do we need a random one?
        $new_name = $image->getClientOriginalName();
        $directory = public_path("images").'/'.$folder_name;
        File::makeDirectory($directory,0777,true,true);
        $image->move($directory, $new_name);
        return back()->with('success', 'File uploaded successfully'
        )->with('path', $new_name);
    }

    public function show($id, $name)
    {
        $path = public_path('images\\').$id.'\\'.$name;
        return response()->download($path);
    }

}
