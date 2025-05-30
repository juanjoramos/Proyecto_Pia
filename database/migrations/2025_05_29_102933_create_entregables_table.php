<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregablesTable extends Migration
{
    public function up()
    {
        Schema::create('entregables', function (Blueprint $table) {
            $table->id('entregable_id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->date('fecha_entrega');
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('tipo_entregable_id');
            
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('tipo_entregable_id')->references('tipo_entregable_id')->on('tipo_entregables')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entregables');
    }
}