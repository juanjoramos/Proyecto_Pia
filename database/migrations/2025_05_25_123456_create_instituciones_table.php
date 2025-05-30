<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionesTable extends Migration
{
    public function up()
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('sigla')->nullable();
            $table->string('tipo')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instituciones');
    }
}