<?php

use Faker\Generator as Faker;

$factory->define(App\BatchReport::class, function (Faker $faker) {
    return [
        'store_id' => $faker->randomDigitNotNull,
        'product_id' => $faker->randomDigitNotNull,
        'quantity' => $faker->numberBetween($min = 30000, $max = 100000),
    ];
});
