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
        Schema::create('propuestas', function (Blueprint $table) {
            $table->bigIncrements('pro_id');
            $table->string('pro_titulo');
            $table->text('pro_descripcion')->nullable();
            $table->string('pro_lugar')->nullable();
            $table->text('pro_beneficiarios')->nullable();
            $table->text('pro_tratar')->nullable();
            $table->text('pro_causas')->nullable();
            $table->text('pro_consecuencias')->nullable();
            $table->text('pro_justificacion')->nullable();
            $table->string('pro_aportes')->nullable();
            $table->text('problematicas')->nullable();
            $table->string('variable_1', 150)->nullable();
            $table->string('variable_2', 150)->nullable();
            $table->string('pro_tipo', 80);
            // En Espera, En Desarrollo, En Revisión, Aprobada, Rechazada, Implementación, Completada, Cancelada
            $table->string('pro_proceso', 20)->default('En Espera');
            $table->foreignId('curador_id')->references('id')->on('users');
            $table->foreignId('nec_id')->references('nec_id')->on('necesidades');
            $table->tinyInteger('pro_estado')->unsigned()->default(1);
            $table->timestamp('pro_created')->useCurrent();
            $table->timestamp('pro_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propuestas');
    }
};
