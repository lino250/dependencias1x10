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
        Schema::create('representantes', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique();
            $table->text('nombres');            
            $table->string('telefono', 20);
            $table->string('telefono_alternativo', 20)->nullable();
            $table->foreignId('centro_id')->constrained('centros');
            $table->foreignId('parroquia_id')->constrained('parroquias');
            $table->foreignId('dependencia_id')->constrained('dependencias');
            $table->foreignId('coordinacion_id')->nullable()->constrained('coordinacions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representantes');
    }
};
