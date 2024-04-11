<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre')->nullable();
            $table->integer('Propietario')->nullable();
            $table->string('Especie')->nullable();
            $table->integer('Edad')->nullable();
            $table->string('Descripción de la enfermedad')->nullable();
            $table->string('Foto')->nullable();
            $table->integer('Veterinario')->nullable();
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
        Schema::dropIfExists('Mascotas');
    }
}
