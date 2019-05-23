<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->paginate(10);

        return view('books.index', compact('books'));
    }
}
