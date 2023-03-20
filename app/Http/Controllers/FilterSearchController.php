<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class FilterSearchController extends Controller
{

    public function index()
    {
        $data['books'] = Book::latest()->filter(request(['search', 'category']))->paginate(12);
        // $data['books'] = Book::with('category')->get();
        $data['currentCategory'] = Category::firstWhere('slug', request('category'));
        $data['categories'] = Category::all();
// dd($data);
        return view('search', $data);
    }
    public function search_with_filter($slug)
    {
        $category = Category::firstWhere('slug', request('category'));
        // dd($category);
        $category_id = $category->id;
        $category_name = $category->name;

        $data['books'] = Book::where('category_id', $category_id)->filter(request(['search', 'category']))->get();
        // $data['books'] = Book::with('category')->get();
        $data['categories'] = Category::all();
        $data['currentCategory'] = Category::firstWhere('slug', request('category'));

        return view('public.book', $data);
    }
    public function filter_by_category($slug)
    {
        $category = category::where('slug', $slug)->first();
        // dd($category);
        $category_id = $category->id;
        $category_name = $category->name;

        $data['books'] = Book::where('category_id', $category_id)->filter(request(['search', 'category']))->get();
        // $data['books'] = Book::with('category')->get();
        $data['categories'] = Category::all();
        $data['currentCategory'] = Category::firstWhere('slug', request('category'));

        return view('public.book', $data);
    }

}
