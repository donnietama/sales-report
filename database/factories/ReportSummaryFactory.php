<?php

use Faker\Generator as Faker;
use Carbon\Carbon as Carbon;

$factory->define(App\ReportSummary::class, function (Faker $faker) {
    return [
        'store_id' => $faker->randomDigitNotNull,
        'date' => Carbon::now(),
        'gross' => $faker->numberBetween($min = 30000, $max = 100000),
        'nett' => $faker->numberBetween($min = 30000, $max = 100000),
        'voucher' => $faker->numberBetween($min = 30000, $max = 100000),
        'cash' => $faker->numberBetween($min = 30000, $max = 100000),
        'card' => $faker->numberBetween($min = 30000, $max = 100000),
        'ticket' => $faker->numberBetween($min = 30000, $max = 100000),
    ];
});
