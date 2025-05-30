<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteProyectosTable extends Migration
{
    public function up()
    {
Schema::create('estudiante_proyectos', function (Blueprint $table) {
    $table->bigIncrements('estudiante_proyecto_id');
    $table->unsignedBigInteger('estudiante_id');
    $table->unsignedBigInteger('proyecto_id');
    $table->timestamps();

    $table->foreign('estudiante_id')->references('estudiante_id')->on('estudiantes')->onDelete('cascade');
    $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
});

    }

    public function down()
    {
        Schema::dropIfExists('estudiante_proyectos');
    }
}
