<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre')->index()->default('191');
            $table->string('Cliente')->index()->default('191');
            $table->string('Descripcion')->nullable();
            $table->decimal('Precio')->default('7.2')->nullable();
            $table->integer('Cantidad')->nullable();
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
        Schema::dropIfExists('Ventas');
    }
}
