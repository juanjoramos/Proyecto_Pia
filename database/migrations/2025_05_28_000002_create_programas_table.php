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
        Schema::dropIfExists('programas');
    }
}