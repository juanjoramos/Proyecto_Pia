<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->id('programa_id');
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->unsignedBigInteger('departamento_id');

            $table->foreign('departamento_id')
                  ->references('departamento_id')
                  ->on('departamentos')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programas');
    }
}
