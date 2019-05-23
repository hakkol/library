<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    /**
     * Store book
     * @param  $data  array
     * @param  $author_id  integer
     *
     * @return App\Models\Book book
     */
    public function store($data, $author_id)
    {
        $book = Book::where('title', $data['title'])
            ->whereHas('authors', function($query) use ($author_id) {
                $query->where('authors.id', $author_id);
            })->first();

        if (!$book) {
            $book = BooK::create($data);

            $book->authors()->attach($author_id);
        }

        return $book;
    }
}