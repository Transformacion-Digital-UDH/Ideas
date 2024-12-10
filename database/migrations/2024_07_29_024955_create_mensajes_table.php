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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->bigIncrements('men_id');
            $table->string('men_asunto', 200);
            $table->text('men_cuerpo')->nullable();
            $table->foreignId('emisor_id')->references('id')->on('users');
            $table->foreignId('nec_id')->references('nec_id')->on('necesidades');
            $table->tinyInteger('men_estado')->unsigned()->default(1);
            $table->timestamp('men_created')->useCurrent();
            $table->timestamp('men_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
