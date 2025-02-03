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
        Schema::create('tipos_usuarios', function (Blueprint $table) {
            $table->id('id_tipo_usuario');
            $table->string('tipo_usuario');
            $table->timestamps();
        });

        DB::table('tipos_usuarios')->insert([
            ['tipo_usuario' => 'Administrador'],
            ['tipo_usuario' => 'Gerente'],
            ['tipo_usuario' => 'Almacenista'],
            ['tipo_usuario' => 'Cliente'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_usuarios');
    }
};
