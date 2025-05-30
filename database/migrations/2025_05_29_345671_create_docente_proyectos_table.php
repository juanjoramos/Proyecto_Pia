<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteProyectosTable extends Migration
{
    public function up()
    {
        Schema::create('docente_proyectos', function (Blueprint $table) {
            $table->bigIncrements('docente_proyecto_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('proyecto_id');
            $table->timestamps();

            $table->foreign('docente_id')->references('docente_id')->on('docentes')->onDelete('cascade');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('docente_proyectos');
    }
}
