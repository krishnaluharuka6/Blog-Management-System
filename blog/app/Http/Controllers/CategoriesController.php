<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('food_blog.categories-list');
        $categories=Category::paginate(10);
        return view('categories.index', compact('categories'))->with('meta_title','CATEGORIES');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category=new Category();
        $request->validate([
            'title'=>'required|min:3|unique:categories,name',
        ]);

        $category->name=$request->title;
        $category->slug=Str::slug($request->title);
        $category->save();
        return redirect()->route('create_category')->with('success','Category Created Successfully !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findorFail($id);
        return view('categories.edit',compact('category'))->with('meta_title','$category->name');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::findorFail($id);
        $request->validate([
            'title'=>'required|min:3|unique:categories,name',
        ]);

        $category->name=$request->title;
        $category->slug=Str::slug($request->title);
        $category->save();
        return redirect()->route('categories.index')->with('success','Category Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findorFail($id);
        $category->delete();
        return redirect()->route('categories')->with('success','Category Deleted');
    }
}
