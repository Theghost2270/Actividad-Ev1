<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /*public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('id_evento');
            $table->string('titulo', 255);
            $table->text('descripcion');
            $table->unsignedBigInteger('organizador');
            $table->decimal('costo', 10, 2)->default(0.00);
            $table->integer('edad_minima')->nullable();
            $table->unsignedBigInteger('tematica');
            $table->date('fecha');
            $table->time('hora');
            $table->string('ubicacion', 255);
            $table->string('contacto', 100);
            $table->foreign('organizador')->references('id_usuario')->on('usuarios');
            $table->foreign('tematica')->references('id_tematica')->on('tematicas');
        });
    }*/
    public function up()
{
    Schema::create('events', function (Blueprint $table) {
        $table->id('id_evento');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('titulo');
        $table->text('descripcion')->nullable();
        $table->string('organizador')->nullable();
        $table->decimal('costo', 8, 2)->nullable();
        $table->integer('edad_minima')->nullable();
        $table->string('tematica')->nullable();
        $table->date('fecha')->nullable();
        $table->time('hora')->nullable();
        $table->string('ubicacion')->nullable();
        $table->string('contacto')->nullable();
        //$table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
    
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
