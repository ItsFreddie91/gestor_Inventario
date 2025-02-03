<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('correo_usuario');
            $table->string('contrasena_usuario');
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->timestamps();

            $table->foreign('tipo_usuario_id')->references('id_tipo_usuario')->on('tipos_usuarios');
            $table->foreign('sucursal_id')->references('id_sucursal')->on('sucursales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
