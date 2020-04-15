<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'description' => $faker->realText(rand(100, 150)) . ' ' . rand(1, 5),
        'is_complete' => rand(0, 1) == 1,
    ];
});
