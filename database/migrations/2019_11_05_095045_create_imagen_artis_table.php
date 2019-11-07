<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenArtisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_artis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen', 100);
            $table->unsignedBigInteger('idarti');
            $table->foreign('idarti')->references('id')->on('articulo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagen_artis');
    }
}
