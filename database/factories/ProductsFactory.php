<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    $products = [
        [
            'cabbages',
            1
        ],
        [
            'carrots',
            1
        ],
        [
            'apples',
            2
        ],
        [
            'grapes',
            2
        ],
        [
            'pork',
            3
        ],
        [
            'beef',
            3
        ],
        [
            'tuna',
            4
        ],
        [
            'salmon',
            4
        ],
        [
            'apple juice',
            5
        ],
        [
            'grape juice',
            5
        ],
    ];

    $randomNumber = $faker->numberBetween(0, 4);

    return [
        'name' => $products[$randomNumber][0],
        'ean' => $faker->ean13,
        'product_type_id' => $products[$randomNumber][1],
        'color' => $faker->colorName,
        'image' => 'public/no_image.png'
    ];
});
