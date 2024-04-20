<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturaDetalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idVenta')->nullable();
            $table->string('Descripcion')->nullable();
            $table->decimal('Precio')->nullable();
            $table->integer('Cantidad')->nullable();
            $table->decimal('Total')->nullable();
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
        Schema::dropIfExists('facturaDetalle');
    }
}
