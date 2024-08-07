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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servidor_id');
            $table->foreign('servidor_id')
                ->references('id')
                ->on('servidores');
            $table->unsignedBigInteger('aluno_id')
                ->nullable();
            $table->foreign('aluno_id')
                ->references('id')
                ->on('alunos');
            $table->date('data');
            $table->time('horario');
            $table->enum('status', [
                1, // Disponível
                2, // Agendado
                3, // Realizado
                4, // Cancelado pelo aluno
                5  // Cancelado pelo professor 
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
