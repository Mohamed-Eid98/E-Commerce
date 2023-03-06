<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class imageController extends Controller
{
    
    public function addd()
    {
        return view('imageAddd');
    }

    public function inserttt(Request $request)
    {
        $category = new Post();

        if ($request->hasFile('file'))
    //     {
    //         $file = $request->file('file');
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time(). '.' .$ext;
    //         $file->move('public' , $filename);
    //         $category->image = $filename;
    //     }

    // $category = new Post();
    // $category->name = $request->input('name');
    // $category->save();
    // return redirect()->back();
    // }

    {
      
    $file = $request->file('file');
    $ext = $file->getClientOriginalExtension();
    $filename = time(). '.' .$ext;
    $file->move('admin' , $filename);
    $category->image = $filename;


}


    $category->name = $request->input('name');
    $category->save();
    return redirect()->back();
    }

}
