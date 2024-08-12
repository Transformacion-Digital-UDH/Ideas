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
        Schema::create('necesidades', function (Blueprint $table) {
            $table->bigIncrements('nec_id');
            $table->string('nec_tipo', 80);
            $table->string('nec_entidad');
            $table->string('nec_documento', 20)->nullable();
            $table->string('nec_titulo', 255);
            $table->text('nec_descripcion')->nullable();
            $table->string('nec_email', 80)->nullable();
            $table->string('nec_telefono', 20)->nullable();
            $table->string('nec_direccion')->nullable();
            $table->enum('es_financiado', ['SI', 'NO'])->default('NO');
            $table->string('nec_proceso', 20)->default('En Espera');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('responsable_id')->nullable()->constrained('users');
            $table->tinyInteger('nec_estado')->unsigned()->default(1);
            $table->timestamp('nec_created')->useCurrent();
            $table->timestamp('nec_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('necesidades');
    }
};
