<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Book;
use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title'      => $faker->name,
        'year'       => rand(2000, 2019),
        'image_path' => Str::random(10),
        'count'      => rand(50, 2000),
    ];
});
