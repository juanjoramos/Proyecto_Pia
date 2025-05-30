<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('evaluadores', function (Blueprint $table) {
            $table->id('evaluador_id'); // Cambiar 'id' por 'evaluador_id' si lo necesitas
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();

            // La columna 'departamento_id' es una clave foránea que referencia a la tabla 'departamentos'
            $table->foreignId('departamento_id')
                ->nullable() // Permite que este campo sea opcional
                ->constrained('departamentos', 'departamento_id') // Se asegura de que 'departamento_id' es la clave primaria en la tabla 'departamentos'
                ->nullOnDelete(); // Si se elimina un departamento, se pondrá como NULL

            $table->timestamps(); // Se crean las columnas created_at y updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('evaluadores');
    }
};
