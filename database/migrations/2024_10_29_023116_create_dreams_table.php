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
        Schema::create('dreams', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título da lista de desejos
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Exclusão em cascata ao excluir o usuário
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->nullOnDelete(); // Define como NULL ao excluir a categoria
            $table->integer('price_range_min')->nullable(); // Faixa de preço mínima
            $table->integer('price_range_max')->nullable(); // Faixa de preço máxima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dreams');
    }
};
