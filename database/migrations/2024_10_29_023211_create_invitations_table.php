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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dream_id')
                ->constrained('dreams')
                ->onDelete('cascade'); // Excluir convites se o sonho for excluído
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade'); // Excluir convites se o usuário for excluído
            $table->string('invitee_email');
            $table->binary('qr_code')->nullable(); // Deixe nulo se o QR code for opcional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
