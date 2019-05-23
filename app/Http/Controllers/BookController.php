<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booksQuery = Book::orderBy('created_at', 'DESC')->with('authors');

        $search = request()->search;

        if ($search) {
            $booksQuery = $booksQuery->where('title', 'like', '%' . $search . '%')
                ->orWhereHas('authors', function($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                 });
        }

        $books = $booksQuery->paginate(10);

        return view('books.index', compact('books'));
    }
}
