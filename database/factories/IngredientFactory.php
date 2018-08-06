<?php

use Faker\Generator as Faker;

$factory->define(App\Ingredient::class, function (Faker $faker) {
    return [
        'product_id' => $faker->randomDigitNotNull,
        'ingredient_name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'quantity' => $faker->numberBetween($min = 1000, $max = 100000),
    ];
});
