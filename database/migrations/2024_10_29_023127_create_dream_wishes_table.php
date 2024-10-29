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
        Schema::create('dream_wishes', function (Blueprint $table) {
            // Chaves estrangeiras com ação de cascata
            $table->foreignId('dream_id')->constrained('dreams')->onDelete('cascade');
            $table->foreignId('wish_id')->constrained('wishes')->onDelete('cascade');

            // Define a chave primária composta
            $table->primary(['dream_id', 'wish_id']);

            // Coluna para prioridade com enum
            $table->enum('priority', ['High', 'Medium', 'Low'])->default('Medium');

            // Timestamps para saber quando o relacionamento foi criado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dream_wishes');
    }
};
