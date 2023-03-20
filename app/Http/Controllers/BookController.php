<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['books'] = Book::latest()->get();
        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        return view('books.create',['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->title, '-');
        $file = request()->file('book_file');
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'authorName' => 'required',
            'publisher' => 'required',
            'language' => 'required',
            'page_number' => 'required',
            'ISBN_number' => 'required',
            'published_date' => 'required',
            'cover_image' => 'required|image',
            'book_file' => 'required|file|mimes:doc,pdf,docx,zip',
            // 'file_type'=> 'required',
            'Short_description' => 'required',
            'description' => 'required',
        ]);
        $attributes['slug']= $slug;
        $attributes['cover_image'] = request()->file('cover_image')->store('CoverImages',);
        $attributes['book_file']= request()->file('book_file')->store('BooksFile',);
        // $extension = $file->extension();
        Book::create($attributes);

        return redirect('admin/books');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $data['category'] = Category::all();
        $data['book'] = Book::where('slug', $slug)->first();
        // dd($data);
        return view('books.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $data['categories'] = Category::all();
        $data['book'] = $book;
        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Book $book)
    public function update(Book $book)
    {
        // $slug = Str::slug($book->title, '-');
        $attributes = request()->validate([
            'title' => 'required|max:255',
            // 'slug' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'authorName' => 'required',
            'publisher' => 'required',
            'language' => 'required',
            'page_number' => 'required',
            'ISBN_number' => 'required',
            'published_date' => 'required',
            'cover_image' => 'image',
            'book_file' => 'mimes:doc,pdf,docx,zip',
            // 'file_type'=> 'required',
            'Short_description' => 'required',
            'description' => 'required',
        ]);

        $attributes['slug'] = Str::slug($attributes['title'], '-');

        if (isset($attributes['cover_image'])) {
            $attributes['cover_image'] = request()->file('cover_image')->store('CoverImages',);
        }
        if (isset($attributes['book_file'])) {
            $attributes['book_file'] = request()->file('book_file')->store('BooksFle',);
        }

        $book->update($attributes);

        return redirect('admin/books');

        session()->flash('message', 'book updated was successful!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (Storage::exists($book->cover_image)) {
            Storage::delete($book->cover_image);
        }
        if (Storage::exists($book->book_file)) {
            Storage::delete($book->book_file);
        }
        $book->delete();
        return back();
        session()->flash('message', 'book was deleted successful!');
    }

    public function download($id)
    {
        $book = Book::where('id', $id)->firstOrFail();
        $path = public_path('storage/'.$book->book_file);
        return response()->download($path);
    }
}
