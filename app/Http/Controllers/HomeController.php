<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category=Category::get();
        $subcategory=SubCategory::get();
        $products = Product::where('is_active',1)->orderBy('updated_at', 'desc')->get();
        return view('home',compact('products','category','subcategory'));
    }

    public function detail($slug){
        $product=Product::where('is_active',1)->where('slug',$slug)->first();
        $comments = Comment::orderBy('created_at', 'desc')->get();
        if($product){
            return view('home_detail', compact('product','comments'));
        }
        abort(404);
    }
}
