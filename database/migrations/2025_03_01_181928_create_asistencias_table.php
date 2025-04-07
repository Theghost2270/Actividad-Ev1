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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('id_asistencia');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_evento');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_evento')->references('id_evento')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
