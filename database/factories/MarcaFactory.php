<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Marca;
use Faker\Generator as Faker;

$factory->define(Marca::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->company,
        'ciudad' => $faker->randomElement(['La Paz','Oruro','Potosí','Santa Cruz','Cochabamba','Beni','Pando','Tarija'])
    ];
});
