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
        Schema::create('wish_suggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wish_id')
                  ->constrained('wishes')
                  ->onDelete('cascade'); // Relacionamento com a tabela 'wishes' com exclusão em cascata
            $table->string('suggested_product_name'); // Nome do produto sugerido
            $table->integer('suggested_price'); // Preço do produto sugerido
            $table->string('suggested_store', 255); // Nome da loja sugerida, com limite de caracteres
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wish_suggestions');
    }
};
