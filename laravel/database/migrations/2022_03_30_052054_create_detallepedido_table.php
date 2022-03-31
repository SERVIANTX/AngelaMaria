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
        Schema::create('detallepedido', function (Blueprint $table) {
            $table->string("idpedido",36);
            $table->string("idproducto",36);
            $table->string("CantidadProducto",20);
            $table->string("PrecioUnitario",36);
            $table->string("Subtotal",50);
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
        Schema::dropIfExists('detallepedido');
    }
};
