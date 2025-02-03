<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos_pedidos', function (Blueprint $table) {
            $table->id('id_producto_pedido');
            $table->integer('cantidad_producto_pedido');
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->timestamps();

            $table->foreign('producto_id')->references('id_producto')->on('productos')->onDelete('set null');
            $table->foreign('pedido_id')->references('id_pedido')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_pedidos');
    }
};
