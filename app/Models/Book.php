<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'year', 'image_path', 'count',
    ];

    /**
    * Get the authors associated with the given book.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
    */
    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'author_books')
            ->orderBy('authors.name', 'asc')
            ->withTimestamps();
    }
}
