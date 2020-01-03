<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallearticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallearticulo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->float('precio',8,2);
            $table->unsignedBigInteger('idart');
            $table->foreign('idart')->references('id')->on('articulo')->onDelete('cascade');
            $table->unsignedBigInteger('iddetall');
            $table->foreign('iddetall')->references('id')->on('detalle')->onDelete('cascade');
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
        Schema::dropIfExists('detallearticulo');
    }
}
