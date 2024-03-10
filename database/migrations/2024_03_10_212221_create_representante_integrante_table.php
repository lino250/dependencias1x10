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
        Schema::create('representante_integrante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('representante_id')->constrained('representantes');
            $table->foreignId('integrante_id')->constrained('integrantes');
            $table->unique(['representante_id', 'integrante_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representante_integrante');
    }
};
