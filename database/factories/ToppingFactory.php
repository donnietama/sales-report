<?php

use Faker\Generator as Faker;

$factory->define(App\Topping::class, function (Faker $faker) {
    return [
        'topping_name' => $faker->sentence,
    ];
});
