<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ImagenArti;
use Faker\Generator as Faker;

$factory->define(ImagenArti::class, function (Faker $faker) {
    return [
        'imagen' => $faker->randomElement(['prod-1.jpg','prod-2.jpg','prod-3.jpg','prod-4.jpg','prod-5.jpg']),        
        'idarti' => $faker->numberBetween($min = 1, $max = 40)
    ];
});
