<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    public function index()
    {
        $category= Category::all();
        return view('admin.category.show',compact('category'));   
    }
    public function create()
    {
        return view('admin.category.add');   
    }
    public function store(Request $request)
    {

        $request->validate([
            'name'      =>    'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required'
            
        ]);


       if ($image = $request->file('image')) 
       {
            $path = 'admin/uploads/new';
            $ext = $image->getClientOriginalExtension();
            $imageName = time(). '.' .$ext;
            $image->move($path , $imageName);
       }

       Category::create([
           'name' => $request->input('name'),
           'slug' => $request->input('slug'),
           'description' => $request->input('description'),
           'status' => $request->input('status') ==TRUE ? '1' :'0',
           'popular' => $request->input('popular') ==TRUE ? '1' :'0',
           'meta_keywoeds' => $request->input('meta_keywoeds'),
           'meta_title' => $request->input('meta_title'),
           'image' => $imageName

       ]);
    

        return redirect('/categories')->with('status' , 'Category Added Successfully');
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request , Category $category)
    {
        $request->validate([
            'name'      =>    'required',
            'slug'      =>    'required'
        ]);

        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $path = 'admin/uploads/new/';
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move($path , $imageName);
            $input['image'] = $imageName;
            unlink('admin/uploads/new/' . $category->image);

            
        }
        
        $category->update([
                
            'name' => $request->input('name'),
           'slug' => $request->input('slug'),
           'description' => $request->input('description'),
           'status' => $request->input('status') ==TRUE ? '1' :'0',
           'popular' => $request->input('popular') ==TRUE ? '1' :'0',
           'meta_keywoeds' => $request->input('meta_keywoeds'),
           'meta_title' => $request->input('meta_title'),
           
            
        ]);

        return redirect('/categories')->with('status' , 'Category Updated Successfully');
        
    } 

    public function destroy(Category $category)
    {
        if ($category->image)
        {
            unlink('admin/uploads/new/' . $category->image);
        }
        
        $category-> delete();
        return redirect()->back()->with('status' , 'user deleted succussfully');
    }

}
