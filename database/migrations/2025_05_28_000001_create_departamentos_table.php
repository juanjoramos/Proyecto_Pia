<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id('departamento_id');
            $table->string('nombre');
            $table->unsignedBigInteger('facultad_id');

            $table->foreign('facultad_id')
                  ->references('facultad_id')
                  ->on('facultades')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}