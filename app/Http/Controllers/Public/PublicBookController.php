<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicBookController extends Controller
{

    public $search;
    public $orderby;
    public $per_page;

    public function index()
    {
        // $this->orderby = "default";
        // $this->per_page = 12;
        // if ($this->orderby == 'date') {
        //     $data['books'] = Book::orderBy('created_at', 'DESC')->filter(request(['search', 'category']))->paginate(12);
        // } elseif ($this->orderby == 'by_asc') {
        //     $data['books'] = Book::orderBy('title', 'ASC')->paginate(12);
        // } elseif ($this->orderby == 'by_desc') {
        //     $data['books'] = Book::orderBy('title', 'DESC')->filter(request(['search', 'category']))->paginate(12);
        // } else {
        //     $data['books'] = Book::filter(request(['search', 'category']))->paginate(12);
        // }
        // $data['books'] = Book::latest()->get();
        $data['categories'] = Category::all();
       return view('public.book', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $data['category'] = Category::all();
        $data['book'] = Book::where('slug', $slug)->first();
        // dd($data);
        return view('public.show-book', $data);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
