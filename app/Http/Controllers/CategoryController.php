<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new category();
        $category->name = $request->name;
        $category->user_id = auth()->user()->id;
        $category->save();
        return redirect()->route('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = category::where('slug',$slug)->first();
        return view('category.edit',compact('category'));
    }
    public function update(Request $request,$slug)
    {
        $category = category::where('slug',$slug)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $category = category::where('slug',$slug)->first();
        //$category->delete();
        return redirect()->route('category');
    }
}
