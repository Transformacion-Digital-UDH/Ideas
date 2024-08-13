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
        Schema::create('estado_procesos', function (Blueprint $table) {
            $table->bigIncrements('est_id');
            $table->string('est_codigo', 4);
            $table->string('est_nombre', 150);
            $table->string('est_rol', 20)->default('Todos')->nullable();
            $table->string('est_descripcion', 255)->nullable();
            $table->tinyInteger('est_estado')->unsigned()->default(1);
            $table->string('est_siguiente', 4)->nullable();
            $table->timestamp('est_created')->useCurrent();
            $table->timestamp('est_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_procesos');
    }
};
