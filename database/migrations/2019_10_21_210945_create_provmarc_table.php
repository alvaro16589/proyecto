<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvmarcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provmarc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idusua');
            $table->foreign('idusua')->references('id')->on('usuario')->onDelete('cascade');
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
        Schema::dropIfExists('provmarc');
    }
}
