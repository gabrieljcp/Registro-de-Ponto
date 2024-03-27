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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colaborador_id');
            $table->time('entrada_segunda');
            $table->time('entrada_almoco_segunda');
            $table->time('saida_almoco_segunda');
            $table->time('saida_segunda');
            $table->time('entrada_terca');
            $table->time('entrada_almoco_terca');
            $table->time('saida_almoco_terca');
            $table->time('saida_terca');
            $table->time('entrada_quarta');
            $table->time('entrada_almoco_quarta');
            $table->time('saida_almoco_quarta');
            $table->time('saida_quarta');
            $table->time('entrada_quinta');
            $table->time('entrada_almoco_quinta');
            $table->time('saida_almoco_quinta');
            $table->time('saida_quinta');
            $table->time('entrada_sexta');
            $table->time('entrada_almoco_sexta');
            $table->time('saida_almoco_sexta');
            $table->time('saida_sexta');
            // Repita para os outros dias da semana
            $table->timestamps();
        
            $table->foreign('colaborador_id')->references('id')->on('colaboradores');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
