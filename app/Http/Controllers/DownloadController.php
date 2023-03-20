<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use DB;

class DownloadController extends Controller
{

    public function download($id)
    {
        $book = Book::where('id', $id)->firstOrFail();
        $path = public_path('storage/' . $book->book_file);
        return response()->download($path);
    }
}
