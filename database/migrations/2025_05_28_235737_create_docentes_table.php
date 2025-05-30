<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('docente_id');
            $table->string('nombres');
            $table->string('documento')->unique();
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();
            $table->unsignedBigInteger('departamento_id');
            $table->timestamps();

            $table->foreign('departamento_id')
                  ->references('departamento_id')
                  ->on('departamentos')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('docentes');
    }
};
