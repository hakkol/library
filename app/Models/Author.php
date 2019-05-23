<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
    * Get the books associated with the given author.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
    */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'author_books')
            ->orderBy('books.title', 'asc')
            ->withTimestamps();
    }
}