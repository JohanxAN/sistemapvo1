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
        Schema::create('empresas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements("id");
            $table->text("razon_social");
            $table->bigInteger("rut");
            $table->text("direccion");
            $table->text("marca");
            $table->string("serie_boleta", 4);
            $table->string("nro_correlativo_venta", 8);
            $table->text("email");
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
