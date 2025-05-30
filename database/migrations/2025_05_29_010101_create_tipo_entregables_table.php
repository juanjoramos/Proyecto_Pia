<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoEntregablesTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_entregables', function (Blueprint $table) {
            $table->id('tipo_entregable_id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_entregables');
    }
}