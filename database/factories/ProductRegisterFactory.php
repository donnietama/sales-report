<?php

use Faker\Generator as Faker;

$factory->define(App\ProductRegister::class, function (Faker $faker) {
    return [
        'product_name' => $faker->sentence,
    ];
});
