<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Usuario;
use Faker\Generator as Faker;

$factory->define(Usuario::class, function (Faker $faker) {
    
            
             return [
                        'nombre' => $faker->firstName,
                        'apellido' => $faker->lastName,
                        'contraseña' => $faker->password,
                        'estado' => 'activo',
                        'tipo' => $faker->randomElement(['administrador','vendedor','secretaria']),
                        'foto' => 'user2-160x160.jpg'
            ];
        
});
