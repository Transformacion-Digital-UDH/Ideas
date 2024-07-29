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
        Schema::create('proyectistas', function (Blueprint $table) {
            $table->bigIncrements('proy_id');
            $table->string('proy_nombres', 150);
            $table->string('proy_telefono', 20)->nullable();
            $table->string('proy_email', 100)->nullable();
            $table->string('proy_profesion', 100)->nullable();
            $table->text('proy_descripcion')->nullable();
            $table->tinyInteger('proy_estado')->unsigned()->default(1);
            $table->timestamp('proy_created')->useCurrent();
            $table->timestamp('proy_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectistas');
    }
};
