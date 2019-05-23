<?php

use Illuminate\Database\Seeder;

class TestAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Author::class, 1000)->create();
    }
}
