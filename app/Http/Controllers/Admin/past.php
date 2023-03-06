<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\FileExists;
use Spatie\Backtrace\File;

use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    public function index()
    {
        $category= Category::all();
        return view('admin.category.show')->with('category' , $category );   
    }
    public function add()
    {
        return view('admin.category.add');   
    }
    public function insert(Request $request)
    {

        $category = new Category();
    if ($request->hasFile('image'))
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time(). '.' .$ext;
        $file->move('assets\uploads\category' , $filename);
        $category->image = $filename;

    }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE? '1' :'0';
        $category->popular = $request->input('popular') == TRUE? '1' :'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

        return redirect('/dashboard')->with('status' , 'Category Added Successfully');
    }


    public function edit_prod($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit')->with('category' , $category);
    }
    public function update_prod(Request $request , $id)
    {
        $category = Category::find($id);

        // if ($image = $request->file('image')) {
        //     $imageDestinationPath = 'assets/admin/category/';
        //     $postImage = time() . "." . $image->getClientOriginalExtension();
        //     $image->move($imageDestinationPath, $postImage);
        //     $category['image'] = "$postImage";
        // }else{
        //     unset($category['image']);
        // }
        // if ($image = $request->file('image')) {
        //     $path = 'assets/admin/category/';
        //     $filename = time() . "." . $image->getClientOriginalExtension();
        //     $image->move($path, $filename);
        //     $category['image'] = "$filename";
        // }else{
        //     unset($category['image']);
        // }
        

        // if ($request->hasFile('image'))
        // {

        //     if($category->image != ''  && $category->image != null){
        //         $path='assets/admin/category'.$category->image;
        //         unlink($path);
        //    }

        //     $file= $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time(). '.'.$ext;
        //     $file->move('assets\uploads\category' , $filename);
        //     $category->image = $filename;
        // }    
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE? '1' :'0';
        $category->popular = $request->input('popular') == TRUE? '1' :'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();

        return redirect('/categories')->with('status' , 'Category Updated Successfully');
        
    } 


        public function destroy($id)
            {
                $category = Category::find($id);
                if ($category->image)
                {
                    $path = 'assets\uploads\category' .$category->image ;
                    
                    if(File_Exists($path))
                    {
                        unlink($path);
                    }
                    
                }
                $category->delete();
                return redirect()->back();
            }

}

