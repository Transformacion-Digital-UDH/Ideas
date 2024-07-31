<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('equ_id');
            $table->string('equ_codigo', 20);
            $table->string('equ_nombre', 150);
            $table->string('equ_descripcion', 255)->nullable();
            $table->string('equ_tipo', 50); // Curso - Semillero
            $table->string('equ_seccion', 20)->nullable();
            $table->tinyInteger('equ_estado')->unsigned()->default(1);
            $table->timestamp('equ_created')->useCurrent();
            $table->timestamp('equ_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
