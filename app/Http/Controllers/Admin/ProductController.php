<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.show' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::all();
        return view('admin.product.add' , compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
    
    
        if($image = $request->file('image'))
        {
            $path = 'admin/uploads/products/';
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->move($path , $imageName);
            
        }

        Product::create([
            'name' =>$request->input('name'),
            'slug' =>$request->input('name'),
            'cate_id' =>$request->input('cate_id'),
            'original_price' =>$request->input('original_price'),
            'selling_price' =>$request->input('selling_price'),
            'small_description' =>$request->input('description'),
            'meta_title' =>$request->input('meta_title'),
            'meta_description' =>$request->input('meta_description'),
            'meta_keywords' =>$request->input('meta_keywords'),
            'qty' =>$request->input('quantity'),
            'tax' =>$request->input('tax'),
            'status' =>$request->input('status') == TRUE ? '1':'0',
            'trending' =>$request->input('trending')== TRUE ? '1':'0',
            'image' =>$imageName
        ]);

        return redirect()->route('products.index')->with('status' , 'Products Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Product $product)
    {
        $category = Category::find($product);
        return view('admin.product.edit', compact('category' , 'product') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:5048',
        ]);


     
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $path = 'admin/uploads/products/';
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move($path , $imageName);
            $input['image'] = $imageName;
            // if(public_path('admin/uploads/products/' . $imageName))
            // {
            //    unlink('admin/uploads/products/' . $product->image);
            // }
            
        }
        
        $product->update([
            'name' =>$request->input('name'),
            'slug' =>$request->input('name'),
            'cate_id' =>$request->input('cate_id'),
            'original_price' =>$request->input('original_price'),
            'selling_price' =>$request->input('selling_price'),
            'small_description' =>$request->input('description'),
            'meta_title' =>$request->input('meta_title'),
            'meta_description' =>$request->input('meta_description'),
            'meta_keywords' =>$request->input('meta_keywords'),
            'qty' =>$request->input('quantity'),
            'tax' =>$request->input('tax'),
            'status' =>$request->input('status') == TRUE ? '1':'0',
            'trending' =>$request->input('trending')== TRUE ? '1':'0',
            'image' =>$imageName
            
        ]);

        return redirect('/products')->with('status' , 'Product Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image)
        {
            unlink('admin/uploads/products/' . $product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('status' , 'The Product Deleted Successfully');
    }
}
