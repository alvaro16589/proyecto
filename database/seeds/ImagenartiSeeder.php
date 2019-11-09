<?php

use Illuminate\Database\Seeder;
use App\ImagenArti;

class ImagenartiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ImagenArti::class,120)->create();
    }
}
