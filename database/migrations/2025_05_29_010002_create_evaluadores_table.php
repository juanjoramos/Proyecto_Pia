<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('evaluadores', function (Blueprint $table) {
            $table->id('evaluador_id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();

            $table->foreignId('departamento_id')
                ->nullable()
                ->constrained('departamentos', 'departamento_id')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('evaluadores');
    }
};