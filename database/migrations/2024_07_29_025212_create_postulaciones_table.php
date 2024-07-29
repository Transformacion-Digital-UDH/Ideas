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
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->bigIncrements('pos_id');
            $table->string('pos_semestre', 20);
            $table->string('pos_seccion', 20)->nullable();
            $table->enum('pos_asignado', [0, 1])->default(0);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('pro_id')->references('pro_id')->on('propuestas');
            $table->foreignId('equ_id')->nullable()->constrained('equipos', 'equ_id');
            $table->tinyInteger('pos_estado')->unsigned()->default(1);
            $table->timestamp('pos_created')->useCurrent();
            $table->timestamp('pos_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulaciones');
    }
};
