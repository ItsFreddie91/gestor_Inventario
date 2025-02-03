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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre_producto');
            $table->string('descripcion_producto');
            $table->string('foto_producto');
            $table->string('codigo_producto');
            $table->decimal('precio_producto');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id_categoria')->on('categorias');
            $table->foreign('proveedor_id')->references('id_proveedor')->on('proveedores')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
