<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            // Solicitante
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('department')->nullable();

            // Ingeniero asignado (nullable: se asigna al tomar el ticket)
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();

            // Clasificación (nullable: se asigna al revisar el ticket)
            $table->foreignId('category_id')->nullable()->constrained('ticket_categories')->nullOnDelete();

            $table->text('description');

            // alta | moderada | baja
            $table->string('priority', 20)->index();

            // pendiente | en_proceso | resuelto | cerrado
            $table->string('status', 20)->default('pendiente')->index();

            $table->timestamps();

            $table->index(['status', 'priority']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
