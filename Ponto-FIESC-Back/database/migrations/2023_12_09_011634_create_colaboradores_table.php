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
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('cpf')->unique(); // Adicionando CPF como campo único
            $table->date('data_nascimento');
            $table->unsignedBigInteger('cargo_id'); // Chave estrangeira para cargo
            $table->unsignedBigInteger('funcao_id'); // Chave estrangeira para função
            $table->boolean('ativo')->default(true); // Campo booleano para ativo
            $table->date('data_admissao');
            $table->date('data_rescisao')->nullable(); // Pode ser nula
            $table->string('usuario')->unique(); // Campo de usuário como único
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
