<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'description' => $faker->realText(rand(100, 150)),
        'is_complete' => rand(0, 1) == 1,
    ];
});
