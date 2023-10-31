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
        Schema::create('Agenda', function (Blueprint $table) {
            $table->bigInteger('profissional_id')->nullable(false);
            $table->bigInteger('cliente_id')->nullable(false);
            $table->bigInteger('servico_id')->nullable(false);
            $table->date('data_hora')->nullable(false);
            $table->string('tipo_pagamento')->nullable(false);
            $table->decimal('valor')->nullable(false);
          
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Agenda');
    }
};
