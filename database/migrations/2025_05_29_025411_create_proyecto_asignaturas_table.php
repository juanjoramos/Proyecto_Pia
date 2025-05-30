<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
    Schema::create('proyecto_asignaturas', function (Blueprint $table) {
        $table->id();

        // Clave foránea de proyecto_id
        $table->foreignId('proyecto_id')->constrained('proyectos')->onDelete('cascade');

        // Aquí definimos la clave foránea para asignatura_id de la forma correcta
        $table->unsignedBigInteger('asignatura_id');
        $table->foreign('asignatura_id')->references('asignatura_id')->on('asignaturas')->onDelete('cascade');

        // Clave foránea de docente_id
        $table->unsignedBigInteger('docente_id');
        $table->foreign('docente_id')->references('docente_id')->on('docentes')->onDelete('cascade');

        $table->string('grupo');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('proyecto_asignaturas');
    }
};