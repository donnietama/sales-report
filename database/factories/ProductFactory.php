<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $productName = $faker->sentence($nbWords = 2, $variableNbWords = true);

    return [
        'slug' => str_slug($productName, '-'),
        'product_name' => $productName,
        'product_size' => $faker->sentence,
        'preview_url' => '//picsum.photos/1024/1024/?random',
        'product_description' => $faker->text($maxNbChars = 450),
    ];
});
