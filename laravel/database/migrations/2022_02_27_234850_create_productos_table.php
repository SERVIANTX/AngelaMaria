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
            $table->uuid("id")->primary();
            $table->string("imagen",200);
            $table->string("nombre_producto",20);
            $table->string("categoria_id",36);
            $table->string("marca_id",36);
            $table->string("descripcion",50);
            $table->string("stock",20);
            $table->string("precio_venta",20);
            $table->string("precio_compra",20);
            $table->string("lote",20);
            $table->softDeletes();
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
        Schema::dropIfExists('productos');
    }
};
