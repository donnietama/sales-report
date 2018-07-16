<?php

use Faker\Generator as Faker;

$factory->define(App\WasteReport::class, function (Faker $faker) {
    return [
        'store_id' => $faker->randomDigitNotNull,
        'green_tea_jasmine' => $faker->randomDigitNotNull,
        'black_tea' => $faker->randomDigitNotNull,
        'quan_yin' => $faker->randomDigitNotNull,
        'matcha' => $faker->randomDigitNotNull,
        'royal' => $faker->randomDigitNotNull,
        'coffee' => $faker->randomDigitNotNull,
        'choco' => $faker->randomDigitNotNull,
        'cheese' => $faker->randomDigitNotNull,
    ];
});
