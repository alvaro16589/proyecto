<?php

use Illuminate\Database\Seeder;
use App\Marca;
class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Marca::class,10)->create();
    }
}
