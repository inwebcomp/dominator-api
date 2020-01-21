<?php

use Faker\Generator as Faker;

$factory->define(App\Route::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->words(3, true)),
        'color' => $faker->hexColor,
        'easier' => $faker->boolean(30),
    ];
});
