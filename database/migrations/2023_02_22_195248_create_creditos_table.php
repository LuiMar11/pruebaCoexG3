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
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->string('num_pagare');
            $table->double('monto_credito');
            $table->double('cuota_inicial');
            $table->date('fecha_credito');
            $table->float('tasa_interes')->nullable();
            $table->date('fecha_desesmbolso')->nullable();
            $table->double('cuota_mensual')->null;
           
            $table->integer('id_cliente')->unsigned();

            $table->foreign('id_cliente')
            ->references('id')
            ->on('clientes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditos');
    }
};
