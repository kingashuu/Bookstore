<?php

namespace App\Http\Controllers\Public;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Termwind\Components\Dd;

class PublicController extends Controller
{
    public $search;
    public $sorting;
    public $pagesize;

    public function index()
    {


        $this->sorting = "default";
        $this->pagesize = 12;
        // if ($this->sorting == 'date') {

        //     $data['books'] = Book::orderBy('created_at', 'DESC')->filter(request(['search', 'category']))->Paginate($this->pagesize);
        // } elseif ($this->sorting == 'byNameASC') {
        //     $data['books'] = Book::orderBy('title', 'ASC')->Paginate($this->pagesize);
        // } elseif ($this->sorting == 'byNameDESC') {
        //     $data['books'] = Book::orderBy('title', 'DESC')->filter(request(['search', 'category']))->Paginate($this->pagesize);
        // } else {
        //     $data['books'] = Book::filter(request(['search', 'category']))->Paginate($this->pagesize);
        // }

        // dd(request('search'));


        $data['books'] = Book::latest()->with('category')->paginate(10);

        // dd($data['books']);
        // $data['books'] = Book::latest()->filter(request(['search', 'category']))->get();
        // $data['books'] = Book::with('category')->get();

        $data['categories'] = Category::all();
        $data['Sliders'] = Slider::all();
        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
