<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErasTable extends Migration
{
    public function up()
    {
        Schema::create('eras', function (Blueprint $table) {
            $table->id('era_id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->foreignId('evaluacion_id')->constrained('evaluaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eras');
    }
}