<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultadesTable extends Migration
{
    public function up()
    {
        Schema::create('facultades', function (Blueprint $table) {
            $table->id('facultad_id');
            $table->string('nombre');
            $table->foreignId('institucion_id')->constrained('instituciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facultades');
    }
}
