<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Helpers\ImageHelper;
use Cviebrock\EloquentSluggable\Sluggable;


class ProductController extends Controller
{
    use ImageHelper;
    public function index()
    {
        $mainCategories = Category::get();
        $subCategories =SubCategory::get();
        $products = Product::get();
        return view('product.index',compact('products','mainCategories','subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategories = Category::get();
        $subCategories =SubCategory::get();
        return view('product.create',compact('mainCategories','subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $img_url =  $this->uploadImage($request->file('image'), 'users');
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $img_url;
        $product->user_id =auth()->user()->id;
        $product->save();
        return redirect()->route('product.index')->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product,$slug)
    {
        $product = Product::where('slug',$slug)->first();
        if($product){
            return view('product.show',compact('product'));
        }
        abort(404);
    }

    public function statusUpdate($slug)
    {
        $product = Product::where('slug',$slug)->first();
        if($product->is_active == 1){
            $product->is_active = 0;
            $product->save();
        }else{
            $product->is_active = 1;
            $product->save();
        }
        return redirect('product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product,$slug)
    {
        $product = Product::where('slug',$slug)->first();
        $mainCategories = Category::get();
        $subCategories =SubCategory::get();
        return view('product.edit',compact('product','mainCategories','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product,$slug)
    {

        $product = Product::where('slug',$slug)->first();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->slug = $request->name;
        $product->user_id =auth()->user()->id;
        $product->save();
        return redirect()->route('product.index')->with('success','Subcategory updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product,$slug)
    {

        $category = Product::where('slug',$slug)->first();
        $category->delete();
        return redirect()->route('product.index');
    }
}
