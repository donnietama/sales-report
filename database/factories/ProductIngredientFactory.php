<?php

use Faker\Generator as Faker;

$factory->define(App\ProductIngredient::class, function (Faker $faker) {
    return [
        'product_id' => $faker->randomDigitNotNull,
        'ingredient' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'quantity' => $faker->numberBetween($min = 1000, $max = 100000),
    ];
});
