<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
Schema::create('proyecto_asignaturas', function (Blueprint $table) {
    $table->id();

    $table->foreignId('proyecto_id')->constrained('proyectos')->onDelete('cascade');

    $table->unsignedBigInteger('asignatura_id');
    $table->foreign('asignatura_id')->references('asignatura_id')->on('asignaturas')->onDelete('cascade');

    $table->string('grupo');

    $table->unsignedBigInteger('docente_id');
    $table->foreign('docente_id')->references('docente_id')->on('docentes')->onDelete('cascade');

    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('proyecto_asignaturas');
    }
};