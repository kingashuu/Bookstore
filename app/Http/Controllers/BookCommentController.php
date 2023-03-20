<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookCommentController extends Controller
{
    public function store(Book $book)
    {
        request()->validate([
            'body'=>'required'
        ]);
        $book->comments()->create([
            // 'user_id'=>auth()->user()->id,
            'user_id'=>request()->user()->id,
            'body'=>request('body'),

        ]);

    return back();
    }
}
