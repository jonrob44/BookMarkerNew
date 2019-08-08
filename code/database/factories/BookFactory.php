<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'ISBN' => $faker->password,
        'owner_id' => function() {
            return factory(\App\User::class)->create()->id;
        }
    ];
});
