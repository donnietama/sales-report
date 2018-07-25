<?php

use Faker\Generator as Faker;

$factory->define(App\ReportAdditional::class, function (Faker $faker) {
    return [
        'date' => $faker->date,
        'store_id' => $faker->randomDigitNotNull,
        'product_id' => $faker->randomDigitNotNull,
        'quantity' => $faker->randomDigitNotNull,
    ];
});
