<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrasTable extends Migration
{
    public function up()
    {
        Schema::create('iras', function (Blueprint $table) {
            $table->id('ira_id');
            $table->decimal('valor', 8, 2);
            $table->text('observaciones')->nullable();
            
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('era_id');

            $table->foreign('estudiante_id')->references('estudiante_id')->on('estudiantes')->onDelete('cascade');
            $table->foreign('era_id')->references('era_id')->on('eras')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iras');
    }
}