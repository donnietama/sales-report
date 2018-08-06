<?php

use Faker\Generator as Faker;

$factory->define(App\Topping::class, function (Faker $faker) {
    return [
        'product_id' => $faker->randomDigitNotNull(),
        'topping_name' => $faker->sentence,
        'quantity' => $faker->randomDigitNotNull()
    ];
});
