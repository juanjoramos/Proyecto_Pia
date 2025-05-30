<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('resumen')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('estado', 50);
            $table->foreignId('id_tipo_proyecto')->constrained('tipo_proyectos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
