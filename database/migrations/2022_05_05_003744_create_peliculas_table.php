<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->bigIncrements('idPelicula');
            $table->unsignedBigInteger('idCine');
            $table->foreign('idCine')->references('idCine')->on('cines')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre', 60);
            $table->string('categoria', 20);
            $table->integer('duracion');
            $table->string('sinopsis', 200);
            $table->string('imagenURL');
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
        Schema::dropIfExists('peliculas');
    }
};
