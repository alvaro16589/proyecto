<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use Faker\Generator as Faker;

$factory->define(Articulo::class, function (Faker $faker) {
    //'estado','nombre','descripcion','imagen','vencimiento','stok','precio'
    return [
        'estado' => 'activo',
        'nombre' => $faker->company,
        'descripcion' => $faker->address,
        'imagen' => 'default-150x150.png',
        'vencimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'stok' => $faker->numberBetween($min = 10, $max = 300),
        'precio' => $faker->randomFloat($nbMaxDecimals = 1, $min = 5, $max = 60),
        'idusua' => $faker->numberBetween($min = 1, $max = 25),
        'idmar' => $faker->numberBetween($min = 1, $max = 10),
        'idprov' => $faker->numberBetween($min = 1, $max = 20)
    ];
});
