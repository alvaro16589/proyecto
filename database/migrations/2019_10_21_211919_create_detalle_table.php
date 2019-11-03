<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->unsignedBigInteger('idclie');
            $table->foreign('idclie')->references('id')->on('cliente')->onDelete('cascade');
            $table->unsignedBigInteger('idart');
            $table->foreign('idart')->references('id')->on('articulo')->onDelete('cascade');
            $table->integer('cantidad');
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
        Schema::dropIfExists('detalle');
    }
}
