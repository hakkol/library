<?php

namespace App\Services;

use App\Models\Author;

class AuthorService
{
    /**
     * Store author
     * @param  $name  string
     *
     * @return App\Models\Author author
     */
    public function store($name)
    {
        $author = Author::where('name', $name)->first();

        if (!$author) $author = Author::create(['name' => $name]);

        return $author;
    }
}