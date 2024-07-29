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
        Schema::create('notificars', function (Blueprint $table) {
            $table->foreignId('men_id')->references('men_id')->on('mensajes');
            $table->foreignId('nec_id')->references('nec_id')->on('necesidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificars');
    }
};
