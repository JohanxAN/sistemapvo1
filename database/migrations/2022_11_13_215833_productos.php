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
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements("id");
            $table->bigInteger("codigo_producto");
            $table->unsignedBigInteger("id_categoria_producto");
            $table->text("descripcion_producto");
            $table->float("precio_compra_producto");
            $table->float("precio_venta_producto");
            $table->float("utilidad");
            $table->float("stock_producto");
            $table->float("minimo_stock_producto");
            $table->float("ventas_producto");
            $table->foreign("id_categoria_producto")->references("id")->on("categorias")->onDelete("cascade");
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
