<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    //'nombre','apellido','ci'
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'ci' => $faker->numberBetween($min = 7000000, $max = 9999999)
    ];
});
