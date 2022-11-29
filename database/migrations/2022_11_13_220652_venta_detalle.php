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
        Schema::create('venta_detalles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements("id");
            $table->unsignedBigInteger("id_boleta");
            $table->bigInteger("codigo_producto");
            $table->text("descripcion_producto");
            $table->float("cantidad");
            $table->float("precio_unitario");
            $table->float("total_venta");
            $table->dateTime("fecha_venta");
            $table->foreign("id_boleta")->references("id")->on("venta_cabeceras")->onDelete('cascade');
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
