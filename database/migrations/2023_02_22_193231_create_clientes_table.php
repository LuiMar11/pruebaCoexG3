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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula');
            $table->string('direccion');
            $table->string('telefono',10);
            $table->string('contacto')->nullable();
            $table->double('cupo_total');
            $table->string('ciudad');
            $table->double('cupo_disponible');
            $table->string('estado')->nullable();
            $table->integer('dias_gracia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
