<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->string('criterio');
            $table->integer('calificacion');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('evaluaciones');
    }
};