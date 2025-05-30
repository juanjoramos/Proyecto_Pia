<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id('asignatura_id');
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->integer('creditos');
            $table->unsignedBigInteger('programa_id');

            $table->foreign('programa_id')
                  ->references('programa_id')
                  ->on('programas')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
}
