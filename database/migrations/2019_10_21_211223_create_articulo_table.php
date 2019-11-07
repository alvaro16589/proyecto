<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estado', 60);
            $table->string('nombre', 60);
            $table->string('descripcion', 100);
            $table->string('imagen', 150);
            $table->date('vencimiento');
            $table->integer('stok');
            $table->float('precio',6,2);
            $table->unsignedBigInteger('idusua');
            $table->foreign('idusua')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('idmar');
            $table->foreign('idmar')->references('id')->on('marca')->onDelete('cascade');
            $table->unsignedBigInteger('idprov');
            $table->foreign('idprov')->references('id')->on('proveedor')->onDelete('cascade');
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
        Schema::dropIfExists('articulo');
    }
}
