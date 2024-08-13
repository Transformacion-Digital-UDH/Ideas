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
        Schema::create('reportes_propuestas', function (Blueprint $table) {
            $table->bigIncrements('rep_id');
            $table->string('estado_anterior')->nullable();
            $table->string('estado_nuevo');
            $table->foreignId('pro_id')->references('pro_id')->on('propuestas');
            $table->tinyInteger('rep_estado')->unsigned()->default(1);
            $table->timestamp('rep_created')->useCurrent();
            $table->timestamp('rep_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_propuestas');
    }
};
