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
        Schema::create('tipo_proyectos', function (Blueprint $table) {
            $table->bigIncrements('tpro_id');
            $table->string('tpro_nombre', 150);
            $table->string('tpro_descripcion', 255)->nullable();
            $table->tinyInteger('tpro_estado')->unsigned()->default(1);
            $table->timestamp('tpro_created')->useCurrent();
            $table->timestamp('tpro_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_proyectos');
    }
};
