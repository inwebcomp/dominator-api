<?php

use App\Attempt;
use Faker\Generator as Faker;

$factory->define(Attempt::class, function (Faker $faker) {
    return [
        'comment' => $faker->optional()->text,
        'type' => $faker->randomElement(array_keys(Attempt::types()))
    ];
});
