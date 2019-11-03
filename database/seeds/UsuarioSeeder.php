<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = ['administrador',
        'vendedor',
        'secretaria'];
        foreach($tipo as $key=>$value)
        DB::insert('insert into users (nombre,apellido,contraseña,estado,tipo) values ("jose","perez","contraseña","activo",$key)');
    }
}
