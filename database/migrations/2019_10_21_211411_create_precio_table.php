<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('precio');
            $table->unsignedBigInteger('idusua');
            $table->foreign('idusua')->references('id')->on('usuario')->onDelete('cascade');
            $table->unsignedBigInteger('iduart');
            $table->foreign('iduart')->references('id')->on('articulo')->onDelete('cascade');
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
        Schema::dropIfExists('precio');
    }
}
