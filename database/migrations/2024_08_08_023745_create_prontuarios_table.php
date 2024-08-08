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
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servidor_id');
            $table->foreign('servidor_id')
                 ->references('id')
                 ->on('servidores');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')
                 ->references('id')
                 ->on('alunos');
            $table->string('observacao')->nullable();
            $table->string('terapia')->nullable();
            $table->string('medicacao')->nullable();     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prontuarios');
    }
};
