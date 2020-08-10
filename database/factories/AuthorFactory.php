<?php

/** @var Factory $factory */

use App\Author;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Author::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'dob' => $faker->date()
  ];
});
