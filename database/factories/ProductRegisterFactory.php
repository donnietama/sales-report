<?php

use Faker\Generator as Faker;

$factory->define(App\ProductRegister::class, function (Faker $faker) {
    return [
        'product_name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
    ];
});
