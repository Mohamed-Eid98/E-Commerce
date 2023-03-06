<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontController extends Controller
{
    public function index()
    {
        $products_trending = Product::where('trending' , '1')->get();
        $trending_categories = Category::where('popular' , '1')->take(15)->get();
        return view('layouts.frontend.index' , compact('products_trending' ,'trending_categories' ));
    }

    public function category()
    {
        $category = Category::where('status' , '1')->get();
        return view('layouts.frontend.category' , compact('category'));
    }

    public function view_category($slug)
    {
        if(Category::where('slug' , $slug)->exists())
        {
            $category = Category::where('slug' , $slug)->first();       
            $products = Product::where('cate_id' , $category->id)->where('status' , '0')->get();
            return view('layouts.products.index' , compact('category' , 'products'));

        }
        else{
            return redirect('/')->with('status' , 'Page doesnt Exist');
        }
        
    }

    public function prod_view($cate_slug , $prod_slug)
    {
        if(Category::where('slug' , $cate_slug)->exists())
        {
            if(Product::where('slug' , $prod_slug)->exists()){

            }else {
                return redirect('/')->with('status' , 'Link Was Broken');
                
            }

        }
        else{
            return redirect('/')->with('status' , 'No such category');

        }
    }
}
