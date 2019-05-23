<?php

use Illuminate\Database\Seeder;

use App\Models\Author;

class TestBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) return;

        foreach ($authors as $author) {
            $book = factory(\App\Models\Book::class)->create();

            $author->books()->attach($book->id);
        }
    }
}
