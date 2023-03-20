<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $slug = Str::slug($request->name, '-');
        $attributes = request()->validate([
            'name' => 'required|max:255',
        ]);
        $attributes['slug'] = $slug;
        Category::create($attributes);

        return redirect('admin/category')->with('message', 'New Category Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['categor']=Category::where('id', $id)->first();
        return view('category.show', $data)->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $data['category'] = $category;
        return view('category.edit', $data)->render();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category)
    {
        // $slug = Str::slug($category->name, '-');
        $attributes = request()->validate([
            'name' =>'required|max:255',
        ]);
        $attributes['slug'] = Str::slug($attributes['name'], '-');
        $category->update($attributes);
        return redirect('admin/category')->with('message', 'Category is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
