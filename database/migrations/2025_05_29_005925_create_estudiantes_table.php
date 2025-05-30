<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('estudiante_id');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('codigo')->unique();
            $table->foreignId('institucion_id')->constrained('instituciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}