<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductDetails;
use Faker\Generator as Faker;

$factory->define(ProductDetails::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,50),
        'quantity' => $faker->randomNumber(5),
        'price' => $faker->randomFloat(2, 0.01, 100)
    ];
});
