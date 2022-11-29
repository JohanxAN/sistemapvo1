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
        Schema::create('venta_cabeceras', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements("id");
            $table->unsignedBigInteger("id_empresa");
            $table->text("descripcion");
            $table->float("subtotal");
            $table->float("IVA");
            $table->float("total_venta");
            $table->dateTime("fecha_venta");
            $table->float("monto_efectivo");
            $table->foreign("id_empresa")->references("id")->on("empresas");
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
