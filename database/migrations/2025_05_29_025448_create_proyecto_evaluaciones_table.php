<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('proyecto_evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained()->onDelete('cascade');
            $table->foreignId('evaluacion_id')->constrained('evaluaciones')->onDelete('cascade');
            
            $table->unsignedBigInteger('evaluador_id');
            $table->foreign('evaluador_id')
                  ->references('evaluador_id')
                  ->on('evaluadores')
                  ->onDelete('cascade');
            
            $table->text('resultados_criterios');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyecto_evaluaciones');
    }
};