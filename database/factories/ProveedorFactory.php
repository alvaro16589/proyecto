<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Proveedor;
use Faker\Generator as Faker;

$factory->define(Proveedor::class, function (Faker $faker) {
    //'nombre','estado','celular','direccion'
    return [
        'nombre' => $faker->unique()->company,
        'estado' => $faker->randomElement(['activo','inactivo']),
        'celular' => $faker->numberBetween($min = 7000000, $max = 7999999),
        'direccion' => $faker->address
        
    ];
});
