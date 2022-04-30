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
        //
        schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPelicula');
            $table->foreign('idPelicula')->references('idPelicula')->on('peliculas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('formato', 30);
            $table->string('hora', 10);
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
        //
    }
};
